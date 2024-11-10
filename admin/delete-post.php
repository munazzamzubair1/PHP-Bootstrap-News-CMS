<?php
// Including header.php file
include "header.php";

if (isset($_GET['pid'])) { // Checking if post id is set
  $pid = $_GET['pid'];

  // Fetching the post details before deletion
  if ($db->select("post", "category, post_img", "", "post_id = {$pid}")) {

    $postDetails = $db->getResult()[0];
    $category = $postDetails["category"]; // Getting category of this post
    $post_img = $postDetails["post_img"]; // Getting post image
    // Deleting the post
    if ($db->delete("post", ["post_id" => $pid])) {

      // Fetching the current post count for the category
      if ($db->select("category", "post", "", "category_id = {$category}")) {
        $currentCountPost = $db->getResult()[0]["post"];
        $newCount = $currentCountPost - 1; // Updating post count

        // Updating the post count for the category
        $db->update("category", ["post" => $newCount], "category_id = {$category}");
      }

      // Deleting image from upload folder
      if (!empty($post_img)) {
        unlink("upload/" . $post_img); // Ensure $post_img is valid
      }

      // Redirecting to admin post page if deletion is successful
      header("Location: {$db->getPath()}/admin/post.php");
      exit(); // Exiting code after deletion
    } else {
      // Showing error if deletion fails
      echo "<pre>";
      print_r($db->getErrorInfo());
      echo "</pre>";
    }
  }
}
?>