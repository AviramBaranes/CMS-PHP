<?php include "includes/admin_header.php";?>
    <div id="wrapper">
      <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
              </h1>

              <div class="col-xs-6">

              <?php
                if(isset($_POST['submit'])){
                  $cat_title = $_POST['cat_title'];

                  if(empty($cat_title)) echo "<p style='color: red;'>This field can not be empty!</p>";
                  else{
                    $sql = "INSERT INTO categories (cat_title) VALUE ('$cat_title')";
                    $insert_result = mysqli_query($connection, $sql);

                    if(!$insert_result) die('QUERY FAILED' . mysqli_error($connection));
                  }
                }
              ?>
              
                  <form method="post">
                      <div class="form-group">
                          <label for="cat-title">Add Category</label>
                          <input type="text" class="form-control" name="cat_title">
                      </div>
                      <div class="form-group">
                          <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                      </div>

                  </form>
              </div>

              <div class="col-xs-6">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Category Title</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $sql = "SELECT * FROM categories";
                          $categories_query = mysqli_query($connection, $sql);

                          while($row = mysqli_fetch_assoc($categories_query)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                        ?>
                          <tr>
                              <td><?php echo $cat_id ?></td>
                              <td><?php echo $cat_title ?></td>
                              <td><a href="categories.php?delete=<?php echo $cat_id ?>">Delete</a></td>
                          </tr>
                      <?php  } ?>
                      <?php
                      if(isset($_GET['delete'])){
                        $cat_id_to_delete = $_GET['delete'];
                        $sql = "DELETE FROM categories WHERE cat_id = '$cat_id_to_delete'";
                        mysqli_query($connection, $sql);
                        header("Location: categories.php");
                      }
                      ?>
                      </tbody>
                  </table>
              </div>
             
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    
<?php include "includes/admin_footer.php"; ?>
