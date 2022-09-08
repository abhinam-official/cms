<?php
if(isset($_POST['create_post'])){
   extract($_POST);
   $post_comment_counts = 4;
   $post_view_count =400;
   $image = $_FILES['post_image'];
   $post_image = $image['name'];
   $tmp_name = $image['tmp_name'];

   //date
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    if($post_image){
        $target = "image/post/$post_image";
        move_uploaded_file($tmp_name,$target);
    }
    $query ="INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_user`, `post_image`, `post_content`, `post_tags`, `post_comment_counts`, `post_status`, `post_view_count`) VALUES ('2', '$post_title', '$post_author', 'Abhi', '$post_image', '$post_content', 'Gorakhnath,Shiva', '$post_comment_counts', '$post_status', '$post_view_count')";

    $create_post_query = $conn->query($query);
    confirmQuery($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="post_title" id="post_title" required>
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category ID</label>
        <input type="text" class="form-control" name="post_category_id" id="post_category_id" required>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="post_author" id="author" required>
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status" required>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="post_image" id="image" required>
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="post_content" cols="30" rows="" required></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" id="image" value="Publish Post">
    </div>
</form>