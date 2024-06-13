<?php
  include "config/session.php";

  include "includes/head.php";
  // include "includes/preloader.php";
  include "config/connection.php";
  include "includes/nav.php";
  
?>
<main>
   

    
    <!-- YOUR FAVORITES START -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 banner_home">
                <div id="banner_home" class="mb-5">
                    <h1 class="banner-title">Welcome To My Blog Application Project</h1>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- YOUR FAVORITES END  -->
    <!-- TESTIMONIALS -->
    <section class="testimonials my-3">
        <div class="container">
            <div class="heading">
                <h1>HAPPY BLOGGERS</h1>
                <div class="underline"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="customers-testimonials" class="owl-carousel">

                        <!--TESTIMONIAL 1 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="assets/img/t1.jpg" alt="Testimonials 1." />
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="testimonial-name">MONICA</div>
                        </div>
                        <!--END OF TESTIMONIAL 1 -->
                        <!--TESTIMONIAL 2 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="assets/img/t2.jpg" alt="Testimonials 2." />
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="testimonial-name">ANNA</div>
                        </div>
                        <!--END OF TESTIMONIAL 2 -->
                        <!--TESTIMONIAL 3 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="assets/img/t3.jpg" alt="Testimonials 3." />
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="testimonial-name">LARA</div>
                        </div>
                        <!--END OF TESTIMONIAL 3 -->
                        <!--TESTIMONIAL 4 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="assets/img/t4.jpg" alt="Testimonials 4." />
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="testimonial-name">MIA</div>
                        </div>
                        <!--END OF TESTIMONIAL 4 -->
                        <!--TESTIMONIAL 5 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle" src="assets/img/t5.jpg" alt="Testimonials 5." />
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="testimonial-name">ELENA</div>
                        </div>
                        <!--END OF TESTIMONIAL 5 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF TESTIMONIALS -->
</main>
<?php
      include "includes/footer.php";
    ?>