// script.js

// Funktion zum Zurückgehen zur vorherigen Seite
function goBack() {
    window.history.back();
}

// Funktion zum Anzeigen/Verstecken der Essensliste
function toggleFoodList() {
    var foodList = document.getElementById('essenListe');
    if (foodList.style.display === 'none') {
        foodList.style.display = 'block';
    } else {
        foodList.style.display = 'none';
    }
}

// Funktion zum Anzeigen/Verstecken der Getränkeliste
function showList(listId) {
    var list = document.getElementById(listId);
    list.classList.toggle('hidden');
}
