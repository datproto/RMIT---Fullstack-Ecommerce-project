function addLocalStorage(name, value) {
    localStorage.setItem(name, value);
    // document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
}

for (let i = 0; i < localStorage.length; i++) {

}

var prod_name = document.getElementById("product_name").value;
var prod_price = document.getElementById("product_price").value;

function addProduct() {
    addLocalStorage(prod_name, prod_price)
}

addLocalStorage("Fake Nike Shoes", "350$")