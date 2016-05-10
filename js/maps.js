var map;

function getGameAttendances() {
  $.ajax({
      url: 'getAllGames.php',
      dataType: 'json',
      success: function( oData ) {
        for (i = 0; i < oData.length; i++) {
          var latt = parseFloat(oData[i].lat);
          var lngg = parseFloat(oData[i].lng);
          var myLatLng = {lat: latt, lng: lngg};
          var title = oData[i].user + " " + oData[i].location;
          var infowindow = new google.maps.InfoWindow({
            content: getInfoContent(oData[i].location, oData[i].user, oData[i].date, oData[i].game_id)
          });
          addMarker(myLatLng, map, title, infowindow, oData[i].location, oData[i].user, oData[i].date, oData[i].game_id);
        }
      }
  });
}


function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -27.479820
            , lng: 153.026070
        }
        , zoom: 13
    });

    var infoWindow = new google.maps.InfoWindow({
        map: map
    });

    //Try HTML5 geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude
                , lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here!');
            map.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        //Browser doesn't support geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }



    function addMarker(myLatLng, map, title, infowindow, location, user, date, gameid) {
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: title
      });

      marker.addListener('mouseover', function() {
          infowindow.open(map, marker);
        });

      marker.addListener('mouseout', function() {
          infowindow.close();
        });

      marker.addListener('click', function() {
        var text = '{ "result" : [{"gameid":"'+gameid+'", "user":"'+user+'"}]}';
        var obj = JSON.parse(text);
        $.ajax({
          type: "GET",
          data: {gameArray: JSON.stringify(obj)},
          url: "joinGame.php",
          success: function(){
            alert("You Are Now Attending This Game");
            var $game = "<div class='yourGames'><h2>"+user+": "+gameid+"</h2></div>";
            $("#yourGames").append($game);
          }
      });
      });

    }


    function getInfoContent(location, user, date, gameid) {
      var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading>Game at'+location+'</h1>'+
      '<div id="bodyContent">'+
      '<p>Organised by '+user+'</p>'+
      '<p>Game date: '+date+'</p>'+
      '<h1>Click Marker to RSVP</h1>'+
      '</div>'+
      '</div>';
      return contentString;
    }


    $.ajax({
        url: 'getAllGames.php',
        dataType: 'json',
        success: function( oData ) {
          for (i = 0; i < oData.length; i++) {
            var latt = parseFloat(oData[i].lat);
            var lngg = parseFloat(oData[i].lng);
            var myLatLng = {lat: latt, lng: lngg};
            var title = oData[i].user + " " + oData[i].location;
            var infowindow = new google.maps.InfoWindow({
              content: getInfoContent(oData[i].location, oData[i].user, oData[i].date, oData[i].game_id)
            });
            addMarker(myLatLng, map, title, infowindow, oData[i].location, oData[i].user, oData[i].date, oData[i].game_id);
          }
        }
    });
}



function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        "Sorry! We could not find your location" :
        "Sorry! Your browser does not support geolocation");
}
