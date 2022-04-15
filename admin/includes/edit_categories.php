
<form method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>

        <?php 

            if(isset($_GET['edit'])){
                $cat_id_to_edit = $_GET['edit'];
                $sql = "SELECT * FROM categories WHERE cat_id = $cat_id_to_edit";
                $cat_title =mysqli_fetch_assoc(mysqli_query($connection, $sql))['cat_title'];
            }

            
            
        ?>
        
        <input type="text" value="<?php if(isset($cat_title)) echo $cat_title; ?>" class="form-control" name="cat_title">


        <?php 
            if(isset($_POST['update'])){
                $cat_title = $_POST['cat_title'];
                $sql = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($connection, $sql);
                
                if(!$update_query)die('QUERY ERROR' . mysqli_error($connection));
            }
        ?>
        
        
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update Category">
    </div>

</form>