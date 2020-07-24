
    $(window).scroll(function(){
      if ($("#menu").offset().top > 150) {
        $("#menu").addClass("bg-primary");

      } else {
        $("#menu").removeClass("bg-primary");
      } 
    });
