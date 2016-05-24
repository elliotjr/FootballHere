$("#toolbar").css({
    'visibility': 'visible'
});

$('#yourGames').hide();

$(".filterButton").click(function () {
    $("#filters").slideToggle();
    $(this).toggleClass("white");
});

$(".gamesButton").click(function () {
    $("#yourGames").slideToggle();
    $(this).toggleClass("white");
});