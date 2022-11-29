<?php

$id = $_POST['id'];
include ('connection.php');

$sql = "DELETE FROM crud WHERE id = {$id}";
$query = mysqli_query($con,$sql);
if($query){
    echo 1;
}else{
    echo 0;
}



?>
