<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    authorize();
    include "../../controllers/dashboardController.php";
    
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
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($infoBoxes as $i) : ?>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box <?= $i['colorClass'] ?>">
                                <div class="inner">
                                    <h3><?= $i['value']?></h3>
                                    <p><?= $i['text'] ?></p>
                                </div>
                                <div class="icon">
                                    <i class="<?= $i['icon'] ?>"></i>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
        <?php
        include "../../includes/admin/footer.php";
        ?>
    </div>
    <?php
    include "../../includes/admin/scripts.php";
    ?>
</body>

</html>