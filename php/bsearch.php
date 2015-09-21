<?php
function logToFile($msg)
 { 
   try
   {
   $filename='\wamp\www\log.txt';
   // open file
   $fd = fopen($filename, "a");
   // append date/time to message
   $str = "[" . date("Y/m/d h:i:s", time()) . "] " . $msg; 
   // write string
   fwrite($fd, $str . "\n");
   // close file
   fclose($fd);
   }
   catch(Exception $e)
   {
	logToFile($e->getMessage());
   }
 }
$search=$_POST['searchMethod'];
$phonesearch=$_POST['searchdata'];
logToFile($phonesearch);
logToFile($search);
GetPhonesearchData($phonesearch,$search);
function GetPhonesearchData($phonesearchParam,$searchParam)
{
$where="";
if($searchParam=="0")
{
$where=" mobile_number ='$phonesearchParam'";
}
else if($searchParam=="1")
{
$where=" mobile_number like '$phonesearchParam%'";
}
else
{
$where=" mobile_number like '%$phonesearchParam'";
}

$host = "localhost"; 
$user = "root"; 
$pass = "blinx"; 
$database = "blinx"; 
$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
$query = "SELECT user_id, first_name, last_name, email_id, mobile_number, alternative_mobile_number, date_of_birth, gender, qualification, institution, occupation, state, district, location, address, document_path, create_time, update_time, cud, verified, m_id, verifier_mid, pwd 
FROM m_user where";
$sql=$query.$where;
logToFile($sql);
$result = mysqli_query($conn,$sql);
logToFile('-------------------------------------------');
//logToFile($result);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}
 $data['data']=array();
 while($row= mysqli_fetch_array( $result,MYSQLI_ASSOC)){
		array_push($data['data'], $row); 
		
}
echo json_encode($data);
mysqli_close($conn);
}

?>