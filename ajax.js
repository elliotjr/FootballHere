$(document).on('click','.save',function(e) {
  var data = $('.addGame').serialize();
   $.ajax({
          data: data,
          type: "GET",
          url:  "addGameToDb.php",
          success: function(data){
               alert("Your Game was Added Successfully");
          }
    });
});
