import "https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js";

/*
const mapbox_token = "pk.eyJ1IjoiYmFwdS16IiwiYSI6ImNrZWptZmdoZDB2eGcyeW5wbjZ2eXk4bzYifQ.Rouq_LxVNDJLyEQ0-hr6Zw";

  mapboxgl.accessToken = mapbox_token;
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11'
    zoom:1.5,
    center: [0,20]
  });*/


fetch("https://coronavirus.app/get-latest")
    .then(response => response.json())
    .then(data => {
        const { places, reports } = data;

        reports
            .filter(report => !report.hide)
            .foreach(report => {
                const { infected, placeId } = report ;
                const currentPlace = places.find(place =>place.id == placeId);
                console.log(infected, currentPlace);
            })
    });
