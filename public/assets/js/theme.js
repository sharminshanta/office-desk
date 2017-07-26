$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

var docHeight = $( document ).height();
$('#page-content-wrapper').css('min-height', docHeight);