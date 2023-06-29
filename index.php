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
                        <option value="dortmund">Borussia Dortmund</option>
                        <option value="bayern">FC Bayern München</option>
                        <option value="frankfurt">Eintracht Frankfurt</option>
                    </select>
                    <input type="submit" value="Suche" id="search-btn">
                </form>   
                <p2>Schnellzugriff:</p2> <br>
                <button onclick="openPageBVB()" class="vereinsbutton button-BVB"></button>
                
            </div>
            <div class="flex-item">
                <p> Übersicht über die verfügbaren Speisen und Preise:</p>
                <?php

                                        // Verbindung zur Datenbank herstellen
                    $servername = "localhost";  // Anpassen, wenn deine Datenbank auf einem anderen Server läuft
                    $username = "tutorial";
                    $password = "test123";
                    $dbname = "web_app";
                    $sql;

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
                            echo "<table id='table-stat'>";
                            echo "<tr><th>Name</th><th>Kosten Stehplatz</th><th>Kosten Dauerkarte</th><th>Kosten Bier</th><th>Kosten Wurst</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["preis_stehplatz"] . "€</td>";
                                echo "<td>" . $row["preis_dauerkarte"] . "€</td>";
                                echo "<td>" . $row["preis_bier"] . "€</td>";
                                echo "<td>" . $row["preis_wurst"] . "€</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
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
                    
?>
            </div>
            <div class="flex-item">
                <p> Aktuelle News und Statistiken zum Verein:</p>
                <?php
                        $auswahl2;
                        if($auswahl == 'bayern') {
                            $auswahl2 = 'punkte_bayern';
                        } else if($auswahl == 'dortmund') {
                            $auswahl2 = 'punkte_dortmund';
                        } else if($auswahl == 'frankfurt') {
                            $auswahl2 = 'punkte_frankfurt';
                        }
                        $sql2 = "SELECT * FROM $auswahl2";
                        $result2 = $conn->query($sql2);
            
                        
                        if ($result2->num_rows > 0) {
                            echo "<table class='table_stat'>";
                            echo "<tr><th>Platz</th><th>Spiele</th><th>Siege</th><th>Unentschieden</th><br /><th>Niederlagen</th><th>Tore</th><th>Gegentore</th><th>Punkte</th></tr>";
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row2["platz"] . "</td>";
                                echo "<td>" . $row2["spiele"] . "</td>";
                                echo "<td>" . $row2["siege"] . "</td>";
                                echo "<td>" . $row2["unentschieden"] . "</td>";
                                echo "<td>" . $row2["niederlagen"] . "</td>";
                                echo "<td>" . $row2["tore"] . "</td>";
                                echo "<td>" . $row2["gegentore"] . "</td>";
                                echo "<td>" . $row2["punkte"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "Keine Ergebnisse gefunden.";
                        }
                
                    $conn->close();
                ?>
            </div>
        </div>
        <footer>
            <p>Alle Rechte vorbehalten &copy; 2023 Internet-Basistechnologien IHK</p>
        </footer>
    </div>
    <script src="app.js"></script>
</body>

</html>