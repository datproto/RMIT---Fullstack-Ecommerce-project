function addLocalStorage(name, value, type = "str", action = "add") {
    // STEP 1: Check if the action is valid
    if (['add', 'append'].includes(action)) {
        if (action === 'add') {
            localStorage.setItem(name, value);
        } else {
            // STEP 2: Check if the localStorage includes this variable
            if (localStorage.hasOwnProperty(name)) {
                if (type === 'array') {
                    let key = JSON.parse(localStorage.getItem(name));
                    key.push(value);
                    localStorage.setItem(name, JSON.stringify(key));
                } else {
                    localStorage.getItem(name)
                }
            } else {
                if (type === 'array') {
                    localStorage.setItem(name, JSON.stringify([value]));
                }
                else {
                    localStorage.setItem(name, value);
                }
            }
        }

    } else {
        console.log('Please choose correct action!')
    }
}

// window.onload = function ()
// {
//     displayList();
// }

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