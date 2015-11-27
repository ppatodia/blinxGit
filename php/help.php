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
$Fiter = $_POST["filter"];
logToFile($Fiter);
if($Fiter=="help")
{
    GetTypeServiceData();
}
if($Fiter=="date")
{
    GetDateFilterData();
}
function GetTypeServiceData()
{
    $host = "localhost"; 
$user = "root"; 
$pass = "blinx"; 
$database = "blinx"; 

$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
$sql = "SELECT Id,Description,IsUsed from f_help";

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
function GetDateFilterData()
{
    $host = "localhost"; 
$user = "root"; 
$pass = "blinx"; 
$database = "blinx"; 

$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
$sql = "SELECT Id,Description,IsUsed from f_date";

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