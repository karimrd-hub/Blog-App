<?php
require 'config/constants.php';

$username_email = $_SESSION[]

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <!-- ICONSCOUT CDN -->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>
        <?php if(isset($_SESSION['signup-success'])) :  ?>
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['signup-success']; 
                    unset($_SESSION['signup-success']); ?>
                </p>
            </div>
         <?php endif ?>   
        <form action=" <?= ROOT_URL  ?>signin-logic.php" method="POST">
            <input type="text" name="username_email" placeholder="Username or Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit" class="btn">Sign In</button>
            <small>Don't have an account? <a href="signup.php">Sign up</a></small>
        </form>
    </div>
</section>

</body>
</html>
