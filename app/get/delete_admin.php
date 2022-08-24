<?php
include_once "../../Admin/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/User.php";
$AdminObject = new User;
// $AdminObject->setUser_ID($_SESSION['user']->User_ID);
// $result = $AdminObject->getAdminById();
// $Admin = $result->fetch_object();
// print_r($Admin);die;
if ($_GET) {
  if (isset($_GET['User_ID'])) {
    if (is_numeric($_GET['User_ID'])) {
      // check if id exists in your db
      $AdminObject->setUser_ID($_GET['User_ID']);
      $AdminData = $AdminObject->delete();
      header('location:../../Admin/data_admin.php');
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