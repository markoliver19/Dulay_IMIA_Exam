<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Philippines Maps</title>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <style>
         body {
         font-family: 'Poppins', sans-serif;
         margin: 0;
         padding: 0;
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         }
         .farmers {
         margin-top: -40px;
         margin-left: 130px;
         }
         .leaflet-popup-content p {
         /* Your custom styles for 
         <p>
            elements in Leaflet popups */
            margin-top: -45px;
            margin-left: 60px;
            }
            .leaflet-popup-content {
            font-family: 'Poppins', sans-serif;
            }
            #map1{
            background-color: #faf5f5;
            border-radius: 10px;
            }
            #map2{
            background-color: #faf5f5;
            border-radius: 10px;
            }
            .map {
            width: 100%; 
            max-width: 80%; 
            height: 400px; 
            max-height: 100%;
            margin: 10px;
            }
            /* Use media queries to adjust styles for larger screens */
            @media (min-width: 768px) {
            .map {
            height: 500px; /* Adjust the height for larger screens */
            }
            }
            h1{
            text-align:center;
            font-family: 'Poppins';
            color:red;
            }
      </style>
   </head>
   <body>
   <div id="map1" class="map"></div>
   <div id="map2" class="map"></div>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
   <script>
      // Create the first map
      var map1 = L.map('map1', {
      //remove watermark
      attributionControl: false
      }).setView([16.849, 122.731], 6);
      
      // Create a second map
      var map2 = L.map('map2', {
      //remove watermark
      attributionControl: false
      }).setView([16.849, 122.731], 6);
      
         // Define a custom red marker icon
         var redIcon = L.icon({
             iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
             iconSize: [25, 41],
             iconAnchor: [12, 41],
             popupAnchor: [1, -34]
         });
      
         // Define a function to add a tile layer to a map
         function addTileLayer(map) {
             L.tileLayer('https://api.mapbox.com/styles/v1/oliverdulay/clopglypc005a01r6gre2axj9/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoib2xpdmVyZHVsYXkiLCJhIjoiY2xvbzZqZGtzMTBqdjJxcWhpOXF0Z2RmOSJ9.laUlxBGnsbAd8imIIXePkw', {
                 maxZoom: 10
             }).addTo(map);
         }
      
         // Add tile layers to both maps
         addTileLayer(map1);
         addTileLayer(map2);
      
         var provinces = [
             {
                 name: "Ilocos Norte",
                 coords: [18.16459, 120.71069],
                 info: "Area: 339,934<br>Alienable and Disposable: 144,948<br>Forest: 194,986<br>2 districts<br>2 cities<br>21 municipalities<br>557 barangays",
                 totalFarmers: "87,963"
             },
             {
                 name: "Ilocos Sur",
                 coords: [17.22754, 120.4648],
                 info: "Area: 257,958<br>Alienable and Disposable: 138,412<br>Forest: 119,546<br>2 districts<br>2 cities<br>32 municipalities<br>768 barangays",
                 totalFarmers: "89,816"
             },
             {
                 name: "La Union",
                 coords: [16.67136, 120.57376],
                 info: "Area: 149,770<br>Alienable and Disposable: 120,307<br>Forest: 29,002<br>2 districts<br>1 city<br>19 municipalities<br>576 barangays",
                 totalFarmers: "73,776"
             },
             {
                 name: "Pangasinan",
                 coords: [15.93612, 120.29066],
                 info: "Area: 536,818<br>Alienable and Disposable: 406,395<br>Forest: 130,423<br>6 districts<br>4 cities<br>44 municipalities<br>1,364 barangays",
                 totalFarmers: "207,084"
             },
         ];
      
         var offices = [
             {
                 name: "Digras Ilocos Norte",
                 coords: [18.07331, 120.68899],
                 info: "Ilocos Norte Research and Experiment Center (INREC) in Dingras, Ilocos Norte",
             },
             {
                 name: "Bactac Ilocos Norte",
                 coords: [18.04959, 120.55143],
                 info: "Ilocos Norte Research and Experiment Center (INREC) in Batac, Ilocos Norte",
             },
             {
                 name: "San Juan Ilocos Sur",
                 coords: [17.75957, 120.46088],
                 info: "Ilocos Sur Research Center (ISREC) San Juan Ilocos Sur",
             },
             {
                 name: "Bacnotan La Union",
                 coords: [16.73174, 120.38818],
                 info: "Ilocos Integrated Agricultural  Research Center (ILIARC) Bacnotan La Union",
             },
             {
                 name: "San Fernando, La Union",
                 coords: [16.60939, 120.31846],
                 info: "Department of Agriculture Regional Office 1 in San Fernando, La Union",
             },
             {
                 name: "Sual Pangasinan",
                 coords: [16.07051, 120.08527],
                 info: "angasinan Research and Experiment Center (PREC) in Sual, Pangasinan",
             },
             {
                 name: "Sta. Barbara, Pangasinan",
                 coords: [16.00280, 120.43308],
                 info: "Pangasinan Research and Experiment Center (PREC) in Sta. Barbara, Pangasinan",
             },
         ];
      
      
           // Define GeoJSON data for Ilocos Norte
           var ilocosNorteData = {
             "type": "Feature",
             "properties": {
                 "name": "Ilocos Norte",
                 "density": 0,
                 "path": "/world/Philippines/Ilocos Norte"
             },
             "geometry": {
                 "type": "Polygon",
                 "coordinates": [
                     [
                         [120.95002, 18.29954],
                         [120.975967, 18.167391],
                         [120.936478, 18.099991],
                         [120.920189, 17.95693],
                         [120.833237, 17.95998],
                         [120.727547, 17.892891],
                         [120.69017, 17.8349],
                         [120.581833, 17.79925],
                         [120.534912, 17.703739],
                         [120.510918, 17.753759],
                         [120.531517, 17.883801],
                         [120.42923, 17.91548],
                         [120.498047, 17.995279],
                         [120.469719, 18.086941],
                         [120.598343, 18.334999],
                         [120.5625, 18.4925],
                         [120.624733, 18.54611],
                         [120.772217, 18.54306],
                         [120.781937, 18.62167],
                         [120.847221, 18.65139],
                         [120.911667, 18.56333],
                         [120.979263, 18.580669],
                         [120.95002, 18.29954]
                     ]
                 ]
             }
         };
      
         // Define GeoJSON data for Ilocos Sur
         var ilocosSurData = {
             "type": "Feature",
             "properties": {
                 "name": "Ilocos Sur",
                 "density": 0,
                 "path": "/world/Philippines/Ilocos Sur"
             },
             "geometry": {
                 "type": "Polygon",
                 "coordinates": [
                     [
                         [120.429077, 17.15262],
                         [120.403343, 17.211109],
                         [120.426697, 17.33531],
                         [120.478889, 17.39361],
                         [120.463058, 17.381109],
                         [120.423058, 17.49667],
                         [120.399445, 17.491667],
                         [120.423889, 17.50778],
                         [120.412498, 17.52667],
                         [120.386673, 17.51944],
                         [120.343987, 17.576111],
                         [120.371391, 17.670561],
                         [120.353333, 17.68889],
                         [120.436111, 17.733061],
                         [120.402588, 17.794849],
                         [120.458054, 17.825001],
                         [120.447227, 17.904289],
                         [120.532532, 17.88143],
                         [120.510918, 17.753759],
                         [120.534912, 17.703739],
                         [120.467194, 17.501829],
                         [120.585564, 17.47625],
                         [120.538841, 17.357611],
                         [120.557953, 17.307779],
                         [120.614288, 17.310699],
                         [120.682648, 17.25573],
                         [120.667351, 17.19393],
                         [120.694687, 17.160561],
                         [120.858276, 17.188181],
                         [120.780548, 17.110371],
                         [120.775467, 16.934839],
                         [120.63884, 16.88802],
                         [120.620323, 16.73068],
                         [120.582947, 16.65984],
                         [120.532089, 16.715561],
                         [120.549522, 16.769569],
                         [120.507141, 16.84346],
                         [120.517349, 16.918619],
                         [120.486748, 16.9007],
                         [120.410294, 16.92057],
                         [120.450546, 17],
                         [120.429077, 17.15262]
                     ]
                 ]
             }
         };
      
         // Define GeoJSON data for La Union
         var laUnionData = {
             "type": "Feature",
             "properties": {
                 "name": "La Union",
                 "density": 0,
                 "path": "/world/Philippines/La Union"
             },
             "geometry": {
                 "type": "Polygon",
                 "coordinates": [
                     [
                         [120.320267, 16.56397],
                         [120.277496, 16.62083],
                         [120.308441, 16.61307],
                         [120.337852, 16.684529],
                         [120.335564, 16.83717],
                         [120.398331, 16.87944],
                         [120.410294, 16.92057],
                         [120.486748, 16.9007],
                         [120.517349, 16.918619],
                         [120.507141, 16.84346],
                         [120.549522, 16.769569],
                         [120.532089, 16.715561],
                         [120.580437, 16.659241],
                         [120.469299, 16.49745],
                         [120.514412, 16.24292],
                         [120.499458, 16.211438],
                         [120.415421, 16.208348],
                         [120.399544, 16.251659],
                         [120.364403, 16.272649],
                         [120.378326, 16.239441],
                         [120.347542, 16.282029],
                         [120.329407, 16.46911],
                         [120.303398, 16.501729],
                         [120.32972, 16.51729],
                         [120.309761, 16.523821],
                         [120.320267, 16.56397]
                     ]
                 ]
             }
         };
      
      
      
         // Define GeoJSON data for Pangasinan with properties
      var pangasinanData = {
      "type": "Feature",
      "properties": {
         "wikidata": "Q13871",
         "mapbox_id": "dXJuOm1ieHBsYzpDQ1N6",
         "short_code": "PH-PAN",
         "place_name": "Pangasinan, Philippines"
      },
      "geometry": {
         "type": "Polygon",
         "coordinates": [
             [
                 [120.482184, 15.737813],
                 [120.388528, 15.771353],
                 [120.266556, 15.618282],
                 [120.15983, 15.800696],
                 [120.022612, 15.844702],
                 [119.904996, 15.815366],
                 [119.915887, 15.846798],
                 [119.848367, 15.966194],
                 [119.767778, 15.936875],
                 [119.778669, 16.131555],
                 [119.785203, 16.294688],
                 [119.898462, 16.374113],
                 [119.996475, 16.288416],
                 [120.094488, 16.121093],
                 [120.120625, 16.043658],
                 [120.27309, 16.041565],
                 [120.395062, 16.108538],
                 [120.432089, 16.204772],
                 [120.501787, 16.21523],
                 [120.519212, 16.242416],
                 [120.704347, 16.196406],
                 [120.832853, 16.175489],
                 [120.919976, 15.989227],
                 [120.856812, 15.811174],
                 [120.813251, 15.792313],
                 [120.728306, 15.867749],
                 [120.601978, 15.834225],
                 [120.593266, 15.888699],
                 [120.54317, 15.773449],
                 [120.482184, 15.737813]
             ]
         ]
      }
      };
      
      
      
      
      
    
         L.geoJSON(ilocosNorteData, {
      style: {
         fillColor: '#22CE83',
         fillOpacity: 1, 
         color: 'black',   
         weight: 1,       
      }
      }).addTo(map1);
      
      L.geoJSON(ilocosSurData, {
      style: {
         fillColor: '#00FF00',
         fillOpacity: 1,
         color: 'black',
         weight: 1,
      }
      }).addTo(map1);
      
      L.geoJSON(laUnionData, {
      style: {
         fillColor: '#00008B',
         fillOpacity: 1,
         color: 'black',
         weight: 1,
      }
      }).addTo(map1);
      
      
      // Add Pangasinan data to map1 and map2
      L.geoJSON(pangasinanData, {
      style: {
         fillColor: '#FFA500', 
         fillOpacity: 1,   
         color: 'black',       
         weight: 1           
      }
      }).addTo(map1);
      
      
      
      L.geoJSON(ilocosNorteData, {
      style: {
         fillColor: '#22CE83',
         fillOpacity: 1,
         color: 'black',
         weight: 1,
      }
      }).addTo(map2);
      
      L.geoJSON(ilocosSurData, {
      style: {
         fillColor: '#00FF00',
         fillOpacity: 1,
         color: 'black',
         weight: 1,
      }
      }).addTo(map2);
      
      L.geoJSON(laUnionData, {
      style: {
         fillColor: '#00008B',
         fillOpacity: 1,
         color: 'black',
         weight: 1,
      }
      }).addTo(map2);
      
      
      
      
      L.geoJSON(pangasinanData, {
      style: {
         fillColor: '#FFA500', 
         fillOpacity: 1,    
         color: 'black',     
         weight: 1            
      }
      }).addTo(map2);
      
         // Add markers to the first map
         provinces.forEach(function (province) {
             L.marker(province.coords, { icon: redIcon })
                 .addTo(map1)
                 .bindPopup(`<strong>${province.name}</strong><br>${province.info}<br>Total Farmers: ${province.totalFarmers}<br>
                 <img src="malefemalefarmers.png" width="60" height="60" class='farmers'>`);
         });
      
         // Add markers to the second map (you can customize this map separately)
         offices.forEach(function (office) {
             L.marker(office.coords, { icon: redIcon })
                 .addTo(map2)
                 .bindPopup(`<strong>${office.name}</strong><br> <img src="logo.png" width="60" height="60" class='logo'><p>${office.info}</p>
             `);
         });
   </script>
   </body>
</html>