<?php
    require 'config/database.php';

    // get user form if submit button was clicked
    if(isset($_POST['submit'])) {
       
        } else {
            header('location: ' . ROOT_URL . 'admin/add-user.php');
            die();
        }
?>

