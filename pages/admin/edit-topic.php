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
    include "../../controllers/editTopicController.php";
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
                <h1>Edit topic</h1>
                <form id="categoryForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="standard-form">
                    <input type="hidden" name="topicId" value="<?= $topic->Id ?>">
                    <div class="mb-3">
                        <label for="name">Topic Name</label>
                        <input class="form-control" type="text" name="topicName" id="topicName" value="<?= $topic->Topic ?>" placeholder="Name" />
                        <?= error($errors, "topicName", "danger") ?>
                    </div>
                
                    <div class="text-center">
                        <button type="submit" name="btnSubmit" class="btn btn-primary">Edit</button>
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
    <script src="{{ asset('assets/js/admin/products.min.js') }}"></script>
</body>

</html>