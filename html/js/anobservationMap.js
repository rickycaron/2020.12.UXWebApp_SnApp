let map;

// Initialize and add the map
function initMap() {
    let locationString = document.getElementById("observation_location").innerText;
    let locationArray = locationString.replace(/\s+/g, '').split(',');;
    // The location of Uluru
    const uluru = { lat: parseFloat(locationArray[0]), lng: parseFloat(locationArray[1]) };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}