<?php
$title = "Data Images";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
$imageObject = new Image_Project;
//---------------images---------------------------
$imageResult = $imageObject->read();
$images = $imageResult->fetch_all(MYSQLI_ASSOC);
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once "layout/nav.php";?>
  <!-- /.navbar -->

  <?php include_once "layout/navLeft.php";?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive">
                <table id="example1" data-page-length='10' data-order='[[ 1, "asc" ]]' class="table m-0 table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>Project Name</th>
                    <th>User Name</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Statue</th>
                    <th>Created at </th>
                    <th>Update</th>
                    <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($images as $key => $image) : ?>
                        <tr>
                          <td><a href="#"><?= $image['name_projects'] ?></a></td>
                          <td><?= $image['name_users'] ?></td>
                          <td><img src="../images/project/<?= $image['Name']?>" style="width: 100%;height: 100px;" alt=""></td>
                          <td><img src="../images/project/<?= $image['Name2']?>" style="width: 100%;height: 100px;" alt=""></td>
                          <td><img src="../images/project/<?= $image['Name3']?>" style="width: 100%;height: 100px;" alt=""></td>
                          <td><?= $image['Statue'] ?></td>
                          <td><?= $image['Created_at'] ?></td>
                          <td><a href="edit_image.php?Image_Projects_ID=<?= $image['Image_Projects_ID']?>" class="btn btn-warning">Edit </a></td>
                        <td><a href="../app/get/delete_image.php?Image_Projects_ID=<?= $image['Image_Projects_ID'] ?>" class="btn btn-success">Delete</a></td>
                        </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Project Name</th>
                    <th>User Name</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Statue</th>
                    <th>Created at </th>
                    <th>Update</th>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
