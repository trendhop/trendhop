$(document).ready(function() {
	jQuery('#out-of-the-box-demo').slippry();

  $(window).scroll(function() {
    var x = $(window).scrollTop();

    if (x >= 42) {
      $(".logo_section").hide("fast");
    } else {
      $(".logo_section").show("slow");
    }
  });
});
