const searchButton = document.getElementById("search-button");

searchButton.addEventListener('click', () => {
    var searchInput = document.getElementById("search-input").value;
    alert("You searched " + searchInput);
});


function signIn() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if(email=="lei@ella.com" && password=="lala") {
        window.location.href = "index.php";
    }
    else if(email=="admin@admin.com" && password=="admin") {
        window.location.href = "admin/admindash.php";
    }
    else {
        document.getElementById("errorMessage").innerHTML = "*Invalid credentials*"
    }
}