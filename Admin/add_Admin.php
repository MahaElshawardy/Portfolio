<?php
$title = "Add Admin";
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
            <form action="../app/post/add_Admin.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name ="name"value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text"value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" name ="email" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password"value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" name ="password" class="form-control"required>
                </div>

                <div class="form-group">
                  <label for="Position">Position</label>
                  <select name="Position" class="form-control custom-select"required>
                    <option  selected>Select one</option>
                    <option <?= (isset($_POST['Position']) && $_POST['Position'] =='Admin' ) ? 'selected' : '' ?>  value="Admin">Admin</option>
                    <option <?= (isset($_POST['Position']) && $_POST['Position'] =='writer' ) ? 'selected' : '' ?> value="writer">writer</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" value="" class="form-control">
                </div>
                <?php
                  if (!empty($_SESSION['errors']['name'])) {
                    foreach ($_SESSION['errors']['name'] as $key => $value) {
                        echo "<div class='alert alert-danger'>$value</div>";
                    }
                  }
                  if (!empty($_SESSION['errors']['email'])) {
                      foreach ($_SESSION['errors']['email'] as $key => $value) {
                          echo "<div class='alert alert-danger'>$value</div>";
                      }
                  }
                  if (!empty($_SESSION['errors']['password'])) {
                      foreach ($_SESSION['errors']['password'] as $key => $value) {
                          echo "<div class='alert alert-danger'>$value</div>";
                      }
                  }
                  if (!empty($_SESSION['errors']['position'])) {
                    foreach ($_SESSION['errors']['position'] as $key => $value) {
                        echo "<div class='alert alert-danger'>$value</div>";
                    }
                  }
                ?>
              </div>
            <div class="row">
              <div class="col-12">
                <input type="submit" name="add" class="btn btn-success float-right">
              </div>
            </div>
          </form>
          <!-- /.card -->
        </div>
      </div>
    </section>

<?php include_once "layout/footer.php";
