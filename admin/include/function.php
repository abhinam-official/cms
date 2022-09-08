<?php
function save_categories(){
    global $conn;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        $id = $_POST['cat_id'];
        $sql = "INSERT INTO categories(cat_id,cat_title)
                                VALUES('$id','$cat_title')ON DUPLICATE KEY 
                                UPDATE cat_title='$cat_title'";
        if($conn->query($sql)===TRUE){
            echo "Data inserted Successfully";
            header("location:categories.php");
        }else{
            echo "Data does not recorded";
        }
    }
}

function delete_categories(){
    global $conn;
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $delete = "DELETE FROM categories WHERE categories.cat_id ={$id}";
        if($conn ->query($delete)){
            header("location:categories.php");
        }else {
            echo "Something went wrong, Please try again";
        }
    }

}
function save_master_category(){
    global $conn;
    if(isset($_POST['submit'])){
        $master_title = $_POST['master_title'];
        $id = $_POST['master_id'];
        $sql = "INSERT INTO master(master_id,master_title)
                                VALUES('$id','$master_title')ON DUPLICATE KEY 
                                UPDATE master_title='$master_title'";
        if($conn->query($sql)===TRUE){
            echo "Data inserted Successfully";
            header("location:master_category.php");
        }else{
            echo "Data does not recorded";
        }
    }
}
function delete_master_id(){
    global $conn;
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $delete = "DELETE FROM master WHERE master.master_id ={$id}";
        if($conn ->query($delete)){
            header("location:master_category.php");
        }else {
            echo "Something went wrong, Please try again";
        }
    }

}
function save_content_type(){
    global $conn;
    if(isset($_POST['submit'])){
        $content_id = $_POST['content_id'];
        $content_title = $_POST['content_title'];
        $master_id = $_POST['master_id'];
        $sql = "INSERT INTO content_type (content_id,master_id,content_title)
                                VALUES('$content_id','$master_id','$content_title')ON DUPLICATE KEY 
                                UPDATE master_id = '$master_id', content_title='$content_title'";
        if($conn->query($sql)===TRUE){
            echo "Data inserted Successfully";
            header("location:content_type.php");
        }else{
            echo "Data does not recorded";
        }
    }
}
function delete_content_type(){
    global $conn;
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $delete = "DELETE FROM content_type WHERE content_type.content_id ={$id}";
        if($conn ->query($delete)){
            header("location:content_type.php");
        }else {
            echo "Something went wrong, Please try again";
        }
    }

}

function save_content(){
    global $conn;
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $content_title = $_POST['content_title'];
        $content_type_id = $_POST['content_type_id'];
        $content = $_POST['content'];

        $image_file = $_FILES['image'];
        $image_name = $image_file['name'];
        $tmp_name = $image_file['tmp_name'];
        $target = "image/";
        $target_file = $target.$image_name;
        move_uploaded_file($tmp_name,$target_file);
        $sql = "INSERT INTO content (id,content_type_id,title,image,content)
                                VALUES('$id','$content_type_id','$content_title','$image_name','$content')ON DUPLICATE KEY 
                                UPDATE content_type_id = '$content_type_id', content_title='$content_title',image='$image_name',content='$content'";
        if($conn->query($sql)===TRUE){
            echo "Data inserted Successfully";
            header("location:content.php");
        }else{
            echo "Data does not recorded";
        }
    }
}
function delete_content(){
    global $conn;
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $delete = "DELETE FROM contente WHERE content.id ={$id}";
        if($conn ->query($delete)){
            header("location:content.php");
        }else {
            echo "Something went wrong, Please try again";
        }
    }

}

function confirmQuery($result){
    global $conn;
    if(!$result){
        die("QUERY FAILED:".mysqli_error($conn));
    }
}

?>
