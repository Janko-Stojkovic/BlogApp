<!DOCTYPE html>
<html>

<head>
        <?php
        include('../../includes/admin/head.php');
        include("../../config/connection.php");
        include "../../config/session.php";
        include "../../models/functions.php";
        authorize();
        include "../../controllers/indexBlogsController.php";
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
                                <h1>Blogs</h1>
                                <a href="create-blogs.php" class="btn btn-primary mb-3">Create Blog</a>
                                <?php if($_SESSION['user']->roleId == 2): ?>
                                        <?php if (count($blogs) > 0) : ?>
                                        <div class="table-responsive">
                                                <table id="foodTable" class="table table-bordered table-striped">
                                                        <thead>
                                                                <tr>
                                                                        <th>#</th>
                                                                        <th>ID</th>
                                                                        <th>Title</th>
                                                                        <th>Image</th>
                                                                        <th>Topic</th>
                                                                        <th>Published</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <?php foreach ($currentRecords as $key => $blog) : ?>
                                                                        <tr>
                                                                                <td><?= $key + 1 ?></td>
                                                                                <td><?= $blog->blogId ?></td>
                                                                                <td><?= $blog->title ?></td>
                                                                                <td>
                                                                                        <div class="food-image">
                                                                                                <img class="img-fluid" src="../../assets/img/<?= $blog->image ?>" alt="<?= $blog->title ?>" />
                                                                                        </div>
                                                                                </td>
                                                                                <td><?= $blog->Topic ?></td>
                                                                                <td><?= $blog->published ?></td>
                                                                                <td><a href="edit-blogs.php?blogId=<?= $blog->blogId ?>"><i class="fas fa-edit"></i></a></td>
                                                                                <td>
                                                                                        <a href="delete-blog.php?blogId=<?= $blog->blogId ?>" class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                        <h1>You Don`t Have Any Blogs</h1>
                                <?php endif; ?>
                        <?php elseif($_SESSION['user']->roleId == 1): ?>
                                <?php if (count($blogsAdmin) > 0) : ?>
                                        <div class="table-responsive">
                                                <table id="foodTable" class="table table-bordered table-striped">
                                                        <thead>
                                                                <tr>
                                                                        <th>#</th>
                                                                        <th>ID</th>
                                                                        <th>Title</th>
                                                                        <th>Image</th>
                                                                        <th>Topic</th>
                                                                        <th>Published</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <?php foreach ($currentRecordsAdmin as $key => $blog) : ?>
                                                                        <tr>
                                                                                <td><?= $key + 1 ?></td>
                                                                                <td><?= $blog->blogId ?></td>
                                                                                <td><?= $blog->title ?></td>
                                                                                <td>
                                                                                        <div class="food-image">
                                                                                                <img class="img-fluid" src="../../assets/img/<?= $blog->image ?>" alt="<?= $blog->title ?>" />
                                                                                        </div>
                                                                                </td>
                                                                                <td><?= $blog->Topic ?></td>
                                                                                <td><?= $blog->published ?></td>
                                                                                <td><a href="edit-blogs.php?blogId=<?= $blog->blogId ?>"><i class="fas fa-edit"></i></a></td>
                                                                                <td>
                                                                                        <a href="delete-blog.php?blogId=<?= $blog->blogId ?>" class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                                </td>
                                                                        </tr>
                                                                <?php endforeach; ?>
                                                        </tbody>
                                                </table>
                                                <div class="pagination">
                                                        <?php for ($i = 1; $i <= $totalPagesAdmin; $i++) : ?>
                                                                <a class="<?php if ($currentPage == $i) : ?>active<?php endif; ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                                                        <?php endfor; ?>
                                                </div>
                                        </div>
                                <?php else : ?>
                                        <h1>There Is No Blogs Created</h1>
                                <?php endif; ?>
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