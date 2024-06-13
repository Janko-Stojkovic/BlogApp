<?php
    include("includes/head.php");
    include("config/connection.php");
    include "config/session.php";
    include "models/functions.php";
    include "controllers/registerController.php";
?>
<!-- Template CSS -->
</head>

<body>
    <section class="w3l-banner-slider-main">
        <div class="top-header-content">
            <section class="hero" id="hero">
                <nav class="navbar navbar-expand-lg" id="navbar">
                    <div class="container">
                        <a class="navbar-brand logoLR" href="index.php">
                            <strong>
                                <span>Janko</span>Blog
                            </strong>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            arialabel="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
                <div class="heroText" id="register-cover">
                    <div class="col-6 col-md-offset-2 m-auto lr-form-section">
                        <div class="heading">
                            <h2>REGISTER</h2>
                            <div class="underline"></div>
                        </div>
                        <form class="p-3 loginForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
                            <div class="form-group mb-5">
                                <input type="text" id="inputFirstName" name="firstName" class="form-control"
                                    placeholder="First Name" autofocus>
                                <?= error($errors,"firstName","danger"); ?>
                            </div>
                            <div class="form-group mb-5">
                                <input type="text" id="inputLastName" name="lastName" class="form-control"
                                    placeholder="Last Name" autofocus>
                                <?= error($errors,"lastName","danger"); ?>
                            </div>
                            <!-- Email input -->
                            <div class="form-group mb-5">
                                <input type="text" id="inputName" name="username" class="form-control"
                                    placeholder="Username" autofocus>
                                <?= error($errors,"username","danger"); ?>
                            </div>
                            <div class="form-group mb-5">
                                <input type="email" id="inputEmail" name="email" class="form-control"
                                    placeholder="Email address" autofocus>
                                <?= error($errors,"email","danger"); ?>
                            </div>
                            <!-- Password input -->
                            <div class="form-group mb-5">
                                <input type="password" id="inputPassword" name="password" class="form-control"
                                    placeholder="Password">
                                <?= error($errors,"password","danger"); ?>
                            </div>
                            <div class="form-group mb-5">
                                <input type="password" class="form-control font-small" id="confirmPassword"
                                    name="confirmPassword" placeholder="Confirm password" />
                                <?= error($errors,"confirmPassword","danger"); ?>
                            </div>
                            <!-- 2 column grid layout for inline styling -->
                            <!-- Submit button -->
                            <input type="submit" name="submit" class="btn mp-btn btn-block mb-4" value="Register" />
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Already have an account?<a href="login.php"> Log in</a></p>
                            </div>
                            <?= error($errors,"success","success"); ?>
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