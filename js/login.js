// Displays and removes the login overlay
$(document).ready(function () {
    $("#loginButton").click(function () {
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


// Change Log In pane to Sign Up pane
$(document).ready(function(){
    $('#goToSignup').click(function(){
        $('#loginForm').css({'display' : 'none'});
        $('#signupForm').css({'display' : 'block'});
        $('.loginOverlay').css({'background-color' : '#6d006d'});
    });
    
    $('#goToLogin').click(function(){
        returnToLoginPane();
    });
})

function returnToLoginPane(){
    $('#signupForm').css({'display' : 'none'});
    $('#loginForm').css({'display' : 'block'});
    $('.loginOverlay').css({'background-color' : '#C04848'});
};