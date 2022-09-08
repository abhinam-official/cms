<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Fullname</td>
        <td>Email</td>
        <td>Role</td>
        <td>Date</td>
    </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM users u join content_type c ON c.content_id = u.user_role_id";
    $res = $conn->query($sql);
    $sn = 1;
    if($res -> num_rows > 0){
    while ($row = $res -> fetch_assoc()){
    extract($row);
    ?>
    <tbody>
    <tr>
        <td><?php echo $sn;?></td>
        <td><?php echo $username;?></td>
        <td><?php echo $user_fullname;?></td>
        <td><?php echo $user_email?></td>
        <td><?php echo $content_title;?></td>
        <td><?php echo $created_at;?></td>
        <td><a href="users.php?approve=<td><?php echo $user_id;?></td>">Approve</a></td>
        <td><a href="users.php?unapprove=<td><?php echo $user_id;?></td>">Unapproved</a></td>
        <td><a href="users.php?del=<?php echo $user_id;?>">Delete</a></td>
    </tr>
    <?php $sn++; }} ?>
    </tbody>
</table>
