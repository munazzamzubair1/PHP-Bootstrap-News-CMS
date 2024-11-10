<?php
include "database.php"; // Deleting user record using userid
if (isset($_GET['uid'])) {
  $db = new Database();
  $uid = $_GET['uid'];
  if ($db->delete("user", ["user_id" => $uid])) { // Check if user is deleted or not 
    header("Location: {$db->getPath()}/admin/users.php"); // Redirecting user to users.php page
    exit();
  } else {
    echo "<pre>";
    print_r($db->getErrorInfo()); // Displaying error information
    echo "</pre>";
  }
}
?>