<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <td>ID</td>
        <td>Author</td>
        <td>Title</td>
        <td>Category</td>
        <td>Status</td>
        <td>Image</td>
        <td>Tags</td>
        <td>Comments</td>
        <td>Dates</td>
    </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM posts";
    $res = $conn->query($sql);
    $sn = 1;
    if($res -> num_rows > 0){
    while ($row = $res -> fetch_assoc()){
    extract($row);
    ?>
    <tbody>
    <tr>
        <td><?php echo $sn;?></td>
        <td><?php echo $post_author;?></td>
        <td><?php echo $post_title;?></td>
        <td><?php echo $post_category_id;?></td>
        <td><?php echo $post_status;?></td>
        <td><img width="100" src="image/<?php echo $post_image;?>"></td>
        <td><?php echo $post_tags;?></td>
        <td><?php echo $post_comment_counts;?></td>
        <td><?php echo $post_date;?></td>
    </tr>
    <?php $sn++; }} ?>
    </tbody>
</table>
