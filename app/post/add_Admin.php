<?php
session_start();
if(!isset($_POST['add'])){
    header('location:../../Admin/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/User.php";

//-----------Validation of Name Of Admin----------------------
$nameValidation = new Validation('Name',$_POST['name']);
$nameRequired = $nameValidation->required();
if(!empty($nameRequired)):
    $_SESSION['errors']['name']['required'] = $nameRequired;
endif;

//-------------------------Validation of Email-----------------
$emailValidation = new Validation('Email',$_POST['email']);
$emailRequired = $emailValidation->required();
if(!empty($descRequired)):
    $_SESSION['errors']['email']['required'] = $emailRequired;
endif;

//-------------------------Validation of password-----------------
$passwordValidation = new Validation('Password',$_POST['password']);
$passwordRequired = $passwordValidation->required();
if(!empty($passwordRequired)):
    $_SESSION['errors']['password']['required'] = $passwordRequired;
endif;

//-------------------------Validation of Position-----------------
$positionValidation = new Validation('Position',$_POST['Position']);
$positionRequired = $positionValidation->required();
if(!empty($positionRequired)):
    $_SESSION['errors']['position']['required'] = $positionRequired;
endif;



if(empty($_SESSION['errors'])):
    $userObject = new User;
    $userObject->setName($_POST['name']);
    $userObject->setEmail($_POST['email']);
    $userObject->setPassword($_POST['password']);
    $userObject->setPosition($_POST['Position']);
    if (($_FILES['image']['error']) == 0) {
        // print_r($_FILES['Personal_Image']['name']);die;
        // photo exists
        // size
        $maxUploadSize = 10 ** 6; // 1 mega byte
        $megaBytes = $maxUploadSize / (10 ** 6);
        if ($_FILES['image']['size'] > $maxUploadSize) {
          $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
        }
        // , extension
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
        if (!in_array($extension, $availableExtensions)) {
          $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
        }
    
        if (empty($errors)) {
          $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
          $photoPath = "dist/img/Admin/$photoName";
          move_uploaded_file($_FILES['image']['tmp_name'], $photoPath);
          // set image
          $userObject->setImage($photoName);
        }
    }
    $result = $userObject->create();
    // print_r($result);die;
    if($result):
        header("location:../../Admin/index.php");die;
    endif;
endif;

header('location:../../Admin/add_Admin.php');