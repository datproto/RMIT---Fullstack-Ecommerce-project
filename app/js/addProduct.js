function addLocalStorage(name, value) {
    localStorage.setItem(name, value);
}

function displayList() {
    for (let i = 0; i < localStorage.length; i++) {
        var x = localStorage.getItem(i);  // phai bien LocalStorage thanh array trc
        document.getElementById("product_name").innerHTML = x
    }
}



addLocalStorage("Fake Nike Shoes", "350$")

function addProduct() {
    var prod_name = document.getElementById("product_name").value;
    var prod_price = document.getElementById("product_price").value;
    addLocalStorage(prod_name,prod_price)
}

