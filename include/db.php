<?php
$conn = new mysqli('localhost','root','','cms');
if($conn->connect_error){
    die("Error:".$conn->connect_error);
}
?>