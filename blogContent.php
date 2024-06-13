<?php
include "config/session.php";
include "includes/head.php";
include "config/connection.php";
include "includes/nav.php";
include "models/functions.php";
include "controllers/blogContentController.php";

?>

<main>
    <div class="container"> 
        <div class="row">
            <div class="card blogContentCard col-lg-7">
                <img class="card-img-top single-card-img" src="assets/img/<?= $blog->image ?>" alt="Card image cap">
                <div class="card-body under-image flex-row">
                    <div class="col-lg-6">
                        <h6>Date published: <?= $date ?></h6>
                        <h6>Author: <?= $blog->firstName ?> <?= $blog->lastName ?></h6>
                    </div>
                    <div class="col-lg-6 under-image-right">
                        <h6>Published <?= pretty_relative_time($blog->published) ?></h6>
                    </div>
                </div>
                <div class="card-body">
                <h1 class="card-title single-card-title mb-5 text-center"><?= $blog->title ?></h1>
                <p class="card-text"><?= $blog->blog ?></p>
                
                </div>
            </div>
            <div class="right-sidebar col-lg-4">
                <div class="section popular">
                    <h2 class="section-title">
                        Popular
                    </h2>
                    <?php foreach($popularBlogs as $pb): ?>
                    <div class="post clearfix">
                       
                        <a href="blogContent.php?blogId=<?= $pb->blogId ?>" class="img"> <img src="assets/img/<?= $pb->image ?>" alt="" ></a>
                        <a href="blogContent.php?blogId=<?= $pb->blogId ?>" class="title"><h5><?= $pb->title ?></h5></a>
                        <p><?= $pb->Topic ?></p>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>  
    </div>
</main>

<?php
include "includes/footer.php";
?>