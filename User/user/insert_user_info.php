<?php
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email_id=$_POST['email_id'];
	$mobile_number=$_POST['mobile_number'];
	$alternative_mobile_number=$_POST['alternative_mobile_number'];
	$date_of_birth=$_POST['date_of_birth'];
	$gender=$_POST['gender'];
	$qualification=$_POST['qualification'];
	$institution=$_POST['institution'];
	$occupation=$_POST['occupation'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$location=$_POST['location'];
	$address=$_POST['address'];
	$pwd=$_POST['pwd'];

echo $first_name;
echo $last_name;
echo $email_id;
echo $mobile_number;
echo $alternative_mobile_number;
echo $date_of_birth;
echo $gender;
echo $qualification;
echo $institution;
echo $occupation;
echo $state;
echo $district;
echo $location;
echo $address;
echo $pwd;

$a=$email_id;
$b=$_FILES["file"]["name"];
$c="$a"."_"."$b";
$_FILES["file"]["name"]=$c;
$allowedExts = array("gif","pdf", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  echo "<br>";
  exit("please upload file");
  }
	$document_path="upload/".$_FILES["file"]["name"];

include("connectionparameter.php");
$con=mysqli_connect($host,$user,$password,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


	$result = mysqli_query($con,"SELECT email_id FROM m_user WHERE email_id='$email_id' AND verified = 1");
	$result_exist=mysqli_num_rows($result);

	if($result_exist==0)
	{
		$sql="INSERT INTO m_user (first_name, last_name, email_id, mobile_number, alternative_mobile_number, date_of_birth, gender, qualification, institution, occupation, state, district, location, address, pwd,document_path)
		VALUES
		('$first_name', '$last_name', '$email_id', '$mobile_number', '$alternative_mobile_number', '$date_of_birth', '$gender', '$qualification', '$institution', '$occupation', '$state', '$district', '$location', '$address', '$pwd','$document_path')";

			if (!mysqli_query($con,$sql))
			{
				die('Error: ' . mysqli_error($con));
			}
	}

?>