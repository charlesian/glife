<?php session_start();
date_default_timezone_set('Asia/Manila');
if(!isset($_SESSION['uname'])){
  header('location:../../index.php');
}else{
  error_reporting(0);
  ini_set('display_errors', 0);
  $uname = $_SESSION['uname'];
  $access = $_SESSION['access'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Eternal Investment | Attendance</title>
  <!-- header -->
  <?php include '../_includes/header.php' ?>
</head>
<!-- <body class="hold-transition sidebar-mini"> -->
  <body class="sidebar-mini sidebar-closed text-sm " style="height: auto;">
    <div class="wrapper">
      <!-- sidebar -->
      <?php include '../_includes/sidebar.php'; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Absent Staff</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Home</li>
                  <li class="breadcrumb-item active">Staff Attendance</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <?php require_once('ContentFilter.php') ?>
      </div>
      <!-- /.content-wrapper -->

      <!-- footer -->
      <?php include '../_includes/footer.php' ?>

      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            aLengthMenu: [ [100, 10, 20, -1], [100, 10, 20, "All"] ]
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
   <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    <script src="table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        function Export() {
            $("#example1").table2excel({
                filename: "DTR.xls"
            });
        }
    </script>
</body>
</html>