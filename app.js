import "https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js";


mapboxgl.accessToken = 'pk.eyJ1IjoiYmFwdS16IiwiYSI6ImNrZWptZmdoZDB2eGcyeW5wbjZ2eXk4bzYifQ.Rouq_LxVNDJLyEQ0-hr6Zw';
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  zoom: 1.5,
  center: [0, 20],

});

/*fetch("/data.json")
  .then(response => response.json())
  .then(data => {
    const { places, reports } = data;

    reports
      .filter(report => !report.hide)
      .foreach(report => {
        const { infected, placeId } = report;
        const currentPlace = places.find(place => place.id === placeId);
        console.log(infected, currentPlace);
      })
  });
*/
/*fetch('databas.json')
        .then(response => response.json())
        .then(datastar => {console.log(datastar.data)
          // Do something with your da)

        });*/
// As with JSON, use the Fetch API & ES6
fetch('data2.json')
  .then(response => response.json())
  .then(og => {
    console.log(og.data)
    og.data.forEach(element => {

      var ogname = element.name;
      var long = element.longitude;
      var lat = element.latitude;


      fetch('databas.json')
        .then(response => response.json())
        .then(datastar => {
          // Do something with your data
          datastar.data.forEach(element2 => {
            if (element2.name == ogname) {
              if (element2.confirmed >= 5000000)
                var cooler = "rgb(0,0,0)";
              else if (element2.confirmed >= 1000000 && element2.confirmed <= 5000000)
                var cooler = "rgb(255,0,0)";
              else if (element2.confirmed >= 300000 && element2.confirmed <= 1000000)
                var cooler = "rgb(255,140,0)";
              else if (element2.confirmed >= 50000 && element2.confirmed <= 300000)
                var cooler = "rgb(255,255,0)";
              else if(element2.confirmed >=10000 && element2.confirmed <= 50000)
              var cooler = "rgb(0,255,0)";
              else 
              var cooler = "rgb(211,211,211)";
              new mapboxgl.Marker({
                draggable: false,
                color: cooler,
              }).setLngLat([long, lat])
                .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
                .setHTML('<h4>' + ogname + '</h4>'+'<h5>' + "Confirmed" + '</h5>'+'<h5>' + element2.confirmed + '</h5>'+ '<h5>'+ "Recovered" + '</h5>'+ '<h5>'+ element2.recovered + '</h5>'+'<h5>'+ "Deaths" + '</h5>'+'<h5>'+ element2.deaths + '</h5>'))
                .addTo(map);

            }

          })

        });

    })
  });





const mapbox_token = "pk.eyJ1IjoiYmFwdS16IiwiYSI6ImNrZWptZmdoZDB2eGcyeW5wbjZ2eXk4bzYifQ.Rouq_LxVNDJLyEQ0-hr6Zw";

/*mapboxgl.accessToken = mapbox_token;
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/dark-v10',
  zoom: 1.5,
  center: [0, 20],
});*//*
var size = 200;

// implementation of CustomLayerInterface to draw a pulsing dot icon on the map
// see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
var pulsingDot = {
  width: size,
  height: size,
  data: new Uint8Array(size * size * 4),

  // get rendering context for the map canvas when layer is added to the map
  onAdd: function () {
    var canvas = document.createElement('canvas');
    canvas.width = this.width;
    canvas.height = this.height;
    this.context = canvas.getContext('2d');
  },

  // called once before every frame where the icon will be used
  render: function () {
    var duration = 1000;
    var t = (performance.now() % duration) / duration;

    var radius = (size / 2) * 0.3;
    var outerRadius = (size / 2) * 0.7 * t + radius;
    var context = this.context;

    // draw outer circle
    context.clearRect(0, 0, this.width, this.height);
    context.beginPath();
    context.arc(
      this.width / 2,
      this.height / 2,
      outerRadius,
      0,
      Math.PI * 2
    );
    context.fillStyle = 'rgba(255, 200, 200,' + (1 - t) + ')';
    context.fill();

    // draw inner circle
    context.beginPath();
    context.arc(
      this.width / 2,
      this.height / 2,
      radius,
      0,
      Math.PI * 2
    );
    context.fillStyle = 'rgba(255, 100, 100, 1)';
    context.strokeStyle = 'white';
    context.lineWidth = 2 + 4 * (1 - t);
    context.fill();
    context.stroke();

    // update this image's data with data from the canvas
    this.data = context.getImageData(
      0,
      0,
      this.width,
      this.height
    ).data;

    // continuously repaint the map, resulting in the smooth animation of the dot
    map.triggerRepaint();

    // return `true` to let the map know that the image was updated
    return true;
  }
};

map.on('load', function () {
  map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });

  map.addSource('points', {
    'type': 'geojson',
    'data': {
      'type': 'FeatureCollection',
      'features': [
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Point',
            'coordinates': [latitude, longitude]
          }
        }
      ]
    }
  });
  map.addLayer({
    'id': 'points',
    'type': 'symbol',
    'source': 'points',
    'layout': {
      'icon-image': 'pulsing-dot'
    }
  });
});
*/

