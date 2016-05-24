// Displays and removes the login overlay
$(document).ready(function () {
    $("#addGameButton").click(function () {
        $(".darkOverlay").toggleClass('visible');
        $(".loginOverlay").toggleClass('visible');
    });
    
    $(".darkOverlay").click(function () {
        $(this).removeClass('visible');
        $(".loginOverlay").removeClass('visible');
        
        returnToLoginPane();
    });
});


// Escape key removes login overlay
$(document).keyup(function (e) {
    if (e.which === 27) {
        if ($('.darkOverlay').hasClass('visible')) {
            $('.darkOverlay').toggleClass('visible');
            $('.loginOverlay').toggleClass('visible');
            
            returnToLoginPane();
        }
    }
    
});
