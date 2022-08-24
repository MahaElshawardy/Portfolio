<?php
include_once __DIR__. "\..\..\app\models\User.php";
include_once __DIR__. "\..\..\app\models\Project.php";
include_once __DIR__. "\..\..\app\models\Service.php";
include_once __DIR__. "\..\..\app\models\Banner.php";
include_once __DIR__. "\..\..\app\models\Subcategory.php";
include_once __DIR__. "\..\..\app\models\Image_Project.php";
include_once __DIR__. "\..\..\app\models\Contact.php";
include_once __DIR__. "\..\..\app\models\Visitor.php";


$AdminObject = new User;
$ProjectObject = new Project;
$serviceObject = new Service;
$bannerObject = new Banner;
$subcategoryObject = new Subcategory;
$imageObject = new Image_Project;
$contactObject = new Contact;
$visitorObject = new Visitor;

//-------------------get Admin ------------
$AdminObject->setUser_ID($_SESSION['user']->User_ID);
$result = $AdminObject->getAdminById();
$Admin = $result->fetch_object();
// print_r($Admin);die;

//-------------------All Admins-------------

$AdminResult = $AdminObject->read();
$admin = $AdminResult->fetch_all(MYSQLI_ASSOC);
// print_r($admin);die;

//-----------------permissions---------------
$Position = $Admin->Position;
$imageDefault = $Admin->Image;
// print_r($imageDefault);die;
//------------------show all project-----------------
$projectResult = $ProjectObject->read();
$projects = $projectResult->fetch_all(MYSQLI_ASSOC);

//------------------get last project ----------------
$lastProject = $ProjectObject->getLastProject();
$getProjcet = $lastProject->fetch_object();
// print_r($getProjcet);die;
//------------------services-------------------------
$serviceResult = $serviceObject->read();
$services = $serviceResult->fetch_all(MYSQLI_ASSOC);
// print_r($services);die;

//-------------------banner ----------------------
$bannerResult = $bannerObject->read();
$banners = $bannerResult->fetch_all(MYSQLI_ASSOC);
// print_r($banners);die;

//-----------------subcategories-------------------
$subcategoryObject->setStatue(1);
$subresult = $subcategoryObject->read();
$subs = $subresult->fetch_all(MYSQLI_ASSOC);
// print_r($subs);die;

//------------------ All Subcategories------------
$subResult = $subcategoryObject->getSubcategories();
$subcategories = $subResult->fetch_all(MYSQLI_ASSOC);
// print_r($subcategories);die;
//---------------images---------------------------
$imageResult = $imageObject->read();
$images = $imageResult->fetch_all(MYSQLI_ASSOC);
// print_r($images);die;

//-------------------massege-----------------------
$massageResult = $contactObject->read();
$massages = $massageResult->fetch_all(MYSQLI_ASSOC);
// print_r($massages);die;

//-------------------visitor -----------------------
$visitorsResult = $visitorObject->read();
$visitors = $visitorsResult->fetch_object();