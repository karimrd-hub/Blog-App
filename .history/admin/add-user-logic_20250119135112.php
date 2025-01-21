<?php
// Include database connection
include('../config/db_connect.php');

// Initialize variables
$username = $email = $password = '';
$errors = array('username' => '', 'email' => '', 'password' => '');

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Validate username
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username is required';
    } else {
        $username = htmlspecialchars($_POST['username']);
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } else {
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }

    // Check if there are no errors
    if (!array_filter($errors)) {
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement
        $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";

        // Execute SQL statement
        if (mysqli_query($conn, $sql)) {
            // Redirect to user list page
            header('Location: user-list.php');
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>Add User</h2>
    <form action="add-user-logic.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <div><?php echo $errors['username']; ?></div>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div><?php echo $errors['email']; ?></div>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <div><?php echo $errors['password']; ?></div>

        <input type="submit" name="submit" value="Add User">
    </form>
</body>
</html>