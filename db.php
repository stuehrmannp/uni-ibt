<?php
// Verbindung zur MySQL-Datenbank herstellen
$servername = "localhost";
$username = "tutorial";
$password = "test123";
$dbname = "web_app";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$keyword = $_GET['keyword'];

// SQL-Abfrage mit dem Suchbegriff erstellen
$sql = "SELECT * FROM stadien WHERE name  LIKE '%$keyword%'";

// Die Abfrage ausführen
$result = $conn->query($sql);

// Überprüfen, ob die Abfrage erfolgreich war
$results = array();
if($results) {
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}

$conn->close();

return $results;


?>
