<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    include "../../models/functions.php";
    authorize();
    authorizeAdmin();
    include "../../controllers/editUsersController.php";
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
                <h1>Edit user</h1>
                <form id="userForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" class="standard-form">
                    <input type="hidden" name="userId" value="<?= $user->id ?>">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" value="<?= $user->username ?>" id="username" placeholder="Username" />
                        <?= error($errors, "username", "danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?= $user->email ?>" placeholder="Email" />
                        <?= error($errors, "email", "danger"); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                        <?= error($errors, "password", "danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="password">confirm Password</label>
                        <input class="form-control" type="password" name="confirmPassword" id="password" placeholder="Password" />
                        <?= error($errors, "confirmPassword", "danger") ?>
                    </div>
                   
                    <div class="text-center">
                        <input id="btnSubmit" name="btnSubmit" class="btn btn-primary" type="submit" value="Submit" />
                        <?= error($errors, "success", "success") ?>
                    </div>
                </form>
            </section>
        </div>
        <?php
        include "../../includes/admin/footer.php";
        ?>
    </div>
    <?php
    include "../../includes/admin/scripts.php";
    ?>
    <script src="{{ asset('assets/js/form-validation.min.js') }}"></script>
    <script>
        const edit = false;
    </script>
    <script src="{{ asset('assets/js/admin/products.min.js') }}"></script>
    <script>
        const table = "usersTable";
    </script>
</body>

</html>