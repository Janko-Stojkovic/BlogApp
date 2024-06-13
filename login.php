<?php
    include "config/session.php";

    include "includes/head.php";
    include "config/connection.php";
    include "controllers/loginController.php";

   
?>

<section class="w3l-banner-slider-main">
    <div class="top-header-content">
        <section class="hero" id="hero">
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <span>Janko</span>Blog
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" arialabel="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="heroText" id="log-in-cover">
                <div class="container text-center">
                    <div class="col-8 col-md-offset-2 m-auto lr-form-section">
                        <div class="heading">
                            <h2>WELCOME BACK</h2>
                            <div class="underline"></div>
                        </div>
                        
                        <form class="p-3 loginForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
                            <!-- Email input -->
                            <div class="form-group mb-5">
                                <input type="text" id="inputEmail" name="userEmail" class="form-control"
                                    placeholder="Email address or Username">
                            </div>
                            <!-- Password input -->
                            <div class="form-group mb-5">
                                <input type="password" id="inputPassword" name="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <!-- 2 column grid layout for inline styling -->
                            <!-- Submit button -->
                            <input name="btnSubmit" type="submit" class="btn mp-btn btnblock mb-4" value="LOG IN" />
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Not a member? <a href="register.php">Register here</a></p>
                            </div>
                            <?php if($error): ?>
                            <div class="alert alert-danger">
                                <?= $error ?>
                            </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!--/nav-->
        <!--//nav-->
    </div>
</section>
</body>