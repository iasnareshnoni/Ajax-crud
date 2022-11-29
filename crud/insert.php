<?php

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

include ('connection.php');

$sql = "INSERT INTO crud (name,email,mobile) VALUES('{$name}','{$email}','{$mobile}')";
$query = mysqli_query($con, $sql);

if($query){
    echo 1;
}else{
    echo 0;
}

?>