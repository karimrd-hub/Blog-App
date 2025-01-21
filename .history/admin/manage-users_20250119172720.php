<?php
    include 'partials/header.php';

    // fet users from db except current user
$curent_admin_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE NOT id = $curent_admin_id";
    $get_users_result = mysqli_query($connection, $get_users_query);
    $users = mysqli_fetch_all($get_users_result, MYSQLI_ASSOC);

?>



<section class="dashboard">
        <?php if(isset($_SESSION['add-user-success'])) : ?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-user-success']; 
                    unset($_SESSION['add-user-success']); 
                    ?>
                </p>
            </div>
        <?php endif ?>
    <div class="container dashboard__container">
        <button class="sidebar__toggle" id="show__sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
        <button class="sidebar__toggle" id="hide__sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
        
        
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                        <h5>Manage Posts</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])):  ?>
                <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" class="active"><i class="uil uil-users-alt"></i>
                        <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                        <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Karim Ramadan</td>
                        <td>kramadan</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>


<?php
    include '../partials/footer.php';
?>
