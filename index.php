<?php include "include/header.php"; ?>
<!-- Navigation -->
<?php include "include/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                $conn = "";
                include "include/db.php";
                $sql = "SELECT * FROM posts";
                $res = $conn->query($sql);
                if($res -> num_rows > 0){
                    //$row = $res -> fetch_assoc();

                    //
                    while ($row = $res -> fetch_assoc()){
                        extract($row);
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <h2>
                    <a href="#"><?php  echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php  echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php  echo $post_date; ?>M</p>
                <hr>
                <img class="img-responsive" src="image/<?php  echo $post_image; ?>" alt="">
                <hr>
                <p><?php  echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                    <?php } } ?>
            </div>
            <?php include "include/sidebar.php"; ?>
        </div>

        <!-- Footer -->

        <?php include "include/footer.php"; ?>
