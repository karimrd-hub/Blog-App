<?php
    include 'partials/header.php';
?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="first" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</section>

<?php
    include '../partials/footer.php';
?>