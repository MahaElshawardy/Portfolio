<?php
$title = "Data Banner";
$icon = "<a href='add_banner.php'><i class='fas fa-plus-circle'></i></a>";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
$bannerObject = new Banner;
//-------------------banner ----------------------
$bannerResult = $bannerObject->read();
$banners = $bannerResult->fetch_all(MYSQLI_ASSOC);
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->

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
                      <th>Banner_ID</th>
                      <th>Info</th>
                      <th>Image</th>
                      <th>Created_at</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($banners as $key => $banner) : ?>
                        <tr>
                          <td><a href="#"><?= $banner['Banner_ID'] ?></a></td>
                          <td><?= $banner['Info'] . " ". $banner['Info2'] ?></td>
                          <td><img src="../images/main-slider/<?= $banner['Image']?>" style="width: 100%;height: 100px;" alt=""></td>
                          <td><?= $banner['Created_at'] ?></td>
                          <td><a href="edit_banner.php?Banner_ID=<?= $banner['Banner_ID']?>" class="btn btn-warning">Edit </a></td>
                        <td><a href="../app/get/delete_banner.php?Banner_ID=<?= $banner['Banner_ID'] ?>" class="btn btn-success">Delete</a></td>
                        </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Banner_ID</th>
                      <th>Info</th>
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
