
class LMap {
    constructor() {
      document.querySelectorAll(".acf-map").forEach(el => {
        this.new_map(el)
      })
    }
 
    new_map($el) {
      var $markers = $el.querySelectorAll(".marker")
 
      var map = L.map($el).setView([0, 0], 18);

      var access_token = `<?php echo $_ENV["MAPBOX_ACCESS_TOKEN"] ?>`
 
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/mapbox/streets-v11">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: php_vars.mapbox_access_token
      }).addTo(map);
    
      map.markers = []
      var that = this
  
      // add markers
      $markers.forEach(function (x) {
        that.add_marker(x, map)
      })
 
      // center map
      this.center_map(map)
    } // end new_map
 
    add_marker($marker, map) {
      var marker = L.marker([$marker.getAttribute("data-lat"), $marker.getAttribute("data-lng")]).addTo(map);
 
      map.markers.push(marker)
  
      // if marker contains HTML, add it to an infoWindow
      if ($marker.innerHTML) {
        // create info window
        marker.bindPopup($marker.innerHTML);
      }
    } // end add_marker
 
    center_map(map) {
      var bounds = new L.LatLngBounds()
  
      // loop through all markers and create bounds
      map.markers.forEach(function (marker) {
        var latlng = new L.LatLng(marker._latlng.lat, marker._latlng.lng)
  
        bounds.extend(latlng)
      })
  
      map.fitBounds(bounds)
    } // end center_map
}
 
export default LMap;