<?php
session_start();
if(!isset($_POST['editBaner'])){
    header('location:../../Admin/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
// include_once "../models/User.php";
include_once "../models/Service.php";
//-----------Validation of Name Of Services----------------------
$nameValidation = new Validation('Name',$_POST['Name']);
$nameRequired = $nameValidation->required();
if(!empty($nameRequired)):
    $_SESSION['errors']['name']['required'] = $nameRequired;
endif;

//-------------------------Validation of Description-----------------
$descriptionValidation = new Validation('desc',$_POST['Description']);
$descriptionRequired = $descriptionValidation->required();
if(!empty($descriptionRequired)):
    $_SESSION['errors']['description']['required'];
endif;

if(empty($_SESSION['errors'])):
    $serviceObject = new Service;
    $serviceObject->setName($_POST['Name']);
    $serviceObject->setDesc($_POST['Description']);
    if (($_FILES['image']['error']) == 0) {
        // print_r($_FILES['Personal_Image']['name']);die;
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
          $photoPath = "dist/img/resource/$photoName";
          move_uploaded_file($_FILES['Image']['tmp_name'], $photoPath);
          // set image
          $serviceObject->setImage($photoName);
        }
    }
    $result = $serviceObject->update();
    // print_r($result);die;
    if($result):
        header("location:../../Admin/data_services.php");die;
    endif;
endif;

header('location:../../Admin/edit_service.php');