<?php 
error_reporting(0);
ini_set('display_errors', 0);
include '../_includes/functions.php';

$params = $_GET['params'];
$columns = $_GET['columns'];

echo $params;
echo "<br>";
echo $columns;

	if (strpos($str, 'Alabama') !== false) {
		echo 'true';
	}else{
		echo "string";
	}


?>
<!-- filtering -->
<?php 

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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- /.col -->
<div class="col-md-12">
<div class="card">
	<div class="card-header p-2">
		<ul class="nav nav-pills">
			<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Table</a></li>
			<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Filter/Settings</a></li>
		</ul>
	</div><!-- /.card-header -->
	<div class="card-body">
		<div class="tab-content">
			<div class="active tab-pane" id="activity">
				<!-- Post -->
				<section class="content">
<div class="container-fluid">
	<div class="">
		<form method="POST">
			<div class="card">
				
				<?php if ($access != NULL): ?>
					<div class="col-md-2" style="padding-left: 30px;padding-top: 10px;">
						<?php if ($triggerA == NULL): ?>
							<div>
								<button type="submit" name="start" class="btn btn-info btn-sm"><i class="fa fa-fw fa-play"></i>START</button>

							</div>
						<?php endif ?>

						<?php if ($triggerA == 1): ?>
							<div>
								<button type="submit" name="end" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pause"></i>END</button>
							</div>
						<?php endif ?>

						<?php if ($triggerA == 2): ?>
							<div>
								<button type="submit" name="entry" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-play"></i>Late Entry </button>
							</div>
						<?php endif ?>

						<?php if ($triggerA == 3): ?>
							<div>
								<button type="submit" name="done" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check-square"></i>Set Done</button>
							</div>
						<?php endif ?>
						<br>
						<?php if (mysqli_num_rows($check)>0): ?>
							
							<?php else: ?>
								<?php if ($triggerA == 1 || $triggerA == 3 ): ?>
									<?php if (mysqli_num_rows($check)>0): ?>
										<?php else: ?>	
											<button type="submit" name="stamp" class="btn btn-success btn-sm"><i class="fa fa-fw fa-gavel"></i>STAMP</button>
										<?php endif ?>
									<?php endif ?>
								<?php endif ?>
							</div>
						<?php endif ?>
						<?php if (mysqli_num_rows($check)>0): ?>
							<?php else: ?>
								<?php if ($access == NULL): ?>
									<?php if ($triggerA == NULL): ?>
										<div class="col-md-2" style="padding-left: 30px;padding-top: 10px;">
											<a href ="View.php" class="btn btn-success btn-sm"><i class="fa fa-fw fa-clock"></i>DTR Now</a>
										</div>
									<?php endif ?>
									<?php if ($triggerA == 1 || $triggerA == 3): ?>
										<div class="col-md-1" style="padding-left: 30px;padding-top: 10px;">
											<button type="submit" name="stamp" class="btn btn-success btn-sm"><i class="fa fa-fw fa-gavel"></i>STAMP</button>
										</div>
									<?php endif ?>
								<?php endif ?>

							<?php endif ?>


							<!-- /.card-header -->
							<div class="card-body">
								<?php if ($access != NULL): ?>
									<a class="btn btn-success float-right" onclick="Export()" id="btnExport" value="Export"  name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a>
									<!-- <a class="btn btn-success float-right" href="Exports.php" name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a> -->
								<?php endif ?>
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
							</form>
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width=""></th>
										<th width="">Full Name</th>
										<th width="">Present</th>
										<th width="">Stayed?</th>
										<th width="">Late</th>
										<th width="">Team</th>
										<th width="">Status</th>
										<th width="">Employee Level</th>
										<th width="">Transition</th>
									</tr>
								</thead>
								<?php 
								echo "";
								$view_query = mysqli_query($conn, "SELECT staff.full_name,staff.team,staff.status as staff_status,staff.emp_level,staff.transition,ta.date,ta.status,ta.note,ta.id FROM tbl_attendance ta LEFT JOIN tbl_staff staff on staff.id = ta.staff_id ORDER BY staff.full_name ASC");
								while ($row = mysqli_fetch_assoc($view_query)) {
									$id = $row["id"];
									$full_name = $row["full_name"];  
									$team = $row["team"];  
									$staff_status = $row["staff_status"];  
									$emp_level = $row["emp_level"];  
									$transition = $row["transition"];  
									$status = $row["status"];
									$remarks = $row["note"];
									$date = $row["date"];
									$attendance = date('d F   h:i A');
									?>
									<tr>
										<td>
											<?php echo $id;?>
										</td><td>
											<?php echo $full_name;?>
										</td>
										<td>
											<strong><?php echo $attendance;?></strong>
										</td>
										<td>
											<?php if ($remarks != NULL): ?>
													<a data-toggle="modal" data-target="#modal-primary_<?php echo $row['id']; ?>" class=""><i class="fa fa-edit"></i><u><?php echo $remarks;?></u></a>
												<?php else: ?>
													<a data-toggle="modal" data-target="#modal-info_<?php echo $row['id']; ?>" class="btn btn-block btn-outline-primary btn-xs"><i class="fa fa-edit"></i>Remarks</a>
												<?php endif ?>
											</td>
											<td>
												<?php if ($status == 1): ?>
													Late
												<?php endif ?>
											</td>
											<td>
												<strong><?php echo $team;?></strong>
											</td>
											<td>
												<strong><?php echo $staff_status;?></strong>
											</td>
											<td>
												<strong><?php echo $emp_level;?></strong>
											</td>
											<td>
												<strong><?php echo $transition;?></strong>
											</td>
										</tr>
										<!-- INSERT REMARKS -->
											<div class="modal  fade" id="modal-info_<?php echo $row['id']; ?>">
												<!-- <div class="modal" data-target="#modal-info_<?php echo $row['id']; ?>"> -->
													<div class="modal-dialog">
														<div class="modal-content bg-info">
															<div class="modal-header">
																<h4 class="modal-title">Remarks</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span></button>
																</div>
										<form method="POST">
																<div class="modal-body">
																	<input  class="form-control"type="text" name="note" >
																	<input hidden class="form-control"type="text" name="idC" value="<?php echo $id; ?>">
																	<br>  
																</div>
																<div class="modal-footer justify-content-between">
																	<button type="submit" id="<?php echo $id;?>" name ="remarks_button"class="btn btn-outline-light"><i class="fa fa-fw fa-save"></i>Save changes</button>
											</form>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>


	<div class="modal fade" id="modal-primary_<?php echo $row['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Update Remarks</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
										<form method="POST">
            <div class="modal-body">
              <input  class="form-control"type="text" name="noteU" value="<?php echo $remarks?>">
			<input hidden class="form-control"type="text" name="idCu" value="<?php echo $id; ?>"><br>  
            </div>
            <div class="modal-footer justify-content-between">
              <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button> -->
              <button type="submit" name ="update_remarks" class="btn btn-outline-light"><i class="fa fa-fw fa-save"></i>Save changes</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
												<!-- UPDATE REMARKS -->
												<div class="modal  fade" id="modal-info2_<?php echo $row['id']; ?>">
												<!-- <div class="modal" data-target="#modal-info_<?php echo $row['id']; ?>"> -->
													<div class="modal-dialog">
														<div class="modal-content bg-info">
															<div class="modal-header">
																<h4 class="modal-title">Remarks</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span></button>
																</div>
										<form method="POST">
																<div class="modal-body">
																	<input  class="form-control"type="text" name="note" value="<?php echo $remarks?>">
																	<input hidden class="form-control"type="text" name="idC" value="<?php echo $id; ?>">
																	<br>  
																</div>
																<div class="modal-footer justify-content-between">
																	<button type="submit" id="<?php echo $id;?>" name ="remarks_button"class="btn btn-outline-light"><i class="fa fa-fw fa-save"></i>Save changes</button>
											</form>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												<!-- /.modal -->
											<?php } ?>
										</table>
									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.row -->
							</div><!-- /.container-fluid -->
						</section>
				<!-- /.post -->
			</div>
			<!-- /.tab-pane -->
			<div class="tab-pane" id="timeline">
				<!-- The timeline -->
									<a class="btn btn-success float-right" href="Export.php" name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a>

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
			</div>
			<!-- /.tab-pane -->

			<!-- /.tab-pane -->
		</div>
		<!-- /.tab-content -->
	</div><!-- /.card-body -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
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

						<!-- /.content -->
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
