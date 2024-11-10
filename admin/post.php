<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1 class="admin-heading">All Posts</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-post.php">add post</a>
      </div>
      <div class="col-md-12">
        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php // Fetching posts using select method and showing it  
            $page = null; // Initializing page variable
            // Check if postId is set in url
            if (isset($_GET['pid'])) {
              $page = $_GET['pid']; // Storing postId in $page variable
            } else {
              $page = 1;
            }
            $limit = 3; // Records limit
            $offset = ($page - 1) * $limit; // Posts records offset
            $author = $_SESSION['userId']; // Storing current user id in $author variable
            if ($db->select("post", "post_id, title,category_name, post_date, username", " category ON post.category = category.category_id JOIN user ON post.author = user.user_id", " post.author = $author", "", " $offset, $limit")) {
              foreach ($db->getResult() as $value) {
                ?>
                <tr>
                  <td class='id'><?php echo $value['post_id']; ?></td>
                  <td><?php echo $value['title']; ?></td>
                  <td><?php echo $value['category_name']; ?></td>
                  <td><?php echo $value['post_date']; ?></td>
                  <td><?php echo ucfirst($value['username']); ?></td>
                  <td class='edit'><a href='update-post.php?pid=<?php echo $value['post_id']; ?>'><i
                        class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='delete-post.php?pid=<?php echo $value['post_id']; ?>'><i
                        class='fa fa-trash-o'></i></a></td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
        <ul class='pagination admin-pagination'>
          <?php
          // Calling Pagination function and fetching paginationItems
          $currentFileName = basename($_SERVER['PHP_SELF']); // Basename of file
          // Calling pagination function
          if ($db->pagination("post", "post_id", $limit, $currentFileName, "pid", $page, " author = {$_SESSION['userId']}")) {
            $links = $db->getResult()[0]; // Getting result and showing links
            echo $links;
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>