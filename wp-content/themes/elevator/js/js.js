// HAMBURGLERv2

jQuery(document).ready(function($) {


$(document).ready(function () {
   
    $(".icon").click(function () {
        $(".mobile-nav").toggleClass("extended");
        $(".top-menu").toggleClass("top-animate");
        $(".mid-menu").toggleClass("mid-animate");
        $(".bottom-menu").toggleClass("bottom-animate");
    });
});



// Search bar click
$(document).ready(function () {

   
        $("#search-icon").click(function (){
            $('#search-input').focus();
            console.log("clicked it");
        });

 
});

});