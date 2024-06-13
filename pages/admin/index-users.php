<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    authorize();
    authorizeAdmin();
    include "../../controllers/indexUsersController.php";
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include('../../includes/admin/nav.php');
        include('../../includes/admin/sidebar.php');
        ?>
        <div class="content-wrapper">
            <?php
            include "../../includes/admin/header.php";
            ?>
            <section class="content">
                <h1>Users</h1>
                <a href="create-users.php" class="btn btn-primary mb-3">Add new user</a>
                <?php if (count($users) > 0) : ?>
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="large-column">Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($currentRecords as $key => $u) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $u->username ?></td>
                                        <td><?= $u->email ?></td>
                                        <td><?= $u->RoleName ?></td>
                                        <td><?= $u->CreatedAt ?></td>
                                        <td><a href="edit-users.php?userId=<?= $u->Id ?>"><i class="fas
fa-edit"></i></a></td>
                                        <td>
                                            <a href="delete-user.php?userId=<?= $u->Id ?>" class="delete_item btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="pagination">
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <a class="<?php if ($currentPage == $i) : ?>active<?php endif; ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php else : ?>
                <?php endif; ?>
            </section>
        </div>
        <?php
        include "../../includes/admin/footer.php";
        ?>
    </div>
    <?php
    include "../../includes/admin/scripts.php";
    ?>
    <script>
        const table = "usersTable";
    </script>
</body>

</html>