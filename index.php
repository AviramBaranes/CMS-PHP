<?php 
    include "includes/templates/header.php";
?>

    <!-- Navigation -->
    <?php include "includes/templates/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
                $sql = 'SELECT * FROM posts';
                $result = mysqli_query($connection, $sql);

                if($result -> num_rows === 0){
                    echo "<h1 class='page-header'>No post yet :(</h1>";
                }
                
                while($row = mysqli_fetch_assoc($result)){
                    $title = $row['post_title'];
                    $author = $row['post_author'];
                    $date = $row['post_date'];
                    $content = $row['post_content'];
                    $image = $row['post_image'];
            ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $date?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $image?>" alt="">
                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php } ?>
            </div>
                <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/templates/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include 'includes/templates/footer.php';?>