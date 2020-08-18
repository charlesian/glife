<?php
include "../_includes/connek.php";

$userid = $_POST['userid'];

$sql = "select * from tbl_attendance_excuse WHERE staff_id =".$userid;
$result = mysqli_query($conn,$sql);

    $response = "";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $note = $row['excuse'];
    
    $response .= "<input class='form-control' type='text' name='note' value='$note' >";
    $response .= "<input hidden type='text' name='id' value='$userid' >";
}

echo $response;
exit;