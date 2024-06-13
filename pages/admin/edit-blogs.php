<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    include "../../models/functions.php";
    authorize();
    include "../../controllers/editBlogsController.php";
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
                <h1>Edit product</h1>
                <form class="standard-form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="blogId" value="<?= $blog->blogId ?>">
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label">Blog Title</label>
                        <input type="text" class="form-control" id="blogTitle" name="blogTitle" value="<?= $blog->title ?>" />
                        <?= error($errors, "blogTitle", "danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="$blog" class="form-label">Blog Content</label>
                        <input type="text" class="form-control" id="blogContent" name="blogContent" value="<?= $blog->blog ?>" />
                        <?= error($errors, "blogContent", "danger") ?>
                    </div>
                    <div class="mb-3">
                        <label for="topicName" class="form-label">topic Name</label>
                        <select id="topicId" class="form-control" name="topicId" value="<?= $blog->topic ?>">
                            <option value="0">Choose...</option>
                            <?php foreach ($topics as $t) : ?>
                                <option <?php if ($t->Id == $blog->topicId) : ?> selected <?php endif; ?> value="<?= $t->Id ?>"><?= $t->Topic ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= error($errors, "topicId", "danger") ?>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" />
                        <?= error($errors, "image", "danger") ?>
                    </div>

                    <div class="container container-fluid">
                        <div class="row">
                            <img class="img img-fluid" style="max-width:33% !important;" src="../../assets/img/<?= $blog->image ?>">
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" name="btnSubmit" class="btn btn-primary">Edit</button>
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