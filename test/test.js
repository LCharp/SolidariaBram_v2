var data = {
  "type": "FeatureCollection",
  "features": [{
    "type": "Feature",
    "geometry": {
      "type": "LineString",
      "coordinates": [[-45, 0],[45, 0]]
    },
    "properties": {
      "color": "red"
    }
  }, {
    "type": "Feature",
    "geometry": {
      "type": "LineString",
      "coordinates": [[0, -45],[0, 45]]
    },
    "properties": {
      "color": "yellow"
    }
  }]
};

var geoJsonLayer = L.geoJson(data, {
  onEachFeature: function (feature, layer) {
    if (layer instanceof L.Polyline) {
      layer.setStyle({
        'color': feature.properties.color
      });
    }
  }
});

var map = L.map('map', {
  'center': [0, 0],
  'zoom': 0,
  'layers': [
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      'attribution': 'Map data &copy; OpenStreetMap contributors'
    }),
    geoJsonLayer
  ]
});
