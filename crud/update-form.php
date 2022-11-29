<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

include ('connection.php');

$sql = "UPDATE crud SET name = '{$name}', email = '{$email}', mobile = '{$mobile}' WHERE id = '{$id}'";
$query = mysqli_query($con, $sql);

if($query){
    echo 1;
}else{
    echo 0;
}

?>