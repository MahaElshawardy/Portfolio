<?php
include_once "../../Admin/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Image_Project.php";
$imagenObject = new Image_Project;

if ($_GET) {
  if (isset($_GET['Image_Projects_ID'])) {
    if (is_numeric($_GET['Image_Projects_ID'])) {
      // check if id exists in your db
      $imagenObject->setImage_Projects_ID($_GET['Image_Projects_ID']);
      $AdminData = $imagenObject->delete();
      header('location:../../Admin/data_images.php');
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