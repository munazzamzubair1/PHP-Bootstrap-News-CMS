<?php include "header.php"; // Including header 
if (isset($_POST['save'])) { // Check if form is sumbitted and store field to insert 
  $fname = trim($_POST['fname']);
  $fname = filter_var($fname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $lname = trim($_POST['lname']);
  $lname = filter_var($lname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = trim($_POST['user']);
  $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];
  $array = ['first_name' => $fname, 'last_name' => $lname, 'username' => $username, 'password' => $password, 'role' => $role];
  $res = $db->insert("user", $array); // Insert function
  $path = $db->getPath();
  if ($res) { // Check if insert function is run successfully
    header("location: {$path}/admin/users.php");
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
        <h1 class="admin-heading">Add User</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form Start -->
        <form action="" method="POST" autocomplete="off">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
          </div>
          <div class="form-group">
            <label>User Name</label>
            <input type="text" name="user" class="form-control" placeholder="Username" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>User Role</label>
            <select class="form-control" name="role">
              <option value="0">Normal User</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <input type="submit" name="save" class="btn btn-primary" value="Save" required />
        </form>
        <!-- Form End-->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>