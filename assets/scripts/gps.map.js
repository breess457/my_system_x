var map;
var infowindow;

// funcionmap on volunteer
function setupMap() {
  var myOptions = {
    zoom: 8,
    center: new google.maps.LatLng(6.518986436059797, 101.27543260196897),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  infowindow = new google.maps.InfoWindow();
  selectLocation();
}

//function map on officer
function setupMapTrue() {
  var myOptions = {
    zoom: 8,
    center: new google.maps.LatLng(6.518986436059797, 101.27543260196897),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  };
  map = new google.maps.Map(document.getElementById("map_canvastrue"), myOptions);
  infowindow = new google.maps.InfoWindow();
  selectLocation();
}

var markers = [];
function selectLocation() {
  $.ajax({
    type: "GET",
    url: "backend/api/map-api-crud.php?status=SELECT",
  }).done(function (text) {
    var json = $.parseJSON(text);
    var html2 = "";
    for (var i = 0; i < json.length; i++) {
      var lat = json[i].latitude;
      var lng = json[i].logitude;
      var location_name =`<img src="http://localhost/my_system_x/officer/backend/data/orphan-information/${json[i].image_orphan}" width="30px" height="30px" /> &nbsp;  ${json[i].fullname} <br/> ${json[i].location_orphan}`;
      var id = json[i].map_id;
      var latlng = new google.maps.LatLng(lat, lng);
      var makeroption = { map: map, html: location_name, position: latlng };
      var marker = new google.maps.Marker(makeroption);


      google.maps.event.addListener(marker, "click", function (e) {
        infowindow.setContent(this.html);
        infowindow.open(map, this);
      });
    }
  });
}

