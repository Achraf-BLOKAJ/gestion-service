<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse du Technicien</title>
</head>
<body>
    <h1>Réponse du Technicien pour le client {{ $client->client_name }}</h1>

    <p>Le technicien a répondu : {{ $response }}</p>

    <h3>Informations du Technicien :</h3>
    <p>Nom : {{ $technicianName }}</p>
    <p>Téléphone : {{ $technicianPhone }}</p>

    <h3>Informations du Client :</h3>
    <p>Nom du Client : {{ $client->client_name }}</p>
    <p>Status : {{ $client->intervention }}</p>
</body>
</html>
