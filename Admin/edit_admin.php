<?php
$title = "Edit | Admin";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
include_once "../app/requests/Validation.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
if ($_GET) {
  if (isset($_GET['User_ID'])) {
      if (is_numeric($_GET['User_ID'])) {
          // check if id exists in your db
          $userObject = new User;
          $userObject->setUser_ID($_GET['User_ID']);
          $userData = $userObject->getAdminById();
          if ($userData) {
            $userResult = $userData->fetch_object();
            // print_r($bannerResult);die;
          } else {
              header('location:layout/errors/404.php');
              die;
          }
      } else {
          header('location:layout/errors/404.php');
          die;
      }
  } else {
      header('location:layout/errors/404.php');
      die;
  }
} else {
  header('location:layout/errors/404.php');
  die;
}

if($_POST) :
  //-----------Validation of Name Of Position----------------------
  $InfoValidation = new Validation('Position',$_POST['Position']);
  $InfoRequired = $InfoValidation->required();
  if(!empty($InfoRequired)):
      $errors['errors']['position']['required'] = $InfoRequired;
  endif;


  if(empty($errors['errors'])) :
    // $serviceObject = new Service;
    $userObject->setPosition($_POST['Position']);
    $result = $userObject->update();
    // print_r($result);die;
    if($result):
        header("location:data_projects.php");die;
    endif;
endif;
endif;
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
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="Position">Position</label>
              <select name="Position" id="" class="form-control custom-select"required>
                <option selected disabled>Select one</option>
                <option value="Admin">Admin</option>
                <option value="Writer">Writer</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <?php
            if (!empty($errors['errors']['position'])) {
                foreach ($errors['errors']['position'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
            }
          ?>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php
include_once "layout/footer.php";
