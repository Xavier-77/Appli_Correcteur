<!DOCTYPE html>
<html>
<head>
    <title>Quitter l'application</title>
</head>
<body>
    <button onclick="quitterApplication()">Quitter l'application</button>

    <script>
        function quitterApplication() {
            if (confirm("Voulez-vous vraiment quitter l'application?")) {
                window.close(); // Ferme la fenêtre ou l'onglet actuel
            }
        }
    </script>
</body>
</html>

