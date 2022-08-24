<?php
include_once "../../Admin/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Service.php";
$serviceObject = new Service;
// $AdminObject->setUser_ID($_SESSION['user']->User_ID);
// $result = $AdminObject->getAdminById();
// $Admin = $result->fetch_object();
// print_r($Admin);die;
if ($_GET) {
  if (isset($_GET['Services_ID'])) {
    if (is_numeric($_GET['Services_ID'])) {
      // check if id exists in your db
      $serviceObject->setServices_ID($_GET['Services_ID']);
      $serviceData = $serviceObject->delete();
      header('location:../../Admin/data_services.php');
      die;

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

?>