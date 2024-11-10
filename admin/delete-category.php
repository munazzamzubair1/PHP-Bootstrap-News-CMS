<?php include "header.php";
// Check if category_id is set in the URL
$cid = $_GET['cid'];
// Delete the category and its associated posts from the database
if ($db->delete("category", ["category_id" => $cid]) && $db->delete("post", ["category" => $cid])) {
  header("Location: {$db->getPath()}/admin/category.php");
  exit(); // Redirect to the category page after successful deletion
} else {
  // Display an error message if the deletion failed
  echo "<pre>";
  print_r($db->getErrorInfo());
  echo "</pre>";
}
?>