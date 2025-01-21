<?php
    require 'config/database.php';

    // get user form if submit button was clicked
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        // insert user into database
        $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "User added successfully";
        } else {
            echo "Failed to add user";
        }
    }
?>

