<?php
$title = "Add Services";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title"><?= $title ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <form action="../app/post/add_service.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="Name">Name </label>
              <input type="text" name="Name" value="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Desciption ">Desciption</label>
              <input type="text" name="Desc" value="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Image">Image</label>
              <input type="file" name="Image" value="" class="form-control"required>
            </div>
          </div>
          <!-- /.card-body -->
          <?php
            if (!empty($errors)) {
              foreach ($errors as $key => $error) {
                echo $error;
              }
            }
            if (!empty($_SESSION['errors']['name'])) {
              foreach ($_SESSION['errors']['name'] as $key => $value) {
                  echo "<div class='alert alert-danger'>$value</div>";
              }
          }
          if (!empty($_SESSION['errors']['description'])) {
              foreach ($_SESSION['errors']['description'] as $key => $value) {
                  echo "<div class='alert alert-danger'>$value</div>";
              }
          }
            ?>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="addService" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php include_once "layout/footer.php";
