document.getElementById("essenButton").addEventListener("click", function() {
    var essenListe = document.getElementById("essenListe");
    if (essenListe.style.display === "none") {
        essenListe.style.display = "block";
    } else {
        essenListe.style.display = "none";
    }
});
