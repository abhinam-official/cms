<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <td>ID</td>
        <td>Date</td>
        <td>Author</td>
        <td>comment</td>
        <td>Email</td>
        <td>Status</td>
        <td>In response to</td>
        <td>Approve</td>
        <td>unapprove</td>
        <td>Dalete</td>
    </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM comments";
    $res = $conn->query($sql);
    $sn = 1;
    if($res -> num_rows > 0){
    while ($row = $res -> fetch_assoc()){
    extract($row);
    ?>
    <tbody>
    <tr>
        <td><?php echo $sn;?></td>
        <td><?php echo $created_at;?></td>
        <td><?php echo $comment_author;?></td>
        <td><?php echo $comment_content;?></td>
        <td><?php echo $comment_email;?></td>
        <td><?php echo $comment_status;?></td>
        <td> In response to <?php // echo $comment_status;?></td>
        <td> Approve<?php // echo $comment_status;?></td>
        <td><?php // echo $post_comment_counts;?></td>
        <td><a href="">delete</a></td>
    </tr>
    <?php $sn++; }} ?>
    </tbody>
</table>
