<?php
include ('connection.php');
$sql = "SELECT * FROM crud";
$query = mysqli_query($con, $sql);

if(mysqli_num_rows($query) > 0){
    while($res = mysqli_fetch_assoc($query)){
?>
   <tr>
    <td><?php echo $res['id'];?></td>
    <td><?php echo $res['name'];?></td>
    <td><?php echo $res['email'];?></td>
    <td><?php echo $res['mobile'];?></td>
    <td><button class="edit-btn btn btn-danger" data-eid = '<?php echo $res['id'];?>'>Edit</button></td>
    <td><button class="delete-btn btn btn-success" data-did = '<?php echo $res['id'];?>'>Delete</button></td>
   </tr>


<?php
    }

}else{
    echo "NO Record Found";
}


?>