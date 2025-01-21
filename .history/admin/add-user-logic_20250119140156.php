<?php
require 'config/database.php';

//get from data if submit button was clicked
if(isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // validate input values:
    if(!$firstname) {
        $_SESSION['add-user'] = "Please enter your First name";
    } elseif(!$lastname) {
        $_SESSION['add-user'] = "Please enter your lastname";
    } elseif(!$username) {
        $_SESSION['add-user'] = "Please enter your username";
    } elseif(!$email) {
        $_SESSION['add-user'] = "Please enter a valid email";
    }elseif(!$is_admin) {
        $_SESSION['add-user'] = "Please select user role";
    }elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "Password should be 8+ characters";
    } elseif(!$avatar['name']) {
        $_SESSION['add-user'] = "Please add avatar";
    } else {
        // check if password match
        if($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords do not match";
        } else {
            // hash password
            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
            
            // check if username is found or email exist
            $user_check_query = "SELECT * FROM users where username ='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "Username or Email already exist";
            } else {
                // WORK ON AVATAR
                // rename avatar image
                $time = time(); // Make each image name unique using time
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                // make sure file is allowed
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if(in_array($extension, $allowed_files)) {
                    // make sure image is not too large
                    if($avatar['size'] < 2000000) {
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "FILE should be less than 2mb";
                    }    
                } else {
                    $_SESSION['signup'] = "FILE should be png, jpg, or jpeg";
                }
            }
        }
    }

    // redirect back to signup page incase of problem
    if(isset($_SESSION['signup'])) {
        // pass from data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' .ROOT_URL . 'signup.php');
        die();
    } else {
        // insert new user into table
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', 0)";
        $insert_user_query = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            //redirect to login page with success messgae
            $_SESSION['signup-success'] = "Registration successful. Please log in";
            header('location' . ROOT_URL . 'signup.php');
            die();
        }
    }
} else {
    // if button wasn't clicked, bounce back to signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}