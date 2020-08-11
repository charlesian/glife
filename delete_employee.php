<?php 
$conn = mysqli_connect("localhost","root","","payrolldy");
$id = $_GET['id'];

$delete = mysqli_query($conn,"DELETE FROM tbl_employee WHERE id = '$id' ");
if ($delete) {
echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('Success : Profile Successfuly Deleted!');
  window.location.href='ViewEmployee.php';
  </SCRIPT>");
}else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('Success : Error Occured!');
  </SCRIPT>");
}

  ?>