<?php 
error_reporting(0);
ini_set('display_errors', 0);
include '../_includes/functions.php';

$getID = mysqli_query($conn,"SELECT id FROM tbl_staff WHERE full_name = '$uname'");
$rowid = mysqli_fetch_array($getID);
$staff_id = $rowid['id'];

$date_now = date('Y-m-d');

$check = mysqli_query($conn,"SELECT staff_id FROM tbl_attendance WHERE staff_id = $staff_id AND date LIKE '%$date_now%' ");

$chktriger = mysqli_query($conn,"SELECT triggerA FROM tbl_trigger LIMIT 1");
$rowtr = mysqli_fetch_array($chktriger);
$triggerA = $rowtr['triggerA'];

if (isset($_POST['start'])) {
	$update = mysqli_query($conn,"UPDATE tbl_trigger SET triggerA = 1");
	if ($update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Success : You may Start the Attendance!');
			window.location.href='View.php';
			</SCRIPT>");
	}
}
if (isset($_POST['end'])) {

	$update = mysqli_query($conn,"UPDATE tbl_trigger SET triggerA = 2");

	if ($update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Attendance is now Close!');
			window.location.href='View.php';
			</SCRIPT>");
	}

}

if (isset($_POST['entry'])) {

	$update = mysqli_query($conn,"UPDATE tbl_trigger SET triggerA = 3");

	if ($update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Attendance is now Open!');
			window.location.href='View.php';
			</SCRIPT>");
	}

}
if (isset($_POST['done'])) {

	$update = mysqli_query($conn,"UPDATE tbl_trigger SET triggerA = NULL");

	if ($update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Attendance is now Done!');
			window.location.href='View.php';
			</SCRIPT>");
	}

}


if (isset($_POST['stamp'])) {
	if ($triggerA == 3 ) {
		$insert = mysqli_query($conn,"INSERT INTO tbl_attendance(staff_id,status) VALUES($staff_id,1)");

	}else{
		$insert = mysqli_query($conn,"INSERT INTO tbl_attendance(staff_id) VALUES($staff_id)");
	}
	if ($insert) {
		if ($triggerA == 3 ) {
			# code...
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Message : Your Not Time!');
				window.location.href='View.php';
				</SCRIPT>");
		}else{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Success : Your on Time!');
				window.location.href='View.php';
				</SCRIPT>");
		}
	}
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<form method="POST">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Daily Attendance</h3>
		</div>
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
							<a class="btn btn-success float-right" type="submit" name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a>
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
						<table id="example1" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="">Full Name</th>
									<th width="">Present</th>
									<th width="">Late</th>
									<th width="">Team</th>
									<th width="">Team Leader</th>
									<th width="">Team Leader Assistant</th>
									<th width="">Employee Level</th>
								</tr>
							</thead>
							<?php 
							$view_query = mysqli_query($conn, "SELECT staff.full_name,staff.team,staff.team_leader,staff.team_leader_ass,staff.employee_level,ta.date FROM tbl_attendance ta LEFT JOIN tbl_staff staff on staff.id = ta.staff_id ORDER BY staff.full_name ASC");
							while ($row = mysqli_fetch_assoc($view_query)) {
								$id = $row["id"];
								$full_name = $row["full_name"];  
								$team = $row["team"];  
								$team_leader = $row["team_leader"];  
								$team_leader_ass = $row["team_leader_ass"];  
								$employee_level = $row["employee_level"];  
								$status = $row["status"];
								$date = $row["date"];
								$attendance = date('d F   h:i A');
								?>
								<tr>
									<td>
										<?php echo $full_name;?>
									</td>
									<td>
										<strong><?php echo $attendance;?></strong>
									</td>
									<td>
										<?php if ($status == 1): ?>
											<font style="color:red;">Late</font>
										<?php endif ?>
									</td>
									<td>
										<strong><?php echo $team;?></strong>
									</td>
									<td>
										<strong><?php echo $team_leader;?></strong>
									</td>
									<td>
										<strong><?php echo $team_leader_ass;?></strong>
									</td>
									<td>
										<strong><?php echo $employee_level;?></strong>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</form>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
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
