<?php
session_start(); // Start the session
include 'database.php';
$db = new Database(); // Create a new instance of the Database class
// Login and redirecting
if (isset($_POST['login'])) {
  $username = trim($_POST['username']);
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $path = $db->getPath();
  // Validate login
  if ($db->login($username, $password)) {
    if ($db->select("user", "user_id, username, role", "", "username = '{$username}'")) {
      $res = $db->getResult()[0];
      $_SESSION['userId'] = $res['user_id'];
      $_SESSION['username'] = $res['username'];
      $_SESSION['role'] = $res['role'];
      header("Location: {$path}/admin/post.php");
      exit();
    }
  } else {
    // Login failed
    $_SESSION['alertMessage'] = "Username and Password not matched";
    header("Location: {$path}/admin"); // Redirect back to login
    exit();
  }
}
$db->isUserLoggedIn(); // Check if user is logged in
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ADMIN | Login</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div id="wrapper-admin" class="body-content">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-4 col-md-4">
          <img class="logo" src="images/news.jpg">
          <h3 class="heading">Admin</h3>
          <!-- Form Start -->
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="" required>
            </div>
            <input type="submit" name="login" class="btn btn-primary" value="login" />
          </form>
          <!-- /Form  End -->

          <!-- Display Alert Message if Login Fails -->
          <?php if (isset($_SESSION['alertMessage'])) { ?>
            <p class="alert alert-danger"><?php echo $_SESSION['alertMessage']; ?></p>
            <?php unset($_SESSION['alertMessage']); // Clear the message after displaying it ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    const alert = document.querySelector(".alert");
    setTimeout(() => {
      if (alert) {
        alert.style.display = "none";
      }
    }, 2000);
  </script>
</body>

</html>