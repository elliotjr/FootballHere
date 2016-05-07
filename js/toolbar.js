$("#toolbar").css({'visibility': 'visible'});

$('#yourGames').hide();

$(".filterButton").click(function () {
        $("#filters").slideToggle();
        $(this).toggleClass("whiteFilterButton");
      });

$(".games").click(function(){
  $("#yourGames").slideToggle();
});
