$("li").mouseover(function(){
    $(this).find('.drop-down').slideDown(100);
    $(this).find(".accent").addClass("animate");
    $(this).find(".item").css("color","#000");
   }).mouseleave(function(){
     $(this).find(".drop-down").slideUp(100);
      $(this).find(".accent").removeClass("animate");
      $(this).find(".item");
   });

   $("li").mouseover(function(){
    $(this).find('.drop-downs').slideDown(100);
    $(this).find(".accent").addClass("animate");
    $(this).find(".item").css("color","#000");
   }).mouseleave(function(){
     $(this).find(".drop-downs").slideUp(100);
      $(this).find(".accent").removeClass("animate");
      $(this).find(".item");
   });