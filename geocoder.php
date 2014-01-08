<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Geocoder @Piersoft</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://yohanboniface.github.io/Leaflet.RevealOSM/lib/leaflet.css" />
     <!--[if lte IE 8]>
         <link rel="stylesheet" href="http://yohanboniface.github.io/Leaflet.RevealOSM/lib/leaflet.ie.css" />
     <![endif]-->
    <link rel="stylesheet" href="http://yohanboniface.github.io/Leaflet.RevealOSM/Leaflet.RevealOSM.css" />
    <script src="http://yohanboniface.github.io/Leaflet.RevealOSM/lib/leaflet.js"></script>
    <script src="Leaflet.RevealOSM.js"></script>

	<link rel="stylesheet" href="Control.OSMGeocoder.css" />

	<script src="Control.OSMGeocoder.js"></script>
<link rel="stylesheet" href="L.Control.MousePosition.css" />

 <link rel="stylesheet" href="dist/leaflet.contextmenu.css"/>
 <script src="dist/leaflet.contextmenu.js"></script>

    <style type="text/css">
        #maplecce {
            
        }
 #map {
           position:fixed;
        top:0;
        right:0;
        left:0;
        bottom:0; 
        }
#infodiv{
position:fixed;
        left:2px;
        bottom:2px;
	font-size: 10px;
        z-index:9999;
        border-radius: 10px; 
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border: 2px solid #808080;
        background-color:#fff;
        padding:5px;
        box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
#botonera {
			position:fixed;
			top:10px;
			left:50px;
			z-index: 2;
		}


		.boton {
			border: 1px solid #96d1f8;
			background: #65a9d7;
			background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
			background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
			background: -moz-linear-gradient(top, #3e779d, #65a9d7);
			background: -ms-linear-gradient(top, #3e779d, #65a9d7);
			background: -o-linear-gradient(top, #3e779d, #65a9d7);
			padding: 10px 5px;
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			-webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
			-moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
			box-shadow: rgba(0,0,0,1) 0 1px 0;
			text-shadow: rgba(0,0,0,.4) 0 1px 0;
			color: white;
			font-size: 12px;
			/*font-family: Helvetica, Arial, Sans-Serif;*/
			text-decoration: none;
			vertical-align: middle;
		}
		.boton:hover {
			border-top-color: #28597a;
			background: #28597a;
			color: #ccc;
		}
		.boton:active {
			border-top-color: #1b435e;
			background: #1b435e;
		}
    </style>
</head> 
<body>

    <div id="map" ></div>
<div id="infodiv" style="leaflet-popup-content-wrapper">
<div id="botonera">
<!-- <button onClick="" class="boton">Coordinate al centro</button> -->
		</div>
<b>Semplice geocoder, reverse geocoder, coordinate capture</b></br>
Con il tasto destro del mouse fare "Mostra coordinate" per avere Lat e Lon. Usare il tasto ricerca per luogo in alto a destra. Infine cliccando sull'icona OSM e poi su un nome della mappa, si avranno le informazioni OpenStreetMap relative al quel punto &copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors lic. ODbL | @Piersoft</div>
    <script>

function coordinate(e)
{
	alert(e.latlng);
}

  function showCoordinates (e) {
var str=e.latlng;


 window.prompt("Seleziona e Copia (Ctrl+C) le coordinate tra parentesi e premi Enter", str);        
copy_clipboard(document.getElementById(str).value)
       //  alert(e.latlng);
      }

      function centerMap (e) {
        // map.panTo(e.latlng);
alert(e.latlng);

      }

           var map = L.map('map', {contextmenu: true,
          contextmenuWidth: 140,
         contextmenuItems: [{
                 text: 'Mostra le coordinate',
                 callback: showCoordinates
         }],
            revealOSMControl: true,
            revealOSMControlOptions: {
                queryTemplate: '[out:json];(node(around:{radius},{lat},{lng})[name];way(around:{radius},{lat},{lng})[name][highway];);out body qt 1;'
            },
            zoomControl: true
        }).setView([40.6666,16.6112], 16);

       var osm=new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);
var osmGeocoder = new L.Control.OSMGeocoder();

		 map.addControl(osmGeocoder);

var transport = L.tileLayer('http://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png', {
		attribution: 'Map &copy; Pacific Rim Coordination Center (PRCC).  Certain data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
	});
 

var layerControl = new L.Control.Layers({
		'OSM': osm,
		'Transport': transport 
	}, null, {position: 'topright'});

layerControl.addTo(map);


    </script>
    
</body>
</html>
