<?php include "header.php";
if (isset($_POST['submit'])) {
  // Storing post field values into variable
  $title = filter_var(trim($_POST['post_title']), FILTER_SANITIZE_STRING);
  $desc = filter_var(trim($_POST['postdesc']), FILTER_SANITIZE_STRING);
  $categ = $_POST['category'];
  $date = date("d M, Y");
  $author = $_SESSION['userId'];
  if (isset($_FILES['fileToUpload'])) { // Checking if file is uploaded to continue further
    $file = $_FILES['fileToUpload'];
    if ($db->saveFile($file, "upload")) { // Checking if file is saved successfully
      $post_img = $db->getResult()[0];
      $res1 = $db->insert("post", [ //Inserting post field values in post table
        'title' => $title,
        'description' => $desc,
        'category' => $categ,
        'post_date' => $date,
        'author' => $author,
        'post_img' => $post_img
      ]);

      $currentCountPost = $db->select("category", "post", "", " category_id = {$categ}");
      $currentCount = $currentCountPost ? $db->getResult()[0]['post'] : '0';
      $newCount = $currentCount + 1;
      // Updating category post related to this category
      $res2 = $db->update("category", ["post" => $newCount], " category_id = $categ");
      if ($res1 && $res2) {
        // Redirecting to post.php if both queries run successfully
        header("Location: {$db->getPath()}/admin/post.php");
        exit();
      }
    } else {
      echo "<pre>";
      print ($db->getErrorInfo());
      echo "</pre>";
    }
  }
}
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add New Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="post_title">Title</label>
            <input type="text" name="post_title" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> Description</label>
            <textarea name="postdesc" class="form-control" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <select name="category" class="form-control">
              <option value="" selected disabled> Select Category</option>
              <?php
              // Fetching Category 
              $res = $db->select("category", "category_id, category_name");
              if ($res) {
                foreach ($db->getResult() as $values) {
                  ?>
                  <option value="<?php echo $values['category_id']; ?>"><?php echo $values['category_name']; ?></option>
                <?php }
              } ?>

            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Post image</label>
            <input type="file" name="fileToUpload" required>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
        </form>
        <!--/Form -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>