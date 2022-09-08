<?php
if(isset($_POST['create_post'])){
    extract($_POST);

    if(!empty($_FILES['user_image']['name'])) {
        $image = $_FILES['user_image'];
        $user_image = $image['name'];
        $tmp_name = $image['tmp_name'];

        if ($user_image) {
            $target = "image/users/$user_image";
            move_uploaded_file($tmp_name, $target);
        }
    }else{
        $user_image =Null;
    }
    $query ="INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_fullname`, `user_email`, `user_image`, `user_role_id`) VALUES ('$id', '$username', '$user_password', '$user_fullname', '$user_email', '$user_image', '$user_roll_id')";

    $create_post_query = $conn->query($query);
    confirmQuery($create_post_query);
}

?>

<form action="<?PHP htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <input
            type="hidden"
            name="id"
            value="<?php echo(!empty($id))? $id :''; ?>"
    />
    <div class="form-group">
        <label for="user_fullname">Fullname</label>
        <input type="text" class="form-control" name="user_fullname" id="user_fullname" required>
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
        <input type="email" class="form-control" name="user_email" id="user_email" required>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="post_status">Password</label>
        <input type="password" class="form-control" name="user_password" id="user_password" required>
    </div>
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" class="form-control" name="user_image" id="user_image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" id="" value="Add User">
    </div>
</form>