var element = document.getElementById("map");

var mapTypeIds = [];
for(var type in google.maps.MapTypeId) {
    mapTypeIds.push(google.maps.MapTypeId[type]);
}

mapTypeIds.push("OSM");
mapTypeIds.push("MyGmap");
mapTypeIds.push("LocalGmap");
mapTypeIds.push("WebStorageGmap");
mapTypeIds.push("LocalMyGmap");
mapTypeIds.push("WebStorageMyGmap");

var map = new google.maps.Map(element, {
    center: new google.maps.LatLng(11.1793, 125.6068),
    zoom: 13,
    mapTypeId: "MyGmap",
    mapTypeControlOptions: {
        mapTypeIds: mapTypeIds,
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
});

map.mapTypes.set("OSM", new google.maps.ImageMapType({
    getTileUrl: getOsmTileImgSrc,
    tileSize: new google.maps.Size(256, 256),
    name: "OSM",
    maxZoom: 15
}));

map.mapTypes.set("MyGmap", new google.maps.ImageMapType({
    getTileUrl: getGmapTileImgSrc,
    tileSize: new google.maps.Size(256, 256),
    name: "MyGmap",
    maxZoom: 15
}));

map.mapTypes.set("LocalGmap", new google.maps.ImageMapType({
    getTileUrl: getLocalTileImgSrc,
    tileSize: new google.maps.Size(256, 256),
    name: "LocalGmap",
    maxZoom: 15
}));

map.mapTypes.set("WebStorageGmap", new google.maps.ImageMapType({
    getTileUrl: getWebStorageTileImgSrc,
    tileSize: new google.maps.Size(256, 256),
    name: "WebStorageGmap",
    maxZoom: 15
}));

map.mapTypes.set("LocalMyGmap", new google.maps.ImageMapType({
    getTileUrl: function(coord, zoom) {
        return checkTileInSprites(coord, zoom) ?
            getLocalTileImgSrc(coord, zoom) :
            getGmapTileImgSrc(coord, zoom);
    },
    tileSize: new google.maps.Size(256, 256),
    name: "LocalMyGmap",
    maxZoom: 15
}));

map.mapTypes.set("WebStorageMyGmap", new google.maps.ImageMapType({
    getTileUrl: function(coord, zoom) {
        var image = getWebStorageTileImgSrc(coord, zoom);
        return image ? image : getGmapTileImgSrc(coord, zoom);
    },
    tileSize: new google.maps.Size(256, 256),
    name: "WebStorageMyGmap",
    maxZoom: 15
}));

// Create an InfoWindow instance
var infoWindow = new google.maps.InfoWindow();

// Add a custom marker at the specified coordinates
var marker = new google.maps.Marker({
    position: new google.maps.LatLng(11.173787587990624, 125.61057604040437),
    map: map,
    icon: {
        url: 'Marker.png', // Path to your custom marker image
        scaledSize: new google.maps.Size(200, 200) // Adjust the size as needed
    }
});

// Add click listener to the marker to show InfoWindow
google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent('<img src="../../../../Picture/plaza.jpg" style="height: 100px; width: auto; padding: 10px; border-radius: 2px;"> <br> Seguinon <br> Salcedo <br> Eastern Samar <br> Philippines <br> 6807');
    infoWindow.open(map, marker);
});

// Add click listener to the map to add a marker and show InfoWindow
google.maps.event.addListener(map, 'click', function(point) {
    var newMarker = new google.maps.Marker({
        position: point.latLng,
        map: map
    });

    google.maps.event.addListener(newMarker, 'dblclick', function() {
        newMarker.setMap(null);
    });

    google.maps.event.addListener(newMarker, 'click', function() {
        infoWindow.setContent('lat: ' + point.latLng.lat() + '<br>lng:' + point.latLng.lng());
        infoWindow.open(map, newMarker);
    });
});

function CustomControl(controlDiv, map, title, handler) {
    controlDiv.style.padding = '5px';

    var controlUI = document.createElement('DIV');
    controlUI.style.backgroundColor = 'white';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '2px';
    controlUI.style.cursor = 'pointer';
    controlUI.style.textAlign = 'center';
    controlUI.title = title;
    controlDiv.appendChild(controlUI);

    var controlText = document.createElement('DIV');
    controlText.style.fontFamily = 'Arial,sans-serif';
    controlText.style.fontSize = '12px';
    controlText.style.paddingLeft = '4px';
    controlText.style.paddingRight = '4px';
    controlText.innerHTML = title;
    controlUI.appendChild(controlText);

    google.maps.event.addDomListener(controlUI, 'click', handler);
}

var clearWebStorageDiv = document.createElement('DIV');
var clearWebStorageButton = new CustomControl(clearWebStorageDiv, map,
    'Clear Web Storage', clearWebStorage);

var prepareWebStorageDiv = document.createElement('DIV');
var prepareWebStorageButton = new CustomControl(prepareWebStorageDiv, map,
    'Prepare Web Storage', prepareWebStorage);

clearWebStorageDiv.index = 1;
prepareWebStorageDiv.index = 1;
map.controls[google.maps.ControlPosition.TOP_RIGHT].push(clearWebStorageDiv);
map.controls[google.maps.ControlPosition.TOP_RIGHT].push(prepareWebStorageDiv);
