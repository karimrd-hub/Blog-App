<?php 

require 'config/databse.php';
if(isset($_POST['submit'])){
    // get 
    $username_email = $_POST['username_email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username_email, $username_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if(password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['loggedin'] = true;
        header('location: index.php');
        exit();
    }else{
        header('location:' . ROOT_URL . 'signin.php');
        die();
    }
}
?>