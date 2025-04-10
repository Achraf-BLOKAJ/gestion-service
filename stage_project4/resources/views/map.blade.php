<!-- resources/views/map.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Laravel</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        function initMap() {
            // Les coordonnées par défaut (exemple: Paris)
            const center = { lat: 48.8566, lng: 2.3522 };
            
            // Créer la carte
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: center,
            });
            
            // Ajouter un marqueur
            const marker = new google.maps.Marker({
                position: center,
                map: map,
            });
        }
    </script>
    
    <!-- Remplacez YOUR_API_KEY par votre clé API Google Maps -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhwocS6ao2gxmFQlbRiktO0B0nIuRbkGQ&callback=initMap">
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('AIzaSyBhwocS6ao2gxmFQlbRiktO0B0nIuRbkGQ') }}&callback=initMap">
    </script>
</body>
</html>