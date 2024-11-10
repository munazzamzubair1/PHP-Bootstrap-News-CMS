<?php // Including header file 
include "header.php";
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Users</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-user.php">add user</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            $limit = 3;
            $page = null;
            if (isset($_GET['uid'])) { // Check if user id is set or not
              $page = $_GET['uid'];
            } else {
              $page = 1;
            }
            ;
            $offset = ($page - 1) * $limit;
            // Fetching users from user table
            $result = $db->select("user", "user_id, first_name, last_name, username, role", "", "", "", " $offset, $limit");
            if ($result) {
              foreach ($db->getResult() as $user) { // Foreach loop to traverse each result and print it
                ?>
                <tr>
                  <td class='id'><?php echo $user['user_id']; ?></td>
                  <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
                  <td><?php echo $user['username']; ?></td>
                  <td><?php echo $user['role']; ?></td>
                  <td class='edit'><a href='update-user.php?uid=<?php echo $user['user_id']; ?>'><i
                        class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='delete-user.php?uid=<?php echo $user['user_id']; ?>'><i
                        class='fa fa-trash-o'></i></a></td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
        <ul class='pagination admin-pagination'>
          <?php
          // Calling Pagination function and fetching paginationItems
          $currentFileName = basename($_SERVER['PHP_SELF']);
          if ($db->pagination("user", "user_id", $limit, $currentFileName, "uid", $page, "")) {
            $links = $db->getResult()[0];
            echo $links;
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>