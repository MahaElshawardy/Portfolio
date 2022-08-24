<?php
include_once "../../Admin/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Project.php";
$projectObject = new Project;

if ($_GET) {
  if (isset($_GET['Projects_ID'])) {
    if (is_numeric($_GET['Projects_ID'])) {
      // check if id exists in your db
      $projectObject->setProjects_ID($_GET['Projects_ID']);
      $projectData = $projectObject->delete();
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