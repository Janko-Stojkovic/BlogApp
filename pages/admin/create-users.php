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
    include "../../controllers/createUsersController.php";
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
                <h1>Add new user</h1>
                <form id="userForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" class="standard-form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="firstName">First Name</label>
                        <input class="form-control" type="text" name="firstName" id="firstName" placeholder="First Name" />
                        <?= error($errors,"firstName","danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="lastName">Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last Name" />
                        <?= error($errors,"lastName","danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" />
                        <?= error($errors,"username","danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" />
                        <?= error($errors,"email","danger"); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password"
                            placeholder="Password" />
                        <?= error($errors,"password","danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="password">confirm Password</label>
                        <input class="form-control" type="password" name="confirmPassword" id="password"
                            placeholder="Password" />
                        <?= error($errors,"confirmPassword","danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role">
                            <?php foreach($roles as $r): ?>
                            <option <?php if($r->RoleName === 'user'): ?> selected <?php endif; ?>
                                value="<?= $r->Id ?>"><?= $r->RoleName ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" />
                        <?= error($errors,"image","danger") ?>
                    </div>
                    <div class="text-center">
                        <input id="btnSubmit" name="btnSubmit" class="btn btn-primary" type="submit" value="Submit" />
                        <?= error($errors,"success","success") ?>
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