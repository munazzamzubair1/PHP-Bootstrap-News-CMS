<?php include "header.php";
// Check if category_id is set in the URL
$cid = $_GET['cid'];
// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get the category_id and category_name from the form
  $cat_id = $_POST['cat_id'];
  $cat_name = filter_var($_POST['cat_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($db->update("category", ['category_name' => $cat_name], " category_id = $cat_id")) {
    // Redirect to the category page after successful update
    header("Location: {$db->getPath()}/admin/category.php");
    exit();
  } else {
    // Display an error message if the update failed
    echo "<pre>";
    print_r($db->getErrorInfo());
    echo "</pre>";
  }
  ;
}
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="adin-heading"> Update Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <form action="" method="POST">
          <?php // SQL query to fetch category details based on category_id
          if ($db->select("category", "category_id, category_name", "", " category_id = $cid")) { // Checking if the query was successful
            $res = $db->getResult(); // Fetching the result row
            foreach ($res as $key => $value) { // Looping through the result row
              ?>
              <div class="form-group">
                <input type="hidden" name="cat_id" class="form-control" value="<?php echo $value['category_id']; ?>"
                  placeholder="">
              </div>
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="cat_name" class="form-control" value="<?php echo $value['category_name']; ?>"
                  placeholder="" required>
              </div>
              <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
            <?php }
          } ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>