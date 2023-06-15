const express = require('express');
const mysql = require('mysql');

const app = express();

// MySQL-Datenbankverbindung erstellen
const connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: 'Ihkibt3',
    database: 'stadion_project'
});

// Verbindung zur Datenbank herstellen
connection.connect(function(err) {
    if (err) {
        console.error('Fehler bei der Verbindung zur Datenbank: ' + err.stack);
        return;
    }
    console.log('Verbindung zur Datenbank hergestellt als ID ' + connection.threadId);
});

// Routen-Handler für den POST-Antrag
app.post('/datenAbrufen', function(req, res) {
    const suchbegriff = req.body.suchbegriff;

    // SQL-Abfrage ausführen
    const sql = "SELECT * FROM stadion WHERE spaltenname = name";
    connection.query(sql, [suchbegriff], function(err, results) {
        if (err) {
            console.error('Fehler bei der Abfrage: ' + err.stack);
            return;
        }
        res.send(results);
        console.log(results);
    });
});

// Server starten
app.listen(3000, function() {
    console.log('Server läuft auf Port 3000');
});