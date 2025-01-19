<?php 

require 'config/databse.php';
if(isset($_POST['submit'])){
    // get form data
    $username_email =  filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin'] = 'Username or Email is required';
    }elseif(!$password){
        $_SESSION['signin'] = 'Password is required';

    }else{
        // fetch user from database
        $fetch_user_query = 'SELECT * FROM users WHERE username = '$username_email' OR email = :em'; 
    }

    }else{
        header('location:' . ROOT_URL . 'signin.php');
        die();
    }
?>