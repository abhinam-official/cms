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
// delete
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $delete = "DELETE FROM users WHERE users.user_id ={$id}";
    if($conn ->query($delete)){
        header("location:users.php");
    }else {
        echo "Something went wrong, Please try again";
    }
}

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
                        case 'add_user':
                            include "include/add_user.php";
                            break;
                        case 'edit_user':
                            include "include/edit_user.php";
                            break;
                        case 'delete_user':
                            echo 'include/delete.php';
                            break;
                        case '100':
                            echo 'NICE 100';
                            break;
                        default:
                            include "include/view_all_users.php";
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
