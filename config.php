<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

$server_name="localhost";
$username="root";
$password="";
$db_name="placement_portal";

// Try connecting to the Database
try{
$conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);

//Check the connection
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
