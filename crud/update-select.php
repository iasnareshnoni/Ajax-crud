<?php

$id = $_POST['id'];

include('connection.php');

$sql = "SELECT * FROM crud WHERE id = {$id}";
$query = mysqli_query($con,$sql);

if(mysqli_num_rows($query) > 0){
    while($res = mysqli_fetch_assoc($query)){
?>
 <tr>
    <td>Name:</td>
    <td>
      <input type="text" id="edit-id" hidden value="<?php echo $res['id']; ?>">
      <input type="text" id="edit-name" value="<?php echo $res['name']; ?>">
   </td>
 </tr>
 <tr>
    <td>Email:</td>
    <td><input type="text" id="edit-email" value="<?php echo $res['email']; ?>"></td>
 </tr>
 <tr>
    <td>Mobile:</td>
    <td><input type="text" id="edit-mobile" value="<?php echo $res['mobile']; ?>"></td>
 </tr>
 <tr>
    <td></td>
    <td><input type="submit" id="edit-submit" value="save"></td>
 </tr>

<?php
    }
}

?>