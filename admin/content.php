<?php ob_start(); ?>
<?php
$conn ="";
?>

<?php include "include/admin_header.php"; ?>
<?php include "include/function.php"; ?>
<?php
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM content WHERE content.id ={$id}";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    extract($row);
}
//calling delete function
//delete_content();
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
                    <a href="master_category.php"><button class="btn btn-success">Master Type</button></a>
                    &nbsp;<a href="content_type.php"><button class="btn btn-success">Content Type</button></a>
                    <br><br>
                    <!-- Add content -->
                    <?php  save_content(); ?>
                    <div class="col-xs-4">
                        <form action="<?PHP htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <input
                                type="text"
                                class="form-control"
                                style="display:none;"
                                id="id"
                                name="id"
                                value="<?php echo(!empty($id))?$id: '';?>"
                            />
                            <div class="form-group">
                                <label for="content_title"> Content Title</label>
                                <input type="text" class="form-control" value="<?php echo(!empty($content_title))?$content_title: '';?>" name="content_title" id="content_title" required>
                            </div>
                            <div class="form-group">
                                <label for="content_title">Content Image</label>
                                <input type="file" class="form-control" value="<?php echo(!empty($image))?$image: '';?>" name="image" id="image" required>
                            </div>
                            <div class="form-group">
                                <label for="content_title">Content</label>
                                <input type="text" class="form-control" value="<?php echo(!empty($content))?$content: '';?>" name="content" id="content" required>
                            </div>
                            <div class="form-group">
                                <label for="content_title">Content Type</label>
                                <select class="form-control" value="<?php echo(!empty($content_type_id))?$content_type_id: '';?>" name="content_type_id" id="content_type_id" required>
                                    <?php
                                    $master = "SELECT * FROM content_type";
                                    $result = $conn->query($master);
                                    while ($master_type = $result->fetch_assoc()){
                                        extract($master_type);
                                        ?>
                                        <option value="<?php echo $content_id;?>"><?php echo $content_title;?></option>
                                        <?php
                                    }
                                    ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn bg-primary" name="submit" id="submit" value="Save">
                            </div>
                        </form>
                    </div>
                    <br>
                    <!-- Add content -->
                    <!-- content Table-->
                    <div class="col-xs-8">
                        <?php
                       $sql = "SELECT * FROM content_type a,content c WHERE a.content_id = c.id";
                        $res = $conn->query($sql);
                        $sn = 1;
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Content Type Title</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Content</th>
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
                                        <td> {$content_title}</td>
                                        <td>{$title}</td>
                                        <td><img src='image/{$image}' width='50' height='50'></td>
                                        <td>{$content}</td>
                                        <td><a href='content.php?edit={$content_id}'><button class='btn btn-warning'>Edit</button></a>
                                       <a href='content.php?del={$content_id}'><button class='btn btn-danger'>Delete</button></td></a>
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
