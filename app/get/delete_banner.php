<?php
include_once "../../Admin/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Banner.php";
$bannerObject = new Banner;
// $AdminObject->setUser_ID($_SESSION['user']->User_ID);
// $result = $AdminObject->getAdminById();
// $Admin = $result->fetch_object();
// print_r($Admin);die;
if ($_GET) {
  if (isset($_GET['Banner_ID'])) {
    if (is_numeric($_GET['Banner_ID'])) {
      // check if id exists in your db
      $bannerObject->setBanner_ID($_GET['Banner_ID']);
      $bannerData = $bannerObject->delete();
      header('location:../../Admin/data_banners.php');
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