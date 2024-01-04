<?php
@include 'config.php';
$id= $_GET['id'];
$query = "DELETE FROM user_form WHERE id='$id'";
$data=mysqli_query($conn,$query);
if($data){
    echo "Record Deleted!";
    ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/Bus_Management_System/admin_page.php" />
    <?php
}
else{
    echo "Failed to deleted!";
}
?>