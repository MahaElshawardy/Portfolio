<?php
session_start();
if(!isset($_POST['addBanner'])){
    header('location:../../Admin/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Banner.php";

//-----------Validation of Name Of Info----------------------
$InfoValidation = new Validation('Info',$_POST['Info']);
$InfoRequired = $InfoValidation->required();
if(!empty($InfoRequired)):
    $_SESSION['errors']['info']['required'] = $InfoRequired;
endif;

//-------------------------Validation of Info2-----------------
$Info2Validation = new Validation('Info2',$_POST['Info2']);
$Info2Required = $Info2Validation->required();
if(!empty($Info2Required)):
    $_SESSION['errors']['info2']['required'] = $Info2Required;
endif;

//-------------------------Validation of Image-----------------
// $ImageValidation = new Validation('Image',$_POST['Image']);
// $ImageRequired = $ImageValidation->required();
// // print_r($ImageRequired);die;
// if(!empty($ImageRequired)):
//     $_SESSION['errors']['image']['required'] = $ImageRequired;
// endif;

        $_SESSION['info'] = $_POST['Info'];
        $_SESSION['info2'] = $_POST['Info2'];
        $_SESSION['image'] = $_POST['Image'];

if(empty($_SESSION['errors'])):
    $bannerObject = new Banner;
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
          $photoPath = "../../images/main-slider/$photoName";
          move_uploaded_file($_FILES['Image']['tmp_name'], $photoPath);
          // set image
          $bannerObject->setImage($photoName);
        }
    }
    $result = $bannerObject->create();
    // print_r($result);die;
    if($result):
        header("location:../../Admin/data_banners.php");die;
    endif;
endif;

header('location:../../Admin/add_banner.php');