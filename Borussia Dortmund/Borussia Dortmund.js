// Funktion zum Umschalten der Speisenliste
function toggleFoodList() {
    var essenListe = document.getElementById("essenListe");
    if (essenListe.style.display === "none") {
        essenListe.style.display = "block";
    } else {
        essenListe.style.display = "none";
    }
}

// Funktion zum Umschalten der Getränkeliste
function toggleDrinkList() {
    var getraenkeList = document.getElementById("getraenkeList");
    if (getraenkeList.style.display === "none") {
        getraenkeList.style.display = "block";
    } else {
        getraenkeList.style.display = "none";
    }
}
