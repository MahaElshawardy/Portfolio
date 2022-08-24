<?php
session_start();
if(!isset($_POST['addImage'])){
    header('location:../../Admin/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Project.php";
include_once "../models/User.php";
include_once "../models/Image_Project.php";

$AdminObject = new User;
$ProjectObject = new Project;
//-------------------get Admin ------------
$AdminObject->setUser_ID($_SESSION['user']->User_ID);
$result = $AdminObject->getAdminById();
$Admin = $result->fetch_object();
// print_r($Admin);die;

//----------------project-------------------------
$lastProject = $ProjectObject->getLastProject();
$getProjcet = $lastProject->fetch_object();
//-----------Validation of Name Of Project----------------------
$name1Validation = new Validation('Image 1',$_FILES['image1']['name']);
$name1Required = $name1Validation->required();
if(!empty($name1Required)):
    $_SESSION['errors']['name1']['required'] = $name1Required;
endif;

//-----------Validation of Name Of Project----------------------
$name2Validation = new Validation('Image 2',$_FILES['image2']['name']);
$name2Required = $name2Validation->required();
if(!empty($name2Required)):
    $_SESSION['errors']['name2']['required'] = $name2Required;
endif;

//-----------Validation of Name Of Project----------------------
$name3Validation = new Validation('Image 3',$_FILES['image3']['name']);
$name3Required = $name3Validation->required();
if(!empty($name3Required)):
    $_SESSION['errors']['name3']['required'] = $name3Required;
endif;

//-------------------------Validation of Description-----------------
$descValidation = new Validation('Project_ID',$_POST['Project_ID']);
$descRequired = $descValidation->required();
if(!empty($descRequired)):
    $_SESSION['errors']['project_ID']['required'];
endif;

//-------------------------Validation of Clint-----------------
$clintValidation = new Validation('User_ID',$_POST['User_ID']);
$clintRequired = $clintValidation->required();
if(!empty($clintRequired)):
    $_SESSION['errors']['user_ID']['required'];
endif;

if(empty($_SESSION['errors'])):
    $imageObject = new Image_Project;
    $imageObject->setProject_ID($getProjcet->Projects_ID);
    $imageObject->setUser_ID($Admin->User_ID);
    if (($_FILES['image1']['error']) == 0) {
        // print_r($_FILES['Image']['name']);die;
        // photo exists
        // size
        $maxUploadSize = 10 ** 6; // 1 mega byte
        $megaBytes = $maxUploadSize / (10 ** 6);
        if ($_FILES['image1']['size'] > $maxUploadSize) {
          $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
        }
        // , extension
        $extension = pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
        $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
        if (!in_array($extension, $availableExtensions)) {
          $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
        }
    
        if (empty($errors)) {
          $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
          $photoPath = "../../images/project/$photoName";
          move_uploaded_file($_FILES['image1']['tmp_name'], $photoPath);
          // set image
          $imageObject->setName($photoName);
        }
    }
    if (($_FILES['image2']['error']) == 0) {
        // print_r($_FILES['Image']['name']);die;
        // photo exists
        // size
        $maxUploadSize = 10 ** 6; // 1 mega byte
        $megaBytes = $maxUploadSize / (10 ** 6);
        if ($_FILES['image2']['size'] > $maxUploadSize) {
          $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
        }
        // , extension
        $extension = pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
        $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
        if (!in_array($extension, $availableExtensions)) {
          $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
        }
    
        if (empty($errors)) {
          $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
          $photoPath = "../../images/project/$photoName";
          move_uploaded_file($_FILES['image2']['tmp_name'], $photoPath);
          // set image
          $imageObject->setName2($photoName);
        }
    }
    if (($_FILES['image3']['error']) == 0) {
        // print_r($_FILES['Image']['name']);die;
        // photo exists
        // size
        $maxUploadSize = 10 ** 6; // 1 mega byte
        $megaBytes = $maxUploadSize / (10 ** 6);
        if ($_FILES['image3']['size'] > $maxUploadSize) {
          $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
        }
        // , extension
        $extension = pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
        $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
        if (!in_array($extension, $availableExtensions)) {
          $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
        }
    
        if (empty($errors)) {
          $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
          $photoPath = "../../images/project/$photoName";
          move_uploaded_file($_FILES['image3']['tmp_name'], $photoPath);
          // set image
          $imageObject->setName3($photoName);
        }
    }
    $result = $imageObject->create();
    // print_r($result);die;
    if($result):
        header("location:../../Admin/data_projects.php");die;
    endif;
endif;

header('location:../../Admin/add_image.php');