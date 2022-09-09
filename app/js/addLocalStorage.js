window.onload = function ()
{
    displayList();
}

function displayList() {
    var list = "<table><tr><th>Product Name</th><th>Product Price</th></tr>\n";
    let finalHTMLEnd = "</table>";
    for (let i = 0; i <= localStorage.length-1; i++) {
        var key = localStorage.key(i);
        list += "<tr><td>" + key + "</td>\n<td>"
            + localStorage.getItem(key) + "</td></tr>\n";

    }
    document.getElementById("display_div").innerHTML = list + finalHTMLEnd;
}


function addProduct() {
    var prod_name = document.getElementById("product_name").value;
    var prod_price = document.getElementById("product_price").value;
    localStorage.setItem(prod_name,prod_price);
}