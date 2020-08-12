<?php 
error_reporting(0);
ini_set('display_errors', 0);
include '../_includes/functions.php';

$date_time= date('Y-m-d H:i');
if (isset($_POST['update_remarks'])) {
$note = $_POST['noteU'];
$attendance_id = $_POST['idCu'];

$update = mysqli_query($conn,"INSERT INTO tbl_attendance(staff_id,note,date) VALUES('$attendance_id','$note','$date_time')");

if ($update) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Message : Staff is Now in attendance!');
		window.location.href='Filter.php';	
		</SCRIPT>");
}

}

?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- /.col -->
<div class="col-md-12">
<div class="card">
	<div class="card-header p-2">
		<ul class="nav nav-pills">
			<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Table</a></li>
			<li class="nav-item" hidden><a class="nav-link" href="#timeline" data-toggle="tab">Filter/Settings</a></li>
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
							<!-- /.card-header -->
							<div class="card-body">
								<?php if ($access != NULL): ?>
									<a class="btn btn-success float-right" onclick="Export()" id="btnExport" value="Export"  name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a>
								<?php endif ?>
							</form>
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width=""></th>
										<th width="">Full Name</th>
										<th width="">Team</th>
										<th width="">Status</th>
										<th width="">Employee Level</th>
										<th width="">Transition</th>
									</tr>
								</thead>
								<?php 
								$select = mysqli_query($conn, "SELECT staff_id FROM tbl_attendance");
								while ($rowSe = mysqli_fetch_assoc($select)) {
									$staff_id[] = $rowSe['staff_id'];
								}
								$txt = implode(',', $staff_id);


								$view_query = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE id NOT IN(SELECT staff_id FROM tbl_attendance)");

// 								pub_id NOT IN(
// SELECT pub_id  FROM publisher);
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
													<a data-toggle="modal" data-target="#modal-primary_<?php echo $row['id']; ?>" class=""><i class="fa fa-fw fa-reply"></i></a>
										</td><td>
											<?php echo $full_name;?>
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

	<div class="modal fade" id="modal-primary_<?php echo $row['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Remarks</h4>
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
