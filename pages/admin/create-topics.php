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
    include "../../controllers/createTopicsController.php";
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
                <h1>Add new topic</h1>
                <form id="categoryForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="standard-form">
                    <div class="mb-3">
                        <label for="name">Topic name</label>
                        <input class="form-control" type="text" name="topicName" id="topicName"
                            placeholder="Name" />
                        <?= error($errors,"topicName","danger") ?>
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
    <script src="{{ asset('assets/js/admin/products.min.js') }}"></script>
</body>

</html>