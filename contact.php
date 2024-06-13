<?php
  include "config/session.php";

  include "includes/head.php";
  // include "includes/preloader.php";
  include "config/connection.php";
  include "includes/nav.php";
  include "models/functions.php";
  include "controllers/contactController.php";

  

?>
<main>
    <div id="contact-cover" class="text-center">
        <!-- CONTACT START -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 m-auto bg-contact">
                    <div class="heading">
                        <h1>CONTACT US</h1>
                        <div class="underline"></div>
                    </div>
                    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="imePrezime" class="form-control contact-input"
                                        placeholder="Name">
                                    <span id="error-name"><?= error($errors,"name","danger") ?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control contact-input"
                                        placeholder="Email">
                                    <span id="error-email"><?= error($errors,"email","danger") ?></span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="number" id="number" class="form-control contact-input"
                                        placeholder="06x/xxx-xxxx">
                                    <span id="error-number"><?= error($errors,"number","danger") ?></span>


                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" rows="4"
                                        placeholder="Message"></textarea>
                                    <span id="error-message"><?= error($errors,"message","danger") ?></span>

                                </div>
                            </div>
                        </div>
                        <input type="submit" name="btnSubmitForm" value="SEND" class="mp-btn btn btn-default mt-1"
                            id="btnSubmitMessage" />
                        <?= error($errors,"success","success") ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- CONTACT END -->
    </div>
</main>
<?php
    include "includes/footer.php";
  ?>