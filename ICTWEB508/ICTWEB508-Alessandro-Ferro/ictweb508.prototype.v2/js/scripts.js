const searchButton = document.getElementById("search-button");

searchButton.addEventListener('click', () => {
    var searchInput = document.getElementById("search-input").value;
    alert("You searched " + searchInput);
});