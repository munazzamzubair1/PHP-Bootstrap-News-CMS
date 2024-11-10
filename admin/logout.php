<?php
session_start(); // Starting session
// Including database.php file
include "database.php";
// Creating instance of Database class
$db = new Database();
$db->logout(); // Calling logout method to destroy session and redirect to login page
?>