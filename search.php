<?php include 'header.php'; ?>
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- post-container -->
        <div class="post-container">

          <?php
          // Get search query from URL parameter or set to null if not present
          $search = isset($_GET['search']) ? $_GET['search'] : null;
          ?>
          <h2 class="page-heading">Search : <?php echo ucfirst($search); ?></h2>
          <?php
          $page = null; // Variable to store page number
          if (isset($_GET['page'])) {
            $page = $_GET['page']; // If page number is set in url then storing it in variable
          } else {
            $page = 1; // Default page number is 1
          }
          $limit = 3; // Number of records to be displayed per page
          $offset = ($page - 1) * $limit; // Calculating offset
          if ($db->select("post", "title, category_name, category, description,  username, author, post_date, post_img, post_id, description", " user ON post.author = user.user_id JOIN category ON post.category = category.category_id", " title LIKE '%{$search}%' OR description LIKE '%{$search}%'", "", " $offset, $limit")) {
            $res = $db->getResult(); // Getting result from database
            foreach ($res as $row) { // Iterating over result
              ?>
              <div class="post-content">
                <div class="row">
                  <div class="col-md-4">
                    <a class="post-img" href="single.php?pid=<?php echo $row['post_id']; ?>"><img
                        src="admin/upload/<?php echo $row['post_img']; ?>" alt="" /></a>
                  </div>
                  <div class="col-md-8">
                    <div class="inner-content clearfix">
                      <h3><a href='single.php?pid=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                      <div class="post-information">
                        <span>
                          <i class="fa fa-tags" aria-hidden="true"></i>
                          <a
                            href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                        </span>
                        <span>
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <a
                            href='author.php?uid=<?php echo $row['author']; ?>'><?php echo ucfirst($row['username']); ?></a>
                        </span>
                        <span>
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                          <?php echo $row['post_date']; ?>
                        </span>
                      </div>
                      <p class="description">
                        <?php echo substr($row['description'], 0, 200) . "..."; ?>
                      </p>
                      <a class='read-more pull-right' href='single.php?pid=<?php echo $row['post_id']; ?>'>Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
          } ?>
          <ul class='pagination'>
            <?php
            $currentFileName = basename($_SERVER['PHP_SELF']); // Getting current file name
            // Displaying pagination links
            if ($db->pagination("post", "post_id", $limit, $currentFileName, "page", $page, "  title LIKE '%{$search}%' OR description LIKE '%{$search}%'", ["search" => $search])) {
              echo $db->getResult()[0]; // Displaying pagination links
            }
            ?>
          </ul>
        </div><!-- /post-container -->
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>