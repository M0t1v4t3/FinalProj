<?php include('header.php');
include 'db.php';
 ?>
<main>
    <h2>Stray Community Map</h2>
    <p style="text-align: center; margin-bottom: 2rem; color: #666;">
        Use our interactive map to report stray animals in your area or find nearby rescue centers.
    </p>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        .map-container {
            width: 100%;
            height: 500px;
            margin: 0 auto;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
    </style>
    
    <!-- Map Container -->
    <div class="map-container" id="map"></div>
    
    <script>
        // Initialize the map
        const map = L.map('map').setView([14.5678, 121.0206], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Load markers from JSON
        fetch('map-locations.json')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    const marker = L.marker([location.lat, location.lng])
                        .addTo(map)
                        .bindPopup(`<b>${location.title}</b><br>${location.info}`);
                });
            })
            .catch(error => {
                console.error("Error loading locations:", error);
                document.getElementById("map").innerHTML = 
                    "<p>Error loading map data. Please try again later.</p>";
            });
    </script>
</main>
<?php include('footer.php'); ?>