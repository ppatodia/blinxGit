<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Blinx Create An Account. Blind Registration</title>
      <link rel="STYLESHEET" type="text/css" href="style.css">
</head>

<body>
	<div class="main">
		<h1 class="heading">Registration Form</h1><br>
	<form name="myForm"onsubmit="return validateForm()" action="insert.php" method="post"
enctype="multipart/form-data"><br>

	<table class="formtable">
	<tr>
	<td><strong>First Name :</strong></td>
	<td><input type="text"name="first_name"size="40"></td>

	<td><strong>Last Name :</strong></td>
	<td><input type="text"name="last_name"size="40"></td>
	</tr>

	<tr>
	<td><strong>Email ID :</strong></td>
	<td><input type="text"name="email_id"size="40"></td>

	<td><strong>Mobile Number :</strong></td>
	<td><input type="text"name="mobile_number"size="40"></td>
	</tr>

	<tr>
	<td><strong>Alternative Mobile Number :</strong></td>
	<td><input type="text"name="alternative_mobile_number"size="40"></td>

	<td><strong>Date Of Birth DD/MM/YYYY :</strong></td>
	<td><input type="text"name="date_of_birth"size="40"></td>
	</tr>

	<tr>
	<td><strong>Gender :</strong></td>
	<td>
		<select>
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

echo '<select name="qualification" onchange="showUser(this.value)">';

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
	<td><input type="text"name="institution"size="40"></td>
	<td><strong>Occupation :</strong></td>
	<td>
<?php
$sql="SELECT Description FROM f_jobfunction"; 
$result = mysqli_query($con,$sql);

echo '<select name="occupation" onchange="showUser(this.value)">';

while($row = mysqli_fetch_array($result))
{
	$Description=urlencode($row['Description']);
     echo "<option value='$Description'>".$row['Description']."</option>";
}
echo '</select>';
mysqli_close($con);
?>
	</td>
	</tr>
	</table>


<strong>Upload Doc </strong><br><b>(size < 5 MB ></b><br>
<input type="file" name="file" id="file"><br><br>



<input type="submit" name="submit" value="Submit">

</form>


</div>
</body>
</html>
