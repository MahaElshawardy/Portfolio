<?php
$title = "Edit | Image";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
include_once "../app/requests/Validation.php";
require "../app/models/Image_Project.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
if ($_GET) {
  if (isset($_GET['Image_Projects_ID'])) {
    if (is_numeric($_GET['Image_Projects_ID'])) {
      // check if id exists in your db
      $imageObject = new Image_Project;
      $imageObject->setImage_Projects_ID($_GET['Image_Projects_ID']);
      $imageData = $imageObject->searchOnId();
      // print_r($foodData);die;
          if ($imageData) {
            $imageResult = $imageData->fetch_object();
            // print_r($imageResult);die;
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
if($_POST):
    $imageObject = new Image_Project;
    $imageObject->setImage_Projects_ID($imageResult->Image_Projects_ID);
    $imageObject->setStatue($_POST['statue']);
    if (($_FILES['Name']['error']) == 0) {
        // print_r($_FILES['Personal_Image']['name']);die;
        // photo exists
        // size
        $maxUploadSize = 10 ** 6; // 1 mega byte
        $megaBytes = $maxUploadSize / (10 ** 6);
        if ($_FILES['Name']['size'] > $maxUploadSize) {
          $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
        }
        // , extension
        $extension = pathinfo($_FILES['Name']['name'], PATHINFO_EXTENSION);
        $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
        if (!in_array($extension, $availableExtensions)) {
          $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
        }
    
        if (empty($errors)) {
          $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
          $photoPath = "../../images/project/$photoName";
          move_uploaded_file($_FILES['Name']['tmp_name'], $photoPath);
          // set image
          $imageObject->setName($photoName);
        }
    }
  //------------- image 2--------------------------
    if (($_FILES['Name2']['error']) == 0) {
      // print_r($_FILES['Personal_Image']['name']);die;
      // photo exists
      // size
      $maxUploadSize = 10 ** 6; // 1 mega byte
      $megaBytes = $maxUploadSize / (10 ** 6);
      if ($_FILES['Name2']['size'] > $maxUploadSize) {
        $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
      }
      // , extension
      $extension = pathinfo($_FILES['Name2']['name'], PATHINFO_EXTENSION);
      $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
      if (!in_array($extension, $availableExtensions)) {
        $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
      }
  
      if (empty($errors)) {
        $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
        $photoPath = "../../images/project/$photoName";
        move_uploaded_file($_FILES['Name2']['tmp_name'], $photoPath);
        // set image
        $imageObject->setName2($photoName);
      }
  }

  //------------- image 3--------------------------
  if (($_FILES['Name3']['error']) == 0) {
    // print_r($_FILES['Personal_Image']['name']);die;
    // photo exists
    // size
    $maxUploadSize = 10 ** 6; // 1 mega byte
    $megaBytes = $maxUploadSize / (10 ** 6);
    if ($_FILES['Name3']['size'] > $maxUploadSize) {
      $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
    }
    // , extension
    $extension = pathinfo($_FILES['Name3']['name'], PATHINFO_EXTENSION);
    $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
    if (!in_array($extension, $availableExtensions)) {
      $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
    }

    if (empty($errors)) {
      $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
      $photoPath = "../../images/project/$photoName";
      move_uploaded_file($_FILES['Name3']['tmp_name'], $photoPath);
      // set image
      $imageObject->setName2($photoName);
    }
  }
  $result = $imageObject->update();
  // print_r($result);die;
  if($result):
      header("location:data_images.php");die;
  endif;
endif;
?>

<section class="content">
  <div class="row">
    <div class="col-md-6 offset-3">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title"><?= $title ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="Info">Image 1</label>
              <input type="file" name="Name" id="" class="form-control">
            </div>
            <div class="form-group">
              <label for="Info">Image 2</label>
              <input type="file" name="Name2" id="" class="form-control">
            </div>
            <div class="form-group">
              <label for="Info">Image 3</label>
              <input type="file" name="Name3" id="" class="form-control">
            </div>
            <div class="form-group">
              <label for="statue">Statue</label>
              <select name="statue" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option <?= (isset($_POST['statue']) && $_POST['statue'] =='1' ) ? 'selected' : '' ?> value="1">Active</option>
                  <option <?= (isset($_POST['statue']) && $_POST['statue'] =='0' ) ? 'selected' : '' ?> value="0">Not Active</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="editImage" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php
include_once "layout/footer.php";
