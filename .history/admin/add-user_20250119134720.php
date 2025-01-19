<?php
    include 'partials/header.php';
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <div class="alert_message error">
            <p>This is an error message</p>
        </div>
        <form action="<?= ROOT_URL ?>add-user-logic.php" enctype="multipart/form-data"
        method="POST">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastnamne" placeholder="Last Name">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="create-password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file"id="avatar">
            </div>
            <button type="submit" class="btn">Add User</button>
        </form>
    </div>
</section>

<?php
    include '../partials/footer.php';
?>