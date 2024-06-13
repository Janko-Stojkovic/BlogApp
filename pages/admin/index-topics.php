<!DOCTYPE html>
<html>

<head>
    <?php
    include('../../includes/admin/head.php');
    include("../../config/connection.php");
    include "../../config/session.php";
    authorize();
    authorizeAdmin();
    include "../../controllers/indexTopicsController.php";
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
                <h1>Topics</h1>
                <a href="create-topics.php" class="btn btn-primary mb-3">Add new topic</a>
                <?php if (count($topics) > 0) : ?>
                    <div class="table-responsive">
                        <table id="categoriesTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Topic</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($currentRecords as $key => $t) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $t->Id ?></td>
                                        <td><?= $t->Topic ?></td>
                                        <td><a href="edit-topic.php?topicId=<?= $t->Id ?>"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <a href="delete-topic.php?topicId=<?= $t->Id ?>" class="delete_itembtn btn-link" data-id="<?= $t->Id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <script>
        const table = "usersTable";
    </script>
</body>

</html>