<?php
session_start(); // Starting session
include "admin/database.php"; // Including database file
$db = new Database(); // Creating instance of database class
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>News</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.css">
  <!-- Custom stlylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- HEADER -->
  <div id="header">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- LOGO -->
        <div class=" col-md-offset-4 col-md-4">
          <a href="index.php" id="logo"><img src="images/news.jpg"></a>
        </div>
        <!-- /LOGO -->
      </div>
    </div>
  </div>
  <!-- /HEADER -->
  <!-- Menu Bar -->
  <div id="menu-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class='menu'>
            <?php
            $cid = isset($_GET['cid']) ? $_GET['cid'] : 1;
            // Fetching all records from database
            if ($db->select("category", "category_id, category_name")) { // If result contains atleast one record
              foreach ($db->getResult() as $row) {
                ?>
                <li><a href='category.php?cid=<?php echo $row['category_id'] ?>'
                    class="<?php echo ($row['category_id'] == $cid) ? 'active' : '' ?>"><?php echo $row['category_name'] ?></a>
                </li>
              <?php }
            } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /Menu Bar -->