<?php
include("connectionparameter.php");
$con=mysqli_connect($host,$user,$password,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$state_id=$_POST['state_id'];


$sql="SELECT DISTINCT district FROM f_location WHERE state='$state_id'"; 
$result = mysqli_query($con,$sql);

echo '<select name="district" onchange="showUser(this.value)">';

while($row = mysqli_fetch_array($result))
{
	$district=urlencode($row['district']);
        echo "<option value='$district'>".$row['district']."</option>";
}
echo '</select>';
mysqli_close($con);
?>