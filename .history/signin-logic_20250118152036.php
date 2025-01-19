<?php 

require 'config/databse.php';
if(isset($_POST['submit'])){
    // get form data
    $username_email =  filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    IF()

    }else{
        header('location:' . ROOT_URL . 'signin.php');
        die();
    }
?>