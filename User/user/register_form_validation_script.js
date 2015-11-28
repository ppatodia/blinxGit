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
	var date_of_birth=document.forms["myForm"]["date_of_birth"].value;
	var first_slash_pos=date_of_birth.indexOf("/");
	var last_slash_pos=date_of_birth.lastindexOf("/");

	var institution=document.forms["myForm"]["institution"].value;
	var location=document.forms["myForm"]["location"].value;
	var address=document.forms["myForm"]["mobile_number"].value;
	var pwd=document.forms["myForm"]["pwd"].value;
	var cpwd=document.forms["myForm"]["cpwd"].value;

	if (first_name==null || first_name=="" ||  last_name==null || last_name=="" || email_id==null || email_id=="" || mobile_number==null || mobile_number=="" || institution==null || institution=="" || location==null || location=="" || address==null || address=="" || pwd==null || pwd=="" || cpwd==null || cpwd=="")
	{
		alert("all entries must have to be filled");
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

	if(last_name.length<3 || last_name.length>20)
	{
		alert("enter valid last name");
		return false;
	}
	if( /[^A-Za-z0-9]/.test( last_name ) ) 
	{
		alert('Input is not a valid first name');
		return false;
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=c.length)
	{
		alert("Not a valid e-mail address");
		return false;
	}

	if(mobile_number.length != 10)
	{
		alert("enter valid mobile number");
		return false;
	}
	if( /[^0-9]/.test( mobile_number ) ) 
	{
		alert('Input is not a valid mobile number');
		return false;
	}

	if(alternative_mobile_number.length != 10)
	{
		alert("enter valid mobile number");
		return false;
	}
	if( /[^0-9]/.test( alternative_mobile_number ) ) 
	{
		alert('Input is not a valid mobile number');
		return false;
	}

	if(date_of_birth.length != 10)
	{
		alert("enter date of birth in correct format i,e DD/MM/YYYY");
		return false;
	}
	if( /[^0-9/]/.test( date_of_birth ) ) 
	{
		alert('Input is not a valid date of birth');
		return false;
	}
   	if(first_slash_pos != 3 || last_slash_pos != 6)
	{
		alert("Enter date of birth in correct format i,e DD/MM/YYYY");
	}
       
	if(institution.length<3 || first_name.length>60)
	{
		alert("enter valid institution name");
		return false;
	}
	if( /[^A-Za-z0-9,.- ]/.test( first_name ) ) 
	{
		alert('Input is not a valid institution name. You can only use alphanumeric, comma, dot, spacebar');
		return false;
	}

	if(location.length<3 || location.length>60)
	{
		alert("enter valid location");
		return false;
	}
	if( /[^A-Za-z0-9,.- ]/.test( location ) ) 
	{
		alert('Input is not a valid location. You can only use alphanumeric, comma, dot, spacebar');
		return false;
	}

	if(address.length<3 || address.length>60)
	{
		alert("enter valid address");
		return false;
	}
	if( /[^A-Za-z0-9,.- ]/.test( address ) ) 
	{
		alert('Input is not a valid address. You can only use alphanumeric, comma, dot, spacebar');
		return false;
	}

	if(pwd.length<7 || pwd.length>16)
	{
		alert("enter valid password of length 6-15 charectars");
		return false;
	}
	if( /[^A-Za-z0-9,.- ]/.test( pwd ) ) 
	{
		alert('Input is not a valid password. You can only use alphanumeric, comma, dot, spacebar');
		return false;
	}

	if(cpwd.length<7 || cpwd.length>16)
	{
		alert("enter valid password of length 6-15 charectars");
		return false;
	}
	if( /[^A-Za-z0-9,.- ]/.test( cpwd ) ) 
	{
		alert('Input is not a valid password. You can only use alphanumeric, comma, dot, spacebar');
		return false;
	}
    	if(pwd != cpwd)
	{
		alert("Password and confirm password doesn't match");
	}
 
}
</script>