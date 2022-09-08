var input = document.getElementById("searchbar");
input.addEventListener("keydown", function (enter) {
    if (enter.key === "Enter") {
        search()
        }
    }
)


function search() {
    // Get the user's input from the page
    var searchQuery = document.getElementById("searchbar").value;

    // Get the item from LocalStorage
    var localStorageItem = localStorage.getItem(searchQuery);

    // Do your DOM manipulation magic
    if (localStorageItem !== null){
        var elementValue = $('#MyTable')
            .find('tr#key_' + localStorageItem)         // filter
            .children('td.two')
            .text();

        console.log(elementValue);
    } else {
        alert("SORRY THIS ITEM IS NOT AVAILABLE")
    }
}

