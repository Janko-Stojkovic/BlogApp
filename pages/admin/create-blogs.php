<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    include "../../models/functions.php";
    authorize();
    include "../../controllers/createBlogController.php";
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
                <h1>Add new product</h1>
                <form class="standard-form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" id="name" name="blogTitle" value="" />
                        <?= error($errors,"blogTitle","danger") ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="price" class="form-label">Blog Content</label>
                        <textarea name="blogContent" id="blogContent"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="occasionName" class="form-label">Topic</label>
                        <select id="topicId" class="form-control" name="topicId">
                            <option value="0">Choose...</option>
                            <?php foreach($topics as $t): ?>
                            <option value="<?= $t->Id ?>"><?= $t->Topic ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= error($errors,"topicId","danger") ?>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" />
                        <?= error($errors,"image","danger") ?>
                    </div>
                    <div>
                        <button type="btnSubmit" name="btnSubmit" class="btn btn-primary">Add</button>
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