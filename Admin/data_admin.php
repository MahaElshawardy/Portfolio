<?php
$title = "Data Admin";
$icon = "<a href='add_Admin.php'><i class='fas fa-plus-circle'></i></a>";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
$AdminObject = new User;
//-------------------All Admins-------------
$AdminResult = $AdminObject->read();
$admin = $AdminResult->fetch_all(MYSQLI_ASSOC);
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <!-- <?php include_once "layout/nav.php"; ?> -->
    <!-- /.navbar -->

    <!-- <?php include_once "layout/navLeft.php"; ?> -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" data-page-length='10' data-order='[[ 1, "asc" ]]' class="table m-0 table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($admin as $key => $admins) : //print_r($member);die;?>
                        <tr>
                          <td><a href="#"><?= $admins['User_ID'] ?></a></td>
                          <td><?= $admins['Name'] ?></td>
                          <td><?= $admins['Email'] ?></td>
                          <td><?= $admins['Position'] ?></td>
                          <td><a href="edit_admin.php?User_ID=<?= $admins['User_ID'] ?>" class="btn btn-dark">Edit</a></td>
                          <td><a href="../app/get/delete_admin.php?User_ID=<?= $admins['User_ID'] ?>" class="btn btn-dark">Delete</a></td>
                        </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src=""></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>
