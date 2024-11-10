<?php include "header.php";
if (isset($_POST['submit'])) { // Check if form is submit and then fetch its fields to store it for updation
  $userId = $_POST['user_id'];
  $first_name = trim($_POST['f_name']);
  $first_name = filter_var($first_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $last_name = trim($_POST['l_name']);
  $last_name = filter_var($last_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = trim($_POST['username']);
  $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $role = $_POST['role'];
  // Check if query is run or not
  if ($db->update("user", ['first_name' => $first_name, 'last_name' => $last_name, 'username' => $username, 'role' => $role], "user_id = {$userId}")) {
    header("Location: {$db->getPath()}/admin/users.php");
    exit();
  } else {
    echo "<pre>";
    print_r($db->getErrorInfo());
    echo "</pre>";
  }
}
?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Modify User Details</h1>
      </div>
      <div class="col-md-offset-4 col-md-4">
        <?php if (isset($_GET['uid'])) { // Fetching array using userid and then show it into fields
            $uid = $_GET['uid'];
            // Check if select function is run successfully or not
            if ($db->select("user", "user_id, first_name, last_name, username, role", "", "user_id = {$uid}")) {
              $result = $db->getResult();
              foreach ($result as $value) { // Foreach loop to traverse the result and insert it into input fields and select
              } ?>
            <!-- Form Start -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="form-group">
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $value['user_id'] ?>"
                  placeholder="">
              </div>
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $value['first_name']; ?>"
                  placeholder="" required>
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $value['last_name']; ?>"
                  placeholder="" required>
              </div>
              <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $value['username']; ?>"
                  placeholder="" required>
              </div>
              <div class="form-group">
                <label>User Role</label>
                <select class="form-control" name="role" value="">
                  <?php if ($value['role'] == 1) {
                    echo "<option value='0'>normal User</option>
                                        <option value='1' selected>Admin</option>";
                  } else {
                    echo "<option value='0' selected>normal User</option>
                                        <option value='1'>Admin</option>";
                  } ?>
                </select>
              </div>
              <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
            </form>
            <!-- /Form -->
          <?php }
          } ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>