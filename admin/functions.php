<?php 

    function insert_categories(){
        global $connection;
        
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];

            if(empty($cat_title)) echo "<p style='color: red;'>This field can not be empty!</p>";
            else{
              $sql = "INSERT INTO categories (cat_title) VALUE ('$cat_title')";
              $insert_result = mysqli_query($connection, $sql);

              if(!$insert_result) die('QUERY FAILED' . mysqli_error($connection));
            }
          }
    }
    
    function findAllCategories(){
        global $connection;
        
        $sql = "SELECT * FROM categories";
        $categories_query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_assoc($categories_query)){
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
            echo '<tr>';
            echo "<td>{$cat_id}</td>";
            echo "<td>$cat_title </td>";
            echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
            echo "<td><a href='categories.php?edit= $cat_id '>Edit</a></td>";
            echo "</tr>";
        } 
    }

    function deleteCategories(){
        global $connection;
        if(isset($_GET['delete'])){
            $cat_id_to_delete = $_GET['delete'];
            $sql = "DELETE FROM categories WHERE cat_id = '$cat_id_to_delete'";
            mysqli_query($connection, $sql);
            header("Location: categories.php");
          }
    }
?>