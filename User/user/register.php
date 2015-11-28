<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<meta name="author"description="Rajneesh Dwivedi">
	<meta name="keywords"content="Blinx Blind Registration, Search Scribe by registering into blinx">
	
	<title>Blinx Create An Account. Blind Registration</title>
	<link rel="stylesheet"href="style.css" type="text/css">
	<script src="register_form_validation_script.js"type="text/javascript"></script>
<style>
body
{
	background-color:#A9A9A9;
}

.main
{
	margin:0 auto;
	width:900px;
	margin-top:100px;
}
.heading
{
	text-align:center;
}

.formtable
{
	padding:20px;
}

.textField
{
	width:200px;
	height:20px;
	background-color:#F5F5F5;
}
</style>

<script>
function validateForm()
{
	var first_name=document.forms["myForm"]["first_name"].value;
	var last_name=document.forms["myForm"]["last_name"].value;

	var email_id=document.forms["myForm"]["email_id"].value;
	var atpos=email_id.indexOf("@");
	var dotpos=email_id.lastIndexOf(".");

	var mobile_number=document.forms["myForm"]["mobile_number"].value;
	var alternative_mobile_number=document.forms["myForm"]["alternative_mobile_number"].value;

	if(first_name =="" || first_name ==null || last_name  =="" || last_name==null || email_id =="" || email_id ==null || mobile_number== "" || mobile_number ==null)
	{
		alert("All fields are required");
		return false;
	}
	if(first_name.length<3 || first_name.length>20)
	{
		alert("enter valid first name");
		return false;
	}
	if( /[^A-Za-z0-9]/.test( first_name ) ) 
	{
		alert('Input is not a valid first name');
		return false;
	}

	if(last_name.length>20)
	{
		alert("enter valid last name");
		return false;
	}
	if( /[^A-Za-z0-9]/.test( last_name ) ) 
	{
		alert('Input is not a valid last name');
		return false;
	}

	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=c.length)
	{
		alert("Not a valid e-mail address");
		return false;
	}


	if(mobile_number.length < 10)
	{
		alert("enter valid mobile number");
		return false;
	}
	if( /[^0-9]/.test( mobile_number ) ) 
	{
		alert('Input is not a valid mobile number');
		return false;
	}

}

</script>

</head>

<body>
	<div class="main">
	<h1 class="heading">Registration Form</h1>
	<form name="myForm"onsubmit="return validateForm()" action="insert_user_info.php" method="post"
enctype="multipart/form-data"><br>

	<table class="formtable">
	<tr>
	<td><strong>First Name :</strong></td>
	<td><input type="text"name="first_name"class="textField"></td>

	<td><strong>Last Name :</strong></td>
	<td><input type="text"name="last_name"class="textField"></td>
	</tr>

	<tr>
	<td><strong>Email ID :</strong></td>
	<td><input type="text"name="email_id"class="textField"></td>

	<td><strong>Mobile Number :</strong></td>
	<td><input type="text"name="mobile_number"class="textField"></td>
	</tr>

	<tr>
	<td><strong>Alternative Mobile Number :</strong></td>
	<td><input type="text"name="alternative_mobile_number"class="textField"></td>

	<td><strong>Date Of Birth  :</strong></td>
	<td><input type="text"name="date_of_birth"class="textField"></td>
	</tr>

	<tr>
	<td><strong>Gender :</strong></td>
	<td>
		<select class="textField">
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select>
	</td>
	<td><strong>Educational Qualification</strong></td>
	<td>
<?php
include("connectionparameter.php");
$con=mysqli_connect($host,$user,$password,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT Description FROM f_education"; 
$result = mysqli_query($con,$sql);

echo '<select name="qualification" onchange="showUser(this.value)"class="textField">';

while($row = mysqli_fetch_array($result))
{
	$Description=urlencode($row['Description']);
     echo "<option value='$Description'>".$row['Description']."</option>";
}
echo '</select>';
?>
	</td>
	</tr>

	<tr>
	<td><strong>Institution :</strong></td>
	<td><input type="text"name="institution"class="textField"></td>
	<td><strong>Occupation :</strong></td>
	<td>
<?php
$sql="SELECT Description FROM f_jobfunction"; 
$result = mysqli_query($con,$sql);

echo '<select name="occupation" onchange="showUser(this.value)"class="textField">';

while($row = mysqli_fetch_array($result))
{
	$Description=urlencode($row['Description']);
     echo "<option value='$Description'>".$row['Description']."</option>";
}
echo '</select>';
?>
	</td>
	</tr>

	<tr>
	<td><strong>Select State :</strong></td>
	<td>
<?php
$sql="SELECT DISTINCT state FROM f_location"; 
$result = mysqli_query($con,$sql);

echo '<select name="state" onchange="showUser(this.value)"id="drop1"class="textField">';

while($row = mysqli_fetch_array($result))
{
	$state=urlencode($row['state']);
        echo "<option value='$state'>".$row['state']."</option>";
}
echo '</select>';
mysqli_close($con);
?>
<script src="jquery-1.9.0.min.js"></script>
<script>
$(document).ready(function(){
$("select#drop1").change(function(){

	var state_id =  $("select#drop1 option:selected").attr('value'); 	
	$("#district").html( "" );
	if (state_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "fetch_district.php",
			data: "state_id="+state_id,
			cache: false,

			success: function(html) {    
				$("#district").html( html );
			}
		});
	} 
});
});
</script>

	</td>
	<td><strong>Select District :</strong></td>
	<td><select name="district" id="district"class="textField"></td>
	</tr>

	<tr>
	<td><strong>Location :</strong></td>
	<td>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.A;
                var longitude = place.geometry.location.F;
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
                //alert(mesg);
            });
        });
    </script>
	
	<input type="text"name="location" id="txtPlaces" class="textField">
	</td>

	<td><strong>Address :</strong></td>
	<td><strong><input type="text"name="address"class="textField"></strong></td>
	</tr>

	<tr>
	<td><strong>Password :</strong</td>
	<td><strong><input type="password"name="pwd"class="textField"></strong></td>
	<td><strong>Confirm Password :</strong></td>
	<td><strong><input type="password"name="cpwd"class="textField"></strong></td>
	</tr>

	<tr>
	<td><strong>Upload Doc </strong><strong>(size < 5 MB ></strong></td>
	<td><input type="file" name="file" id="file"></td>
	<td><input type="submit" name="submit" value="Submit"></td>
	</tr>
	</table>
	</form>
	</div>

</body>
</html>
