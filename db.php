

<?php
$host = "localhost";
$user = "admin";
$password = "MikeKevin";
$database = "shokotel";

$db_obj = new mysqli($host, $user, $password, $database);

if($db_obj->connect_error)
{
    echo "Connection Error: " . $db_obj->connect_error;
    exit();
}
?>
