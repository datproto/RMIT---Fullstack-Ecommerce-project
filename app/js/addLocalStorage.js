function addLocalStorage(name, value) {
    localStorage.setItem(name, value);
    // document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
}

function displayList() {
    var text = "";
    var displayList = document.getElementById("product_name");
    for (var i = 0; i < localStorage.length; i++) {
        var key = localStorage.key(i);
        text += localStorage.getItem(key) + "<br>";
    }
    displayList.innerHTML += text;
}


function addProduct() {
    var prod_name = document.getElementById("product_name").value;
    var prod_price = document.getElementById("product_price").value;
    addLocalStorage(prod_name,prod_price)
}