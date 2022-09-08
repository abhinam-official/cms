<?php ob_start(); ?>
<?php include "include/admin_header.php"; ?>
<?php include "include/function.php"; ?>
<?php
    $sql = "SELECT * FROM users WHERE users.user_id ='3'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    extract($row);
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

                    ?>

                      <form action="<?PHP htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                        <input
                                type="hidden"
                                name="id"
                                value="<?php echo(!empty($id))? $id :''; ?>"
                        />
                        <div class="form-group">
                            <label for="user_fullname">Fullname</label>
                            <input type="text" class="form-control" name="user_fullname" id="user_fullname"
                                   value="<?php echo(!empty($user_fullname))? $user_fullname :''; ?>"
                            required>
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="user_roll_id" required>
                                <option selected value="<?php echo(!empty($user_role_id))?$user_role_id: '';?>">Select role Type </option>
                                <?php
                                $type_sql = "SELECT * FROM content_type c join master m ON c.master_id = m.master_id WHERE c.master_id = '5'";
                                $type_res = $conn -> query($type_sql);
                                while ($row = $type_res -> fetch_assoc()){
                                    echo '<option value="'.$row['content_id'] .'">'.$row['content_title'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_category_id">Email</label>
                            <input type="email" class="form-control" name="user_email" id="user_email"
                                value="<?php echo(!empty($user_email))? $user_email :''; ?>"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                 value="<?php echo(!empty($username))? $username :''; ?>"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="post_status">Password</label>
                            <input type="password" class="form-control" name="user_password" id="user_password"
                                   value="<?php echo(!empty($user_password))? $user_password :''; ?>"
                            required>
                        </div>
                        <div class="form-group">
                            <label for="image">User Image
                                <?php
                                if(!empty($feature_image)){
                                    echo '<img width = "200" height = "200" src="image/users/'.$user_image.'">';
                                }
                                ?>
                            </label>
                            <input type="file" class="form-control" name="user_image" id="user_image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="create_post" id="" value="Add User">
                        </div>
                    </form>
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
