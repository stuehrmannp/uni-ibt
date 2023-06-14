function showList(listId) {
    var list = document.getElementById(listId);
    if (list.classList.contains("hidden")) {
        list.classList.remove("hidden");
    } else {
        list.classList.add("hidden");
    }
}
