<?php include "header.php";
// Check if category_id is set in the URL
if (isset($_GET['cid'])) {
  $cid = $_GET['cid'];
} else {
  $cid = 1;
}
$limit = 3; // Number of category to display per page
$offset = ($cid - 1) * $limit; // Calculating the offset for pagination
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Categories</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-category.php">add category</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Category Name</th>
            <th>No. of Posts</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            // Retrieving all categories from the database
            if ($db->select("category", "*", "", "", "", " $offset, $limit")) { // Selecting all categories from the database
              $res = $db->getResult(); // Getting the result set
              foreach ($res as $row) { // Looping through the result set
                ?>
                <tr>
                  <td class='id'><?php echo $row['category_id']; ?></td>
                  <td><?php echo $row['category_name']; ?></td>
                  <td><?php echo $row['post']; ?></td>
                  <td class='edit'><a href='update-category.php?cid=<?php echo $row['category_id']; ?>'><i
                        class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='delete-category.php?cid=<?php echo $row['category_id']; ?>'><i
                        class='fa fa-trash-o'></i></a></td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
        <ul class='pagination admin-pagination'>
          <?php
          $currentFileName = basename($_SERVER['PHP_SELF']);
          if ($db->pagination("category", "category_id", $limit, $currentFileName, "cid", $cid, "")) {
            echo $db->getResult()[0]; // Displaying pagination links
          }

          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>