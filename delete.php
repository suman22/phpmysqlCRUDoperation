<?php
 include_once('config.php');
 $id1=$_GET['id'];
 $sql="Delete from users where id = '$id1'";
 mysqli_query($db_server,$sql);
 header("Location: index.php?deletesuccess");
?>