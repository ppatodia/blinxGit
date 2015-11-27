<?php
date_default_timezone_set('Asia/Kolkata');
$username = $_POST["username"];
$password = $_POST["password"];
VerifyLogin($username,$password);
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
   
function VerifyLogin($username1,$password1) 
{
$host = "localhost"; 
$user = "root"; 
$pass = "blinx"; 
$database = "blinx"; 
$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
try
{
    $sql1="select count(*) as count from m_volunteer where email_id='$username1'";
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
            logToFile($count);
            if(intval($count)>=1)
            {
                    $sql2="select count(*) as count from m_volunteer where email_id='$username1' and pwd='$password1'";
                    logToFile($sql2);
                    $result1=mysqli_query($conn,$sql2);
                    if (!$result1) 
                   {
                        echo "Failed Registration ($sql2) from DB: " . mysql_error();
                   } 
                   else
                   {
                        $value = mysqli_fetch_object($result1)->count; 
                        if(intval($value)==1)
                            echo '0';
                        else {
                            echo '1';
                        }
                  }
            }
            else
            {
                    echo '2';
            }
    }
    }
catch(Exception $e)
{
            logToFile($e->getMessage());
            logToFile(mysqli_close($conn));
             echo 'fail';
}
   
}

?>		

