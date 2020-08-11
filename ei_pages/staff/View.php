<!DOCTYPE html>
<html>
<head>
  <title>Eternal Investment | Staff</title>
  <!-- header -->
  <?php include '../includes/header.php' ?>
</head>
<!-- <body class="hold-transition sidebar-mini"> -->
  <body class="sidebar-mini sidebar-closed text-sm " style="height: auto;">
    <div class="wrapper">
      <!-- sidebar -->
      <?php include '../includes/sidebar.php'; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Staff</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Home</li>
                  <li class="breadcrumb-item active">Staff</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <?php require_once('Content.php') ?>
      </div>
      <!-- /.content-wrapper -->

      <!-- footer -->
      <?php include '../includes/footer.php' ?>

      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,

            initComplete: function () {
              this.api().columns(1).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(3).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(6).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(7).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(9).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );
                  
                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );
                
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(10).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );
                  
                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );
                
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(11).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(12).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(13).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns(14).every( function () {
                var column = this;
                var select = $('<select class="form-control" style="width:100%"><option value=""></option></select>')
                .appendTo( $(column.header()) )
                .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                    );

                  column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

            }

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
</body>
</html>