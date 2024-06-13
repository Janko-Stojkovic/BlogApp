
// to top button
window.onscroll = function () {
  scrollFunction()
};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("movetop").style.display = "block";
    
  } else {
    document.getElementById("movetop").style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



// TESTIMONIALS

jQuery(document).ready(function($) {
  "use strict";
  //  TESTIMONIALS CAROUSEL HOOK
  $('#customers-testimonials').owlCarousel({
      loop: true,
      center: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots:true,
      autoplayTimeout: 8500,
      smartSpeed: 450,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1170: {
          items: 3
        }
      }
  });
});

//preloader

// $(window).ready(() => {
//   setTimeout(() => {
//       $('.loading').animate({
//           opacity: 0
//       }, 500)
//   }, 2000)

//   setTimeout(() => {
//       $('.loading').remove()
//   }, 3000)
// })




// SHOP PAGE

$(document).ready(function() {
  $('input[name="chkTop"]').change(function(){
    var checkedTopics = $('input[name="chkTop"]:checked').map(function() {
      return this.value;
    }).get();


    $.ajax({
      url: "models/filter_products.php",
      method: "post",
      data: {
        idsTopic: checkedTopics
      },
      dataType: "json",
      success: function(response){
        stampajBlogove(response);
      },
      error: function(xhr){
        console.error(xhr);
      }
    });
  });
});

// Funkcija za prikazivanje proizvoda
function stampajBlogove(nizBlogova){
  let html = "";
  if(nizBlogova.length == 0){
    html += `<p class='alert alert-danger'>There are no blogs matching the given criteria.</p>`;
  } else {
    for(let blog of nizBlogova){
      html += `<div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                  <a href="#"><img class="card-img-top img-fluid" src="assets/img/${blog.image}" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">${blog.title}</h4>
                      <div class="d-flex justify-content-between flex-column">
                        <div class="name">
                          Author: ${blog.firstName} ${blog.lastName}
                        </div>
                        <div class="published">
                          Published ${moment(blog.published).fromNow()}
                        </div>
                        <div class="topic">
                          Topic: ${blog.topic}
                        </div>
                        <a class="btn btn-info" href="blogContent.php?blogId=${blog.blogId}">Read More</a>
                      </div>
                    </div>
                </div>
              </div>`;
    }
  }
  $("#blogs").html(html);
}








