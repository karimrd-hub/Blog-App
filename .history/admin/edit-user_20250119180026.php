<?php
    include 'partials/header.php';

    if(isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    }else{
        header('Location: ' . ROOT_URL . 'admin/manage-users.php');
        di
    }
?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" method="POST">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
            <select name="userrole">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User</button>
        </form>
    </div>
</section>

<?php
    include '../partials/footer.php';
?>