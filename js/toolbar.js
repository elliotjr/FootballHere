$("#toolbar").css({
    'visibility': 'visible'
});

$('#yourGames').hide();

$(".filterButton").click(function () {
//    $("#filters").slideToggle();
    $('.darkOverlay').addClass('visible');
    $("#filteredResults").removeClass('hidden');
    $(this).toggleClass("white");
});

$(".infoButton").mouseenter(function () {
    $(".infoPane").removeClass("hidden");
})

$(".infoButton").mouseleave(function () {
    $(".infoPane").addClass("hidden");
})



$(".gamesButton").click(function () {
    $("#yourGames").slideToggle();
    $(this).toggleClass("white");
});

//Filter Results
$(".skill").click(function () {
    $(this).toggleClass("white");
});

//$("#beginnerSkill").click(function () {
//    $('.darkOverlay').addClass('visible');
//    $('#filteredResults').css({'visibility':'visible'});
//    $('.filteredBeginner').addClass('visible');
//});

