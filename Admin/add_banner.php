<?php
$title = "Add Banner";
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
            <form action="../app/post/add_banner.php" method="post" enctype="multipart/form-data">
              <div class="card-body">

                <div class="form-group">
                  <label for="Info">Info </label>
                  <input type="text" name="Info" value="<?php if(isset($_SESSION['info'])){echo $_SESSION['info'];}?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Info">Info 2</label>
                  <input type="text" name="Info2" value="<?php if(isset($_SESSION['info2'])){echo $_SESSION['info2'];}?>" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Image">Image</label>
                  <input type="file" value="<?php if(isset($_SESSION['image'])){echo $_SESSION['image'];}?>" name="Image" placeholder="" class="form-control">
                </div>
              </div>
              <!-- /.card-body -->
              <?php
              if (!empty($_SESSION['errors']['info'])) {
                  foreach ($_SESSION['errors']['info'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($_SESSION['errors']['info2'])) {
                  foreach ($_SESSION['errors']['info2'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($_SESSION['errors']['image'])) {
                foreach ($_SESSION['errors']['image'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
              if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    echo $error;
                }
              }
            ?>
          </div>
          <div class="row">
            <div class="col-12">
              <input type="submit" name="addBanner" class="btn btn-success float-right">
            </div>
          </div>
          </form>
          <!-- /.card -->
        </div>
      </div>
    </section>

<?php 
unset($errors);
unset($_SESSION['info']);
unset($_SESSION['info2']);
unset($_SESSION['image']);
unset($_SESSION['errors']);
include_once "layout/footer.php";
