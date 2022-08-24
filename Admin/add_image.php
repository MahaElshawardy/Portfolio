<?php
  $title = "Add Images";
  include_once "include/include.php";
  include_once "../app/middleware/auth.php";
  include_once "include/ObjectOfClass.php";


?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <!-- <h3 class="card-title"><?= $title ?></h3> -->

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <form action="../app/post/add_image.php" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="Image ">Image 1 </label>
              <input type="file" name="image1" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Image ">Image 2 </label>
              <input type="file" name="image2" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Image ">Image 3 </label>
              <input type="file" name="image3" value="" class="form-control" required>
            </div> 
            <div class="form-group"> 
              <input type="hidden" name="Project_ID" value="<?= $getProjcet->Projects_ID?>" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="User_ID" value="<?= $Admin->User_ID?>" class="form-control" required>
            </div>
          </div>
          <!-- /.card-body -->
          <?php
              if (!empty($_SESSION['errors']['name1'])) {
                  foreach ($_SESSION['errors']['name1'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($_SESSION['errors']['name2'])) {
                foreach ($_SESSION['errors']['name2'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
            }
            if (!empty($_SESSION['errors']['name3'])) {
              foreach ($_SESSION['errors']['name3'] as $key => $value) {
                  echo "<div class='alert alert-danger'>$value</div>";
              }
          }
              if (!empty($_SESSION['errors']['project_ID'])) {
                  foreach ($_SESSION['errors']['project_ID'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($_SESSION['errors']['user_ID'])) {
                foreach ($_SESSION['errors']['user_ID'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
              }
            ?>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="addImage" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php include_once "layout/footer.php";
