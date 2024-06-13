<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    authorize();
    authorizeAdmin();
    include "../../controllers/indexReportsController.php";
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
                <h1>Reports</h1>
                <?php if (count($reports) > 0) : ?>
                    <div class="table-responsive">
                        <table id="foodTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Report</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($currentRecords as $key => $report) : ?>
                                    <tr class="table-row-custom">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $report->id ?></td>
                                        <td><?= $report->fullName ?></td>
                                        <td><?= $report->email ?></td>
                                        <td><?= $report->phoneNumber ?></td>
                                        <td><?= $report->report ?></td>
                                        <td>
                                            <a href="delete-report.php?reportId=<?= $report->id ?>" class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <h2 class="d-flex justify-content-center mt-5">You have no reports</h2>
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