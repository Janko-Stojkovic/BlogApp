<?php

  include "includes/head.php";
  // include "includes/preloader.php";
  include "config/connection.php";
  include "config/session.php";
  include "includes/nav.php";
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 about-text">
                <div class="heading">
                    <h1>ABOUT US</h1>
                    <div class="underline"></div>
                </div>

                <p>
                Duis convallis lacus eget odio cursus dignissim. Vivamus accumsan, neque vitae malesuada sagittis, 
                orci mauris aliquam ex, at commodo eros augue id nisi. Suspendisse ac sem sed lectus varius tincidunt sed non erat. 
                Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum eget tempus nunc. 
                Mauris dignissim, sem in mollis porta, lorem arcu rhoncus risus, non semper elit orci vitae risus. 
                Maecenas consectetur metus in vestibulum dapibus. Aliquam pellentesque sapien mauris, id lacinia erat pulvinar sit amet. 
                Nullam blandit felis nec sodales lacinia. Ut aliquam erat eleifend tortor lobortis, ut sollicitudin purus fermentum. 
                Quisque viverra eu dolor id tincidunt. Curabitur vel viverra lacus. Aenean sem erat, tristique eu aliquet at, volutpat vitae magna. 
                Sed eu finibus est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; 
                Quisque vel ipsum lacinia, aliquam erat sed, feugiat eros.
                </p>
            </div>
            <div class="col-12 col-md-6 about-bg">
                <img src="assets/img/blogAbout.jpg" alt="About blog picture" class="img-fluid pb-5" />
            </div>
        </div>
    </div>
    <!-- END HEADER -->

    <!-- START AUTHOR -->
    <section>
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <img src="assets/img/about.jpeg" alt="Author's photo." class="img-fluid">
                </div>
                <div class="col-12 col-md-6">
                    <div class="heading" style="margin: 15px; padding: 0; letter-spacing: 3px;">
                        <h2>ABOUT AUTHOR</h2>
                        <div class="underline mb-2"></div>
                    </div>
                    <p class="pl-2 w-100">
                        My name is Janko Stojkovic. I was born in Kragujevac. I'm 22 years old.
                        I am currently in my final year at College of Information and Communication Technologies/ ATUSS, Belgrade, 
                        majoring in web development. I possess solid knowledge and hands-on experience in web development using technologies such as 
                        HTML, CSS, JavaScript, PHP, Laravel, MySQL, C#, and ASP.NET. Additionally, 
                        I have started learning React and the basics of Java on my own to further enhance my development skills.
                    </p>
                    <a href="https://janko-stojkovic.github.io/Portfolio/" target="_blank">
                        <button type="button" class="mp-btn px-3 ml-1 mt-0">PORTFOLIO</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END AUTHOR -->
</main>
<?php
    include "includes/footer.php";
  ?>