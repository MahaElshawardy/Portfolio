<?php
session_start();
if(!isset($_POST['contact'])){
    header('location:../../Admin/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Contact.php";
//-----------Validation of Name Of username----------------------
$nameValidation = new Validation('User Name',$_POST['username']);
$nameRequired = $nameValidation->required();
if(!empty($nameRequired)):
    $_SESSION['errors']['name']['required'] = $nameRequired;
endif;

//-------------------------Validation of Phone-----------------
$phoneValidation = new Validation('Phone',$_POST['phone']);
$phoneRequired = $phoneValidation->required();
if(!empty($phoneRequired)):
    $_SESSION['errors']['phone']['required'];
endif;

//-------------------------Validation of email-----------------
$emailValidation = new Validation('Email',$_POST['email']);
$emailRequired = $emailValidation->required();
if(!empty($emailRequired)):
    $_SESSION['errors']['email']['required'];
endif;

//-------------------------Validation of message-----------------
$messageValidation = new Validation('Massage',$_POST['message']);
$messageRequired = $messageValidation->required();
if(!empty($messageRequired)):
    $_SESSION['errors']['message']['required'];
endif;

if(empty($_SESSION['errors'])):
    $contactObject = new Contact;
    $contactObject->setName($_POST['username']);
    $contactObject->setPhone($_POST['phone']);
    $contactObject->setEmail($_POST['email']);
    $contactObject->setMassage($_POST['message']);
    $result = $contactObject->create();
    // print_r($result);die;
    if($result):
      $_SESSION['massage'] = "Thank you for contacting us";    
      header("location:../../contact.php");die;
    endif;
endif;

header('location:../../contact.php');
?>
