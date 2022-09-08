<?php ob_start();
$conn ="";
include "include/admin_header.php";
include "include/function.php";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM master WHERE master.master_id ={$id}";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    extract($row);
}
//calling delete function
delete_master_id();
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
                    <!-- Add Master -->
                    <?php save_master_category(); ?>
                    <div class="col-xs-5">
                        <form action="<?PHP htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input
                                    type="text"
                                    class="form-control"
                                    style="display:none;"
                                    id="master_id"
                                    name="master_id"
                                    value="<?php echo(!empty($master_id))?$master_id: '';?>"
                            />
                            <div class="form-group">
                                <label for="master_title">Master id</label>
                                <input type="text" class="form-control" value="<?php echo(!empty($master_title))?$master_title: '';?>" name="master_title" id="master_title" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn bg-primary" name="submit" id="submit" value="Save Category">
                            </div>
                        </form>
                        <a href="content_type.php"><button class="btn btn-success">Content Type</button></a>
                        &nbsp;<a href="content.php"><button class="btn btn-success">Content</button></a>
                    </div>
                    <!-- Add Category -->
                    <!-- Category Category Table-->
                    <div class="col-xs-6">
                        <?php
                        $sql = "SELECT * FROM master";
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
                                        <td>{$master_title}</td>
                                        <td><a href='master_category.php?edit={$master_id}'><button class='btn btn-warning'>Edit</button></a>
                                       <a href='master_category.php?del={$master_id}'><button class='btn btn-danger'>Delete</button></td></a>
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
