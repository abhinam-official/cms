<?php ob_start(); ?>
<?php
$conn ="";
?>

<?php include "include/admin_header.php"; ?>
<?php include "include/function.php"; ?>
<?php
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM categories WHERE categories.cat_id ={$id}";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    extract($row);
}
//calling delete function
delete_categories();
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/admin_nav.php";?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin Panel
                        <small>Author</small>
                    </h1>
                    <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source ="";
                    }
                    switch ($source){
                        case 'add_post':
                            include "include/add_comment.php";
                            break;
                        case 'master':
                            include "include/edit_comment.php";
                            break;
                        default:
                            include "include/view_all_comments.php";
                    }

                    ?>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "include/admin_footer.php";?>
