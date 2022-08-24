<?php
$title = "Edit | Project";
include_once "include/include.php";
include_once "../app/middleware/auth.php";
include_once "../app/requests/Validation.php";

spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
$subcategoryObject = new Subcategory;
$subResult = $subcategoryObject->getSubcategories();
$subcategories = $subResult->fetch_all(MYSQLI_ASSOC);
if ($_GET) {
  if (isset($_GET['Projects_ID'])) {
      if (is_numeric($_GET['Projects_ID'])) {
          // check if id exists in your db
          $projectObject = new Project;
          $projectObject->setProjects_ID($_GET['Projects_ID']);
          $projectData = $projectObject->searchOnId();
          if ($projectData) {
            $projectResult = $projectData->fetch_object();
            // print_r($projectResult);die;
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
  //-----------Validation of Name Of project----------------------
  $InfoValidation = new Validation('Name',$_POST['Name']);
  $InfoRequired = $InfoValidation->required();
  if(!empty($InfoRequired)):
      $errors['errors']['name']['required'] = $InfoRequired;
  endif;
  
  //-------------------------Validation of Clint-----------------
  $Info2Validation = new Validation('Clint',$_POST['Clint']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
    $errors['errors']['clint']['required']= $Info2Required;
  endif;

  //-------------------------Validation of Description-----------------
  $Info2Validation = new Validation('Description',$_POST['Description']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
    $errors['errors']['description']['required']= $Info2Required;
  endif;

  //-------------------------Validation of Description-----------------
  $Info2Validation = new Validation('Information',$_POST['Information']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
      $errors['errors']['information']['required']= $Info2Required;
  endif;

  //-------------------------Validation of Clint-----------------
  $Info2Validation = new Validation('Clint',$_POST['Clint']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
    $errors['errors']['clint']['required']= $Info2Required;
  endif;

  //-------------------------Validation of Location-----------------
  $Info2Validation = new Validation('Location',$_POST['Location']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
    $errors['errors']['location']['required']= $Info2Required;
  endif;

  //-------------------------Validation of Surface_Area-----------------
  $Info2Validation = new Validation('Surface Area',$_POST['Surface_Area']);
  $Info2Required = $Info2Validation->required();
  if(!empty($Info2Required)):
    $errors['errors']['surface_Area']['required']= $Info2Required;
  endif;

  if(empty($errors['errors'])) :
    $projectObject->setName($_POST['Name']);
    $projectObject->setDesc($_POST['Description']);
    $projectObject->setInformation($_POST['Information']);
    $projectObject->setClint($_POST['Clint']);
    $projectObject->setLocation($_POST['Location']);
    $projectObject->setSurface_Area($_POST['Surface_Area']);
    $projectObject->setStatue($_POST['Statue']);
    $projectObject->setYear_Completed($_POST['Year_Completed']);
    $projectObject->setSubcategories_ID($_POST['Subcategories']);
    $result = $projectObject->update();
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
              <label for="Name">Name Of project </label>
              <input type="text" name="Name" value="<?=$projectResult->Name?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Description">Project Description</label>
              <textarea name="Description" id="" cols="30" rows="10"class="form-control" required><?=$projectResult->Desc?></textarea>
            </div>
            <div class="form-group">
              <label for="Information">Project Information</label>
              <textarea name="Information" id="" cols="30" rows="10"class="form-control" required><?=$projectResult->Desc?></textarea>
            </div>
            <div class="form-group">
              <label for="Clint">Clint</label>
              <input type="text" name="Clint" placeholder="" value="<?=$projectResult->Clint?>" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Location">Location</label>
              <input type="text" name="Location" placeholder="" value="<?=$projectResult->Location?>" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Surface_Area">Surface Area</label>
              <input type="text" name="Surface_Area" placeholder="" value="<?=$projectResult->Surface_Area?>" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Year_Completed">Year Completed</label>
              <input type="date" name="Year_Completed" placeholder="" value="<?=$projectResult->Year_Completed?>" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Statue">Statue</label>
              <select name="Statue" id="" class="form-control custom-select">
                <option  disabled>Select one</option>
                <option value="1">Active</option>
                <option value="0">Not Active </option>
              </select>
            </div>
            <div class="form-group">
              <label for="Subcatogries">Subcatogries</label>
              <select name="Subcategories" id="" class="form-control custom-select" >
                <option  disabled>Select one</option>
              <?php foreach ($subcategories as $key => $subcategory) : ?>
                <option value="<?= $subcategory['Subcategory_ID']?>"><?= $subcategory['Name']?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <?php
            if (!empty($errors['errors']['name'])) {
                foreach ($errors['errors']['name'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
            }
            if (!empty($errors['errors']['clint'])) {
                foreach ($errors['errors']['clint'] as $key => $value) {
                    echo "<div class='alert alert-danger'>$value</div>";
                }
            }
            if (!empty($errors['errors']['description'])) {
              foreach ($errors['errors']['description'] as $key => $value) {
                  echo "<div class='alert alert-danger'>$value</div>";
              }
           }
            if (!empty($errors['errors']['information'])) {
              foreach ($errors['errors']['information'] as $key => $value) {
                  echo "<div class='alert alert-danger'>$value</div>";
              }
            }
            if (!empty($errors['errors']['location'])) {
              foreach ($errors['errors']['location'] as $key => $value) {
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
