<?php  
$servername="localhost";
$username="junia";
$password="079124082";
$databasename="virtual_leadership_training_workshops_platform";
$connection=new mysqli($servername,$username,$password,$databasename);
if ($connection->connect_error) {
    die("connection failed.".$connection->connect_error);
}
?>

