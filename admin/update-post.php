<?php include "header.php";
$prev_categ = null;
if (isset($_POST['submit'])) { // Getting form fields value and store into variable to use it
  $prev_categ = $_SESSION['prev_categ'];
  unset($_SESSION['prev_categ']);
  $postid = $_POST['post_id'];
  $title = trim(filter_var($_POST['post_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $description = trim(filter_var($_POST['postdesc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $categ = $_POST['category'];
  $date = date("d M, Y");
  $new_file = null;
  // Check if user uploaded a file or not
  if (!empty($_FILES['new-image']['name'])) {
    $file = $_FILES['new-image'];
    if ($db->saveFile($file, "upload")) {
      $new_file = $db->getResult()[0]; // Getting filename and storing in variable
      unlink("upload/" . $_POST['old-image']);
    } else {
      echo "<pre>";
      print_r($db->getErrorInfo());
      echo "</pre>";
    }
  } else {
    $oldfile = $_POST['old-image'];
  }
  // Updating the post table
  $res = $db->update("post", [
    'title' => $title,
    'description' => $description,
    'category' => $categ,
    'post_date' => $date,
    'post_img' => ($new_file && $new_file != $oldfile) ? $new_file : $oldfile
  ], " post_id = {$postid}");


  if ($prev_categ != $categ) {
    $currentCountPost1 = $db->select("category", "post", "", " category_id = {$prev_categ}");
    $currentCount1 = $currentCountPost1 ? $db->getResult()[0]['post'] : '0';
    $newCount1 = $currentCount1 - 1;
    // Updating category post related to this category
    $db->update("category", ["post" => $newCount1], " category_id = $prev_categ");

    $currentCountPost2 = $db->select("category", "post", "", " category_id = {$categ}");
    $currentCount2 = $currentCountPost2 ? $db->getResult()[0]['post'] : '0';
    $newCount2 = $currentCount2 + 1;
    // Updating category post related to this category
    $db->update("category", ["post" => $newCount2], " category_id = $categ");
  }


  if ($res) {
    header("Location: {$db->getPath()}/admin/post.php");
    exit();
  }

}
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <?php
        if (isset($_GET['pid'])) { // Check if postId is set and different than null
          $pid = $_GET['pid'];
          if ($db->select("post", "post_id, title, description, category, post_img", "", " post_id = {$pid}")) {
            foreach ($db->getResult() as $value) {
              $_SESSION['prev_categ'] = $value['category'];
              ?>
              <!-- Form for show edit-->
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <div class="form-group">
                  <input type="hidden" name="post_id" class="form-control" value="<?php echo $value['post_id']; ?>"
                    placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputTile">Title</label>
                  <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                    value="<?php echo $value['title']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> Description</label>
                  <textarea name="postdesc" class="form-control" required rows="5">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <?php echo trim($value['description']); ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          </textarea>

                </div>
                <div class="form-group">
                  <label for="exampleInputCategory">Category</label>
                  <select class="form-control" name="category">
                    <option value="" disabled>Select Category</option>
                    <?php
                    // Fetching and showing categories
                    if ($db->select("category", "category_id, category_name")) {
                      foreach ($db->getResult() as $val) {
                        ?>
                        <option value="<?php echo $val['category_id']; ?>" <?php echo ($val['category_id'] == $value['category']) ? 'selected' : '' ?>><?php echo $val['category_name']; ?></option>
                      <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Post image</label>
                  <input type="file" name="new-image">
                  <img src="upload/<?php echo $value['post_img']; ?>" height="150px">
                  <input type="hidden" name="old-image" value="<?php echo $value['post_img']; ?>">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Update" />
              </form>
              <!-- Form End -->
            <?php }
          }
        } ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>