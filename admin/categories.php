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
                    <!-- Add Category -->
                    <?php save_categories(); ?>
                    <div class="col-xs-5">
                        <form action="<?PHP htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input
                                    type="text"
                                    class="form-control"
                                    style="display:none;"
                                    id="cat_id"
                                    name="cat_id"
                                    value="<?php echo(!empty($cat_id))?$cat_id: '';?>"
                            />
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" value="<?php echo(!empty($cat_title))?$cat_title: '';?>" name="cat_title" id="cat_title" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn bg-primary" name="submit" id="submit" value="Save Category">
                            </div>
                        </form>
                    </div>
                    <!-- Add Category -->
                    <!-- Category Category Table-->
                    <div class="col-xs-6">
                        <?php
                        $sql = "SELECT * FROM categories";
                        $res = $conn->query($sql);
                        $sn = 1;
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($res -> num_rows > 0){
                                while ($row = $res -> fetch_assoc()){
                                    extract($row);
                                    echo "<tr>
                                        <td>{$sn}</td>
                                        <td>{$cat_title}</td>
                                        <td><a href='categories.php?edit={$cat_id}'><button class='btn btn-warning'>Edit</button></a>
                                       <a href='categories.php?del={$cat_id}'><button class='btn btn-danger'>Delete</button></td></a>
                                    </tr>";
                                    $sn++;
                                }
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

</div>
<!-- /#wrapper -->
<?php include "include/admin_footer.php";?>
