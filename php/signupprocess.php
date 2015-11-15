<?php
date_default_timezone_set('Asia/Kolkata');
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$pwd = $_POST["paswd"];
$place1= $_POST["latitude"];
$place2= $_POST["longitude"];
InsertBenificiaryData($firstname,$lastname,$email,$phone,$place1,$place2,$pwd);
function logToFile($msg)
{
   try
   {
   $filename='\wamp\www\log.txt';
   // open file
   $fd = fopen($filename, "a");
   // append date/time to message
   $str = "[" . date("Y/m/d h:i:s", mktime()) . "] " . $msg; 
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
   
function InsertBenificiaryData($firstname1,$lastname1,$email1,$phone1,$place1,$place2,$pwd) 
{
$host = "localhost"; 
$user = "root"; 
$pass = "blinx"; 
$database = "blinx"; 
$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
try
{
$sql1="select count(*)  as count from m_volunteer where mobile_number='$phone1'";
logToFile($sql1);
$result = mysqli_query($conn,$sql1);
if (!$result) 
{
  logToFile(mysql_error());
  echo 'Failed Registration';
} 
else 
{
	$count = mysqli_fetch_object($result)->count; 
        //logToFile((string)$row[0]);
	if(intval($count)==0)
	{
                $sql2="select COALESCE(MAX(volunteer_id), 0) as id from m_volunteer";
                logToFile($sql2);
                $result1=mysqli_query($conn,$sql2);
                
                if (!$result1) 
               {
                    echo "Failed Registration ($sql2) from DB: " . mysql_error();
               } 
               else
               {
                       $id = mysqli_fetch_object($result1)->id; 
                       $bid=intval($id)+1;
                       logToFile($bid);
       		           $sql="INSERT INTO m_volunteer "
                                   . "(volunteer_id,"
                                   . "first_name,"
                                   . "last_name,"
                                   . "email_id,"
                                   . "mobile_number,"
                                   . "lati,"
                                   . "longi,"
                                   . "cud,"
                                   . "create_time,"
                                   . "pwd)"
                                   . "VALUES"
                                   . "( $bid,'$firstname1',"
                                   . "'$lastname1','$email1','$phone1','$place1','$place2','C',now(),'$pwd')";
                      logToFile($sql);
 		        if (!mysqli_query($conn,$sql))
		        {
		            logToFile(mysql_error());
                            echo 'Failed Registration';
		        }
		        else
		        {
			       logToFile("Registration Success");
                                echo 'Registration Success';
		        }
              }
	}
else
{
          echo 'Already Registered';
}
}
}
    catch(Exception $e)
   {
		logToFile($e->getMessage());
		logToFile(mysql_close($con));
                 echo 'fail';
   }
   
}

?>		