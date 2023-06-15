document.addEventListener('DOMContentLoaded', function() {
    fetch('http://localhost/uni-ibt/index.html/getAll')
    .then(response => response.json())
    .then(data => loadHTMLResult(data['data']));
})

const searchBtn = doucment.getElementById("search-btn");

searchBtn.onclick = function() {
    const searchValue = document.querySelector('#search-input').
    value;

    fetch('http://localhost/uni-ibt/index.html/search/' + searchValue)
    .then(response => response.json())
    .then(data => loadHTMLResult(data['data']));
}

function loadHTMLResult(data) {
    const result = document.getElementById('result');

    console.log(data);
    let resultHtml = "";
    if(data === 0) {
        result.innerHTML = "<p class='no-data'>No data</p>";
    }
}