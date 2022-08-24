<?php
session_start();
if(!isset($_POST['projects'])){
    header('location:../../Admin/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Project.php";
include_once "../models/User.php";

$AdminObject = new User;
//-------------------get Admin ------------
$AdminObject->setUser_ID($_SESSION['user']->User_ID);
$result = $AdminObject->getAdminById();
$Admin = $result->fetch_object();
// print_r($Admin);die;

//-----------Validation of Name Of Project----------------------
$nameValidation = new Validation('Name',$_POST['Name']);
$nameRequired = $nameValidation->required();
if(!empty($nameRequired)):
    $_SESSION['errors']['name']['required'] = $nameRequired;
endif;

//-------------------------Validation of Description-----------------
$descValidation = new Validation('Description',$_POST['Description']);
$descRequired = $descValidation->required();
if(!empty($descRequired)):
    $_SESSION['errors']['description']['required'];
endif;

//-------------------------Validation of Clint-----------------
$clintValidation = new Validation('Clint',$_POST['Clint']);
$clintRequired = $clintValidation->required();
if(!empty($clintRequired)):
    $_SESSION['errors']['clint']['required'];
endif;

//-------------------------Validation of Location-----------------
$locationValidation = new Validation('Location',$_POST['Location']);
$locationRequired = $locationValidation->required();
if(!empty($locationRequired)):
    $_SESSION['errors']['location']['required'];
endif;

//-------------------------Validation of Surface-----------------
$surfaceValidation = new Validation('Surface',$_POST['Surface']);
$surfaceRequired = $surfaceValidation->required();
if(!empty($surfaceRequired)):
    $_SESSION['errors']['surface']['required'];
endif;

//-------------------------Validation of Year-----------------
$yearValidation = new Validation('Year',$_POST['Year']);
$yearRequired = $yearValidation->required();
if(!empty($yearRequired)):
    $_SESSION['errors']['year']['required'];
endif;

//-------------------------Validation of sub-----------------
$subValidation = new Validation('subcategories',$_POST['sub']);
$subRequired = $subValidation->required();
if(!empty($subRequired)):
    $_SESSION['errors']['subcategories']['required'];
endif;

$_SESSION['Name'] = $_POST['Name'];
$_SESSION['Description'] = $_POST['Description'];
$_SESSION['Clint'] = $_POST['Clint'];
$_SESSION['Location'] = $_POST['Location'];
$_SESSION['Surface'] = $_POST['Surface'];
$_SESSION['Year'] = $_POST['Year'];

if(empty($_SESSION['errors'])):
    $ProjectObject = new Project;
    $ProjectObject->setName($_POST['Name']);
    $ProjectObject->setDesc($_POST['Description']);
    $ProjectObject->setClint($_POST['Clint']);
    $ProjectObject->setLocation($_POST['Location']);
    $ProjectObject->setSurface_Area($_POST['Surface']);
    $ProjectObject->setUser_ID($Admin->User_ID);
    $ProjectObject->setYear_Completed($_POST['Year']);
    $ProjectObject->setSubcategories_ID($_POST['sub']);
    $result = $ProjectObject->create();
    // print_r($result);die;
    if($result):
        header("location:../../Admin/add_image.php");die;
    endif;
endif;

header('location:../../Admin/add_projects.php');