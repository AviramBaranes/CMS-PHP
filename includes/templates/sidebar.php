<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" name="submit" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php 
                        $sql = 'SELECT * FROM cms.categories LIMIT 5';
                        $result = mysqli_query($connection, $sql);
    
                        while($row = mysqli_fetch_assoc($result)){
                            $cat_title = $row['cat_title'];
    
                            echo "<li><a href='#'>{$cat_title}</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php include "widget.php" ?>                    
</div>