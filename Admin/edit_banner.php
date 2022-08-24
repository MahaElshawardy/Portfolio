<?php
$title = "Edit | Banner";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
include_once "../app/requests/Validation.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
if ($_GET) {
  if (isset($_GET['Banner_ID'])) {
      if (is_numeric($_GET['Banner_ID'])) {
          // check if id exists in your db
          $bannerObject = new Banner;
          $bannerObject->setBanner_ID($_GET['Banner_ID']);
          $bannerData = $bannerObject->searchOnId();
          if ($bannerData) {
            $bannerResult = $bannerData->fetch_object();
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
  //-----------Validation of Name Of Info----------------------
  $InfoValidation = new Validation('Info',$_POST['Info']);
  $InfoRequired = $InfoValidation->required();
  if(!empty($InfoRequired)):
      $errors['errors']['info']['required'] = $InfoRequired;
  endif;
  
  //-------------------------Validation of Info2-----------------
  $Info2Validation = new Validation('Info2',$_POST['Info2']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
      $errors['errors']['info2']['required']= $Info2Required;
  endif;

  if(empty($errors['errors'])) :
    // $serviceObject = new Service;
    $bannerObject->setInfo($_POST['Info']);
    $bannerObject->setInfo2($_POST['Info2']);
    if (($_FILES['Image']['error']) == 0) {
        // print_r($_FILES['Image']['name']);die;
        // photo exists
        // size
        $maxUploadSize = 10 ** 6; // 1 mega byte
        $megaBytes = $maxUploadSize / (10 ** 6);
        if ($_FILES['Image']['size'] > $maxUploadSize) {
          $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
        }
        // , extension
        $extension = pathinfo($_FILES['Image']['name'], PATHINFO_EXTENSION);
        $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
        if (!in_array($extension, $availableExtensions)) {
          $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
        }
    
        if (empty($errors)) {
          $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
          $photoPath = "../images/main-slider/$photoName";
          move_uploaded_file($_FILES['Image']['tmp_name'], $photoPath);
          // set image
          $bannerObject->setImage($photoName);
        }
    }
    $result = $bannerObject->update();
    // print_r($result);die;
    if($result):
        header("location:data_banners.php");die;
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
              <label for="Info">Info </label>
              <input type="text" name="Info" value="<?=$bannerResult->Info?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Cost">Info 2</label>
              <input type="text" value="<?=$bannerResult->Info2?>" name="Info2" placeholder="Enter Cost" class="form-control" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <input type="file" name="Image" placeholder="" class="form-control">
                </div>
                <div class="col-4" style="margin-left: 60px;">
                  <img src="../images/main-slider/<?=$bannerResult->Image?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <?php
            if (!empty($errors['errors']['info'])) {
                foreach ($errors['errors']['info'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
            }
            if (!empty($errors['errors']['info2'])) {
                foreach ($errors['errors']['info2'] as $key => $value) {
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
