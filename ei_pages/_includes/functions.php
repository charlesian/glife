<?php 
include 'connek.php';

function asd($connect)
{ 
  $output = '';
  $query = "SELECT columns FROM `columns` WHERE columns != 'staff_image'";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {


    $output .= '<option text="text" value="'.$row["columns"].'">'.$columns.'</option>';
  }
  return $output;
}
function columns($connect)
{ 
  $output = '';
  $query = "SELECT COLUMN_NAME as columns FROM information_schema.columns WHERE table_name = 'tbl_staff'";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {

  	

    $output .= '<option text="text" value="'.$row["columns"].'">'.$row["columns"].'</option>';
  }
  return $output;
}


?>