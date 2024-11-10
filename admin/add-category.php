<?php include "header.php";
// Checking if the form is submitted or not
if (isset($_POST['save'])) {
  // Getting the value of category name
  $cat = filter_var($_POST['cat'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  // Inserting data into database
  $res = $db->insert("category", ["category_name" => $cat]);
  if ($res) { // If data is inserted successfully
    header("Location: {$db->getPath()}/admin/category.php"); // Redirecting to category.php page
  } else {
    echo "<pre>";
    print_r($db->getErrorInfo()); // Printing error info if data is not inserted successfully
    echo "</pre>";
  }
}
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add New Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form Start -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
          </div>
          <input type="submit" name="save" class="btn btn-primary" value="Save" required />
        </form>
        <!-- /Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>