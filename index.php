<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css" type="text/css">
    <script src="function.js"></script>
    <title>Bundesliga Wurst Index</title>
</head>

<body>
    <div class="flex-container">
        <header>
            <div class="logo-header">
                <img src="./source/bundesliage-logo.png" />
            </div>
            <div class="header-text">
                <p>Der Bundesliga Index</p>
            </div>
        </header>
        <div class="parent">
            <div class="flex-item-text">
                <p>Wir bieten Ihnen eine Übersicht über die verfügbaren Speisen und Preise in den verschiedenen Stadien.
                    <br><br>
                    Wählen Sie einfach in folgendem Suchfeld ihr Stadion aus, und vergleichen Sie Angebot und Preise mit
                    anderen Stadien. <br><br>
                </p>
            </div>
        </div>
        <div class="parent">
            <div class="flex-item">
                <!--- <p>Bitte Stadion eingeben: <br> -->
                <!-- <div class="search-item">
                    <input placeholder="Suche nach dem Stadion" id="search-input">
                    <button id="search-btn">Suchen</button>
                </div> -->
                <form action="<?php echo $SERVER['PHP_SELF']; ?>" method="POST">
                    <label for="auswahl">Auswahl:</label>
                    <select name="auswahl" id="auswahl">
                        <option value="borussia">Dortmund</option>
                        <option value="frankfurt">Frankfurt</option>
                        <option value="berlin">Berlin</option>
                    </select>
                    <input type="submit" value="Suche">
                </form>   
                <?php

                                        // Verbindung zur Datenbank herstellen
                    $servername = "localhost";  // Anpassen, wenn deine Datenbank auf einem anderen Server läuft
                    $username = "tutorial";
                    $password = "test123";
                    $dbname = "web_app";

                    // Verbindung
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verbindung überprüfen
                    if ($conn->connect_error) {
                        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
                    }

                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Den ausgewählten Wert aus der Dropdown-Form erhalten
                        $auswahl = $_POST['auswahl'];

                        // MySQL-Abfrage ausführen
                        $sql = "SELECT * FROM $auswahl";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Verarbeitung der Abfrageergebnisse
                            while ($row = $result->fetch_assoc()) {
                                echo "ID: " . $row["id"] . ", Name: " . $row["name"] . ", Plätze: " . $row["plaetze"] . "<br>";
                            }
                        } else {
                            echo "Keine Ergebnisse gefunden.";
                        }
                    }

                    // Abfrage ausführen
                    // $sql = "SELECT * FROM stadien";
                    // $result = $conn->query($sql);

                    // // Ergebnisse anzeigen
                    // if ($result->num_rows > 0) {
                    //     echo "<table>";
                    //     echo "<tr><th>ID</th><th>Name</th><th>Plätze</th></tr>";
                    //     while ($row = $result->fetch_assoc()) {
                    //         echo "<tr>";
                    //         echo "<td>" . $row["id"] . "</td>";
                    //         echo "<td>" . $row["name"] . "</td>";
                    //         echo "<td>" . $row["plaetze"] . "</td>";
                    //         echo "</tr>";
                    //     }
                    //     echo "</table>";
                    // } else {
                    //     echo "Keine Ergebnisse gefunden.";
                    // }

                    // Verbindung schließen
                    $conn->close();
?>

                <!--- <p>Bitte Stadion eingeben: <br>
                    <input type="text"> <input type="button" value="Suchen" /> -->
                <p2>Schnellzugriff:</p2> <br>
                <button onclick="openPageBVB()" class="vereinsbutton button-BVB">BVB</button>
                <br>
                <button onclick="openPageBayern()" class="vereinsbutton button-Bayern">Bayern</button>
                <br>
                <button onclick="openPageS04()" class="vereinsbutton button-S04">S04</button>
                </p>
            </div>
            <div class="flex-item">
                <p> Übersicht über die verfügbaren Speisen und Preise:</p>
            </div>
            <div class="flex-item">
                <p> Aktuelle News und Statistiken zum Verein:</p>
            </div>
        </div>
        <footer>
            <p>Alle Rechte vorbehalten &copy; 2023 Internet-Basistechnologien IHK</p>
        </footer>
    </div>
    <script src="app.js"></script>
</body>

</html>