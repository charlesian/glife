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

  	if ($row["columns"] == 'full_name') {
  		$columns = 'Full Name';
  	}
  	if ($row["columns"] == 'status') {
  		$columns = 'Status';
  	}
  	if ($row["columns"] == 'birth_date') {
  		$columns = 'Birth Day';
  	}
  	if ($row["columns"] == 'date_hired') {
  		$columns = 'Date Hired';
  	}
  	if ($row["columns"] == 'date_resign_fired') {
  		$columns = 'Resign Date';
  	}
  	if ($row["columns"] == 'city') {
  		$columns = 'City';
  	}
  	if ($row["columns"] == 'country_code') {
  		$columns = 'Country Code';
  	}
  	if ($row["columns"] == 'phone_number') {
  		$columns = 'Phone Number';
  	}
  	if ($row["columns"] == 'email') {
  		$columns = 'Email Address';
  	}
  	if ($row["columns"] == 'team') {
  		$columns = 'Team';
  	}
  	if ($row["columns"] == 'team_leader') {
  		$columns = 'Team Leader';
  	}
  	if ($row["columns"] == 'team_leader_assistant') {
  		$columns = 'Team Leader Assistant';
  	}
  	if ($row["columns"] == 'employee_level') {
  		$columns = 'Employee Level';
  	}
  	if ($row["columns"] == 'payroll_method') {
  		$columns = 'Payroll Method';
  	}
  	if ($row["columns"] == 'payroll_status') {
  		$columns = 'Payroll Status';
  	}
  	if ($row["columns"] == 'employee_grade') {
  		$columns = 'Employee Grade';
  	}
  	if ($row["columns"] == 'english_grade') {
  		$columns = 'English Grade';
  	}
  	if ($row["columns"] == 'referral') {
  		$columns = 'Referral';
  	}
  	if ($row["columns"] == 'referral_type') {
  		$columns = 'Referral Type';
  	}
  	if ($row["columns"] == 'us_connection') {
  		$columns = 'Us Connection';
  	}
  	if ($row["columns"] == 'no_us_connection') {
  		$columns = 'Number Us Connection';
  	}
  	if ($row["columns"] == 'plus_fifteen_date_hired') {
  		$columns = '+15 Date Hired';
  	}
  	if ($row["columns"] == 'plus_thirty_date_hired') {
  		$columns = '+30 Date Hired';
  	}
  	if ($row["columns"] == 'working_hours') {
  		$columns = 'Working Hours';
  	}
  	if ($row["columns"] == 'full_part_time') {
  		$columns = 'Full / Part Time';
  	}
  	if ($row["columns"] == 'shift_leader') {
  		$columns = 'Shift Leader';
  	}
  	if ($row["columns"] == 'medical_condition') {
  		$columns = 'Medical Condition';
  	}
  	if ($row["columns"] == 'busy_staff') {
  		$columns = 'Medical Condition';
  	}
  	if ($row["columns"] == 'warning_dismissal') {
  		$columns = 'Final Warning Before Dismissal';
  	}


    $output .= '<option text="text" value="'.$row["columns"].'">'.$columns.'</option>';
  }
  return $output;
}


?>