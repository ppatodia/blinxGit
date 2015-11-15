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
$lat = $_POST["lat"];
$lng = $_POST["lng"];
logToFile($lat);
logToFile($lng);
GetblocationsearchData($lat,$lng);
function GetblocationsearchData($lat1,$lng1)
{
$host = "localhost"; 
$user = "root"; 
$pass = "blinx"; 
$database = "blinx"; 
$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
$query = "SELECT  ( 3959 * acos( cos( radians($lat1) ) * "
        . "cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng1) ) + sin( radians($lat1) ) * "
        . "sin( radians( latitude ) ) ) ) AS distance,latitude,longitude,UserId,"
        . "t.Id,helpId,h.Description,CONCAT(u.first_name, ' ' ,u.last_name) as Name, t.Address,"
        . " Requesteddate , Message"
        . " FROM t_help_request t inner join f_help h  on t.helpId=h.Id   "
        . " inner join m_user u on u.user_id=t.UserId "
        . " HAVING distance < 10 ORDER BY distance LIMIT 0 , 20";
$sql=$query;
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