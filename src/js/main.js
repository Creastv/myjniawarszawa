jQuery(document).ready(function () {
  jQuery(".hamburger").click(function () {
    jQuery(".hamburger").toggleClass(" is-active");
    jQuery("#nav").toggleClass("border-nav");
  });
  // jQuery(".opener").click(function(){
  //   jQuery(".wrap-cta").slideToggle("is-active");
  // });
});

var btn = jQuery("#go-to-top");

jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});

btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "300");
});

window.onscroll = function () {
  myFunction();
};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    jQuery("#spacer").css("marginTop", "90px");
  } else {
    navbar.classList.remove("sticky");
    jQuery("#spacer").css("marginTop", "0px");
  }
}
