<?php
$title = "Edit | Services";
include_once "include/include.php";
include_once "../app/requests/Validation.php";
include_once "../app/middleware/auth.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
if ($_GET) {
  if (isset($_GET['Services_ID'])) {
    if (is_numeric($_GET['Services_ID'])) {
      // check if id exists in your db
      $serviceObject = new Service;
      $serviceObject->setServices_ID($_GET['Services_ID']);
      $serviceData = $serviceObject->searchOnId();
      if ($serviceData) {
        $serviceResult = $serviceData->fetch_object();
        // print_r($serviceResult);die;
          } else {
              header('location:../layout/errors/404.php');
              die;
          }
      } else {
          header('location:../layout/errors/404.php');
          die;
      }
  } else {
      header('location:../layout/errors/404.php');
      die;
  }
} else {
  header('location:../layout/errors/404.php');
  die;
}

if(isset($_POST)) :
//-----------Validation of Name Of Services----------------------
$nameValidation = new Validation('Name',$_POST['Name']);
$nameRequired = $nameValidation->required();
if(!empty($nameRequired)):
    $errors['errors']['name']['required'] = $nameRequired;
endif;

//-------------------------Validation of Description-----------------
$descriptionValidation = new Validation('des',$_POST['Description']);
$descriptionRequired = $descriptionValidation->required();
if(!empty($descriptionRequired)):
    $errors['errors']['description']['required']= $descriptionRequired;
endif;
if(empty($errors['errors'])) :
    // $serviceObject = new Service;
    $serviceObject->setName($_POST['Name']);
    $serviceObject->setDesc($_POST['Description']);
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
          $photoPath = "../images/resource/$photoName";
          move_uploaded_file($_FILES['Image']['tmp_name'], $photoPath);
          // set image
          $serviceObject->setImage($photoName);
        }
    }
    $result = $serviceObject->update();
    // print_r($result);die;
    if($result):
        header("location:data_services.php");die;
    endif;
endif;
endif;
?>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card offset-4">
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
            <div class="form-group" >
              <label for="Name">Name</label>
              <input type="text" value="<?=$serviceResult->Name?>" name="Name" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Description">Description</label>
              <textarea value="" name="Description"  id="" cols="50" rows="10"class="form-control" required><?= $serviceResult->Desc?></textarea>
            </div>
            <div class="form-group">
              <label for="Image">Image</label>
              <div class="row">
                <div class="col-6">
                  <input type="file" name="Image" placeholder="" class="form-control" >
                </div>
                <div class="col-4" style="margin-left: 60px;">
                  <img src="../images/resource/<?=$serviceResult->Image?>" alt="" style="width: 100% ;">
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.card-body -->
          <?php
              if (!empty($errors['errors']['name'])) {
                  foreach ($errors['errors']['name'] as $key => $value) {
                      echo "<div class='alert alert-danger'>$value</div>";
                  }
              }
              if (!empty($errors['errors']['description'])) {
                  foreach ($errors['errors']['description'] as $key => $value) {
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
          <input type="submit" name="editService" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php
unset($errors);
// unset($errors['errors']);
include_once "layout/footer.php";
