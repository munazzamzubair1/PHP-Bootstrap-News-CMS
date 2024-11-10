<?php include 'header.php'; ?>
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- post-container -->
        <div class="post-container">
          <?php
          $pid = null;
          if (isset($_GET['pid'])) {
            $pid = $_GET['pid']; // Getting post id from url
          }
          // Fetching all records from database
          if ($db->select("post", "title, category_name, category, author, description,  username, post_date, post_img, post_id, description", " user ON post.author = user.user_id JOIN category ON post.category = category.category_id", " post_id={$pid}")) { // If result contains atleast one record
            $row = $db->getResult()[0]; // Getting result from database
            ?>
            <div class="post-content single-post">
              <h3><?php echo $row['title']; ?></h3>
              <div class="post-information">
                <span>
                  <i class="fa fa-tags" aria-hidden="true"></i>
                  <?php echo $row['category_name']; ?>
                </span>
                <span>
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <a href='author.php?uid=<?php echo $row['author']; ?>'><?php echo ucfirst($row['username']); ?></a>
                </span>
                <span>
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <?php echo $row['post_date']; ?>
                </span>
              </div>
              <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt="" />
              <p class="description">
                <?php echo $row['description']; ?>
              </p>
            </div>
            <?php
          } ?>
        </div>
        <!-- /post-container -->
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>