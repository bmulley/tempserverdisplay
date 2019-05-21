<?php
require_once("/home/config.php");
require_once("/home/users.php");
$var_name=($_POST['pyname']);
$var_temp=($_POST['temp']);
$var_user=($_POST['user']);

if (in_array($var_user, $auth))
{
        date_default_timezone_set('America/New_York');
        $time = date("Y-m-d H:i:s");
        $con = mysqli_connect($host,$username,$password,$dbname) or die('Connection Failed');
        if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_query($con, "INSERT INTO temp(name,time,temp) VALUES ('$var_name','$time',$var_temp)");
        mysqli_close($con);
}
else
{
        echo "Auth failed";
}
?>
