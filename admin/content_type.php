<?php ob_start(); ?>
<?php
$conn ="";
?>

<?php include "include/admin_header.php"; ?>
<?php include "include/function.php"; ?>
<?php
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM content_type WHERE content_type.content_id ={$id}";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    extract($row);
}
//calling delete function
delete_content_type();
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
                    <!-- Add content_type -->
                    <?php save_content_type(); ?>
                    <div class="col-xs-5">
                        <form action="<?PHP htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input
                                    type="text"
                                    class="form-control"
                                    style="display:none;"
                                    id="content_id"
                                    name="content_id"
                                    value="<?php echo(!empty($content_id))?$content_id: '';?>"
                            />
                            <div class="form-group">
                                <label for="content_title">Add content type</label>
                                <input type="text" class="form-control" value="<?php echo(!empty($content_title))?$content_title: '';?>" name="content_title" id="content_title" required>
                            </div>
                            <div class="form-group">
                                <label for="content_title">Master Category</label>
                                <select class="form-control"  name="master_id" id="master_id" required>
                                    <option value="<?php echo(!empty($master_id))?$master_id: '';?>">Select Master Type</option>
                                    <?php
                                    $master = "SELECT * FROM master";
                                    $result = $conn->query($master);
                                    while ($master_type = $result->fetch_assoc()){
                                        extract($master_type);
                                        ?>
                                        <option value="<?php echo $master_id;?>"><?php echo $master_title;?></option>
                                        <?php
                                    }
                                    ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" style="margin-top: 10px" class="btn bg-primary" name="submit" id="submit" value="Save">
                            </div>
                        </form>
                        <a href="master_category.php"><button class="btn btn-success">Master Type</button></a>
                        &nbsp;<a href="content.php"><button class="btn btn-success">Content</button></a>
                    </div>
                    <!-- Add content_type -->
                    <!-- content_type Table-->
                    <div class="col-xs-6">
                        <?php
                        $sql = "SELECT * FROM master m,content_type c WHERE m.master_id = c.master_id";
                        $res = $conn->query($sql);
                        $sn = 1;
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Master Id</th>
                                <th>content_type Title</th>
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
                                        <td> {$master_title}</td>
                                        <td>{$content_title}</td>
                                        <td><a href='content_type.php?edit={$content_id}'><button class='btn btn-warning'>Edit</button></a>
                                       <a href='content_type.php?del={$content_id}'><button class='btn btn-danger'>Delete</button></td></a>
                                    </tr>";
                                    $sn++;
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
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
