<?php
include "config/session.php";
include "includes/head.php";
// include "includes/preloader.php";
include "config/connection.php";
include "includes/nav.php";
include "models/functions.php";


$topics = vratiSve('topics');

$blogovi = vratiBlogove();


?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h3>TOPICS:</h3>
                <hr />
                <!-- Sort -->
                
                <ul class="list-group p-2" id="topic">
                    <?php
          foreach ($topics as $t) :
          ?>
                    <li class="list-group-item">
                        <input type="checkbox" value="<?= $t->Id ?>" class="taste" name="chkTop" />
                        <?= $t->Topic ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!--TASTE-->
                
            </div>
            <!-- proizvodi -->
            <div class="col-lg-9">
                <div class="row" id="blogs">
                    <?php
          if (count($blogovi) == 0)
            echo "<p class='alert alert-danger'>There are no products matching the given criteria.</p>";
          else {
          ?>
                    <?php
            foreach ($blogovi as $b) : 
          ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <a href="#"><img class="card-img-top img-fluid" src="assets/img/<?= $b->image ?>"
                                    alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title"><?= $b->title ?></h4>
                                <div class="d-flex justify-content-between flex-column">
                                    <div class="name">
                                       Author: <?= $b->firstName?> <?= $b->lastName?> 
                                       
                                    </div>
                                    <div class="published">
                                        Published <?= pretty_relative_time($b->published)?>
                                    </div>
                                    <div class="topic">
                                        Topic: <?= $b->topic?>
                                    </div>
                                    <a class="btn btn-info" href="blogContent.php?blogId=<?= $b->blogId ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php
          }
          ?>
                </div>
            </div>

        </div>
    </div>
    </div>
</main>
<!-- HTML -->


<?php
include "includes/footer.php";
?>
