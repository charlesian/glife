<?php 
error_reporting(0);
ini_set('display_errors', 0);
include '../includes/functions.php';
if (isset($_POST['filter'])) {
	$column_display = $_POST['column_display'];
	$check_columns = $_POST['check_columns'];
	$check_columns = $_POST['check_columns'];
	$filter1 = $_POST['filter1'];
	$filter2 = $_POST['filter2'];

// set the query filter
	for($count = 0; $count < count($_POST["field"]); $count++){

	// $field[] = $_POST['field'][$count];
	// $operator[] = $_POST['operator'][$count];
	// $value[] = $_POST['value'][$count];

	// $field1[] = $_POST['field'][$count];
	// $operator1[] = $_POST['operator'][$count];
	// $value1[] = $_POST['value'][$count];

		$field[] = $_POST['field'][$count] . " " . $_POST['operator'][$count]. " " . $_POST['value'][$count].' AND ';

	// $params =  $field.' '.$operator.' '.$value.'AND';

	}


	$txt = implode(' ', $field);
	$str= preg_replace('/\W\w+\s*(\W*)$/', '$1', $txt);
	echo $str;
	exit;

		// echo ("<SCRIPT LANGUAGE='JavaScript'>
  //     window.alert('Successfuly Saved!')
  //     window.location.href = 'View.php?params=implode( '|', $field ),'|', implode( '|', $operator ),'|', implode( '|', $value );';
  //     </SCRIPT>");
	
 // $qwe = implode( '|', $field ),'|', implode( '|', $operator ),'|', implode( '|', $value );
 // $qwe2 = implode( '|', $field1 ),'|', implode( '|', $operator1 ),'|', implode( '|', $value1 );

	// $output = $qwe.' '.$qwe2;

 // echo $output;

	exit;


	$filterfields = $first_fields.' AND '.$second_fields;

	$str1 = implode('|', $field.''.$operator.''.$value);
// [END] set the query filter

// getting array from column display field 
	foreach ($column_display as $column) { 
		$arr[] = $column;
	}
// [END] getting array from column display field 

	$str = implode('|', $arr);

// this is finding if the value existing, will use for filtering table
	if (strpos($str, 'Alabama') !== false) {
		echo 'true';
	}else{
		echo "string";
	}
// end of [this is finding if the value existing, will use for filtering table





}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<form method="POST">
	<div style="padding-right: 15px;">
		<div style="padding-left: 10px;">
		</div>
		<button class="btn  btn-default float-right" type="submit" name="filter" ><i class="fa fa-fw fa-ban"></i>Cancel</button>
		<button class="btn  btn-outline-primary float-right" type="submit" name="filter" ><i class="fa fa-fw fa-eye"></i>Display</button>
		<button class="btn  btn-info float-right" type="submit" name="filter" ><i class="fa fa-fw fa-save"></i>Save</button>
	</div>
	<br><br>
	<section class="content">
		<div class="container-fluid">
			<!-- SELECT2 EXAMPLE -->
			<div class="card card-default collapsed-card">
				<div class="card-header">
					<h3 class="card-title">Filter</h3>

					<!-- <div class="card-tools"> this will put to the right -->
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
						<!-- </div> -->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<font>Uncheck [Custom Columns] checkbox to switch to filter default columns</font> <br>
						<input type="checkbox"  name="filter1" checked id="pety" onclick='javascript:yesnoCheck();'> <strong>Custom Columns</strong>
						<br>	
						<br>	
						<div class="container1 H1" >	
							<div class="row ">
								<div class="col-md-2  ">
									<a class="add_form_field btn btn-info" style="color:white">Add filter	 &nbsp; 
										<i class="fas fa-plus"></i>
									</a>
									
									<br>	
									<label style="padding-bottom: 5px;">&nbsp</label>
									<select class=" select2 select2-purple" name="field[]" >
										<option selected disabled>Select Field</option>
										<option><?php echo columns($connect)?></option>
									</select>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-md-2">
									<div class="form-group" >
										<br>	
										<br>	
										<label>&nbsp</label>
										<select name="operator[]" class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;">
											<option>is equal to</option>
											<option>is not equal to</option>
											<option>is less than</option>
											<option>is less than or equal</option>
											<option>is greater than</option>
											<option>is greater than or equal</option>
										</select>
									</div>
									<!-- /.form-group -->
								</div>
								<div class="col-md-2">
									<div class="form-group" >
										<br>	
										<br>	
										<label>&nbsp</label>
										<input type="text" class="form-control" style="height: 31px;" name="value[]">
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
							</div>

							<!-- /.row -->
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
				<div class="card card-default collapsed-card">
					<div class="card-header">
						<h3 class="card-title">Columns to Display</h3>
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<!-- radio -->
						<font>Uncheck [Custom Columns] checkbox to switch to default columns</font> <br>
						<input type="checkbox" name="filter2" checked class="checkbox1" onclick='javascript:yesnoCheck1();' id="chk" value="2"> Custom Columns
						<div class="row H2" >
							<div class="col-12">
								<div class="form-group">
									<select class="duallistbox" multiple="multiple" name="column_display[]">
										<option><?php echo columns($connect)?></option>
									</select>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<!-- end of form  -->
			</form>

			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Staff Table</h3>
				</div>
				
				<!-- /.card-header -->
				<div class="card-body">
					<a class="btn btn-success float-right" type="submit" name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a>
					<div class="float-right" hidden>
						<div class="btn-group">
							<a style="color:white;" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
							Export</a>
							<div class="dropdown-menu float-right" role="menu">
								<a href="#" class="dropdown-item">Add new event</a>
								<!-- <a href="#" class="dropdown-item">Clear events</a> -->
								<!-- <div class="dropdown-divider"></div> -->
								<!-- <a href="#" class="dropdown-item">View calendar</a> -->
							</div>
						</div>
					</div>
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="10"></th>
								<th width="">Date Hired</th>
								<th width="">Full Name</th>
								<th width="">Us Connection</th>
								<th width="">Number of Us Connection</th>
								<th width="">English Grade</th>
								<th width="">Status</th>
								<th width="">Team</th>
								<th width="">Employee Grade</th>
								<th width="">Employee Level</th>
								<th width="">Team Leader</th>
								<th width="">Assistant Team Leader</th>
								<th width="">Working Hours</th>
								<th width="">Full/Part Time</th>
								<th width="">Referral</th>
							</tr>
						</thead>
						<?php 
						$view_query = mysqli_query($conn, "SELECT * FROM tbl_staff ORDER BY full_name ASC");
						while ($row = mysqli_fetch_assoc($view_query)) {
							$id = $row["id"];
							$date_hired = $row["date_hired"];
							$full_name = $row["full_name"];  
							$us_connection = $row["us_connection"];
							$no_us_connection = $row["no_us_connection"];
							$english_grade = $row["english_grade"];
							$status = $row["status"];
							$team = $row["team"];
							$employee_grade = $row["employee_grade"];
							$employee_level = $row["employee_level"];
							$team_leader = $row["team_leader"];
							$team_leader_assistant = $row["team_leader_assistant"];
							$referral = $row["referral"];
							$full_part_time = $row["full_part_time"];
							$working_hours = $row["working_hours"];

							?>
							<tr>
								<td>
									<a href="UpdateStaff.php?id=<?php echo $id?>"><i class="fa fa-fw fa-edit"></i></a>
								</td>
								<td>
									<?php echo $date_hired;?>
								</td>
								<td>
									<a href="UpdateStaff.php?id=<?php echo $id?>&view=1" style="color:black;"><u><i><strong><?php echo $full_name?></strong></i></u></a>
								</td>
								<td>
									<?php echo $us_connection;?>
								</td>
								<td>
									<?php echo $no_us_connection;?>
								</td>
								<td>
									<?php echo $english_grade;?>
								</td>
								<td>
									<?php echo $status;?>
								</td>
								<td>
									<?php echo $team;?>
								</td>
								<td>
									<?php echo $employee_grade;?>
								</td>
								<td>
									<?php echo $employee_level;?>
								</td>
								<td>
									<?php echo $team_leader;?>
								</td>
								<td>
									<?php echo $team_leader_assistant;?>
								</td>
								<td>
									<?php echo $working_hours;?>
								</td>
								<td>
									<?php echo $full_part_time;?>
								</td>
								<td>
									<?php echo $referral;?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
	<script>
		$(document).ready(function() {
			var max_fields = 10;
			var wrapper = $(".container1");
			var add_button = $(".add_form_field");

			var x = 1;
			$(add_button).click(function(e) {
				e.preventDefault();
				if (x < max_fields) {
					x++;
            $(wrapper).append('<div><a href="#" class="delete btn btn-danger btn-xs">Delete</a><div style="padding-top:5px;"class="row "><div class="col-md-2 "><select name = "field[]" class="form-control select2 select2-purple" style="height:30px" ><option selected disabled>Select Field</option><option><?php echo columns($connect)?></option></select></div><div class="col-md-2"><div class="form-group" ><select name="operator[]" class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="height:30px""><option>is equal to</option><option>is not equal to</option><option>is less than</option><option>is less than or equal</option><option>is greater than</option><option>is greater than or equal</option></select></div></div><div class="col-md-2"><div class="form-group" ><input type="text" class="form-control" style="height: 31px;" name="value[]"></div></div><div class="col-md-2"><div class="form-group" ><div ></div></div></div></div></div>'); //add input box
        } else {
        	alert('You Reached the limits')
        }
    });

			$(wrapper).on("click", ".delete", function(e) {
				e.preventDefault();
				$(this).parent('div').remove();
				x--;
			})
		});
	</script>
	<script>
		function yesnoCheck() {
			if ($('#pety').is(':checked')) {
				$(".H2").hide();
				$(".H1").show();
			}else{
				$(".H2").show();
				$(".H1").hide();
			}
		}

		function yesnoCheck1() {
			if ($('#chk').is(':checked')) {
				$(".H2").show();
			}else{
				$(".H2").hide();
			}
		}

	</script>
