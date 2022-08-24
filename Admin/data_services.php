<?php
$title = "Data Services";
$icon = "<a href='add_service.php'><i class='fas fa-plus-circle'></i></a>";
include_once "include/include.php";
include_once "../app/middleware/auth.php";

spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
$serviceObject = new Service;
//------------------services-------------------------
$serviceResult = $serviceObject->read();
$services = $serviceResult->fetch_all(MYSQLI_ASSOC);
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">


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
                      <th>Services ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Created_at</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($services as $key => $service) : ?>
                        <tr>
                          <td><a href="#"><?= $service['Services_ID'] ?></a></td>
                          <td><?= $service['Name'] ?></td>
                          <td><?= $service['Desc'] ?></td>
                          <td><img src="../images/resource/<?= $service['Image'] ?>" style="height: 145px;width: 100%;" alt=""></td>
                          <td><?= $service['Created_at']?></td>
                          <td><a class="btn btn-warning" href="edit_service.php?Services_ID=<?= $service['Services_ID'] ?>" >Edit</a></td>
                          <td><a class="btn btn-danger" href="../app/get/delete_service.php?Services_ID=<?= $service['Services_ID'] ?>" >Delete</a></td>
                        </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Services ID</th>
                      <th>Name</th>
                      <th>Desc</th>
                      <th>Image</th>
                      <th>Created_at</th>
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
