function getFromLocalStorage(localStorageKey = "items") {
    return JSON.parse(localStorage.getItem(localStorageKey)) || [];
}

function saveToLocalStorage(localStorageKey = "items", value) {
    const items = getFromLocalStorage();
    const newItems = [...items, value];

    localStorage.setItem("items", JSON.stringify(newItems));
}

window.onload = function () {
    const items = getFromLocalStorage();
    var list = "<tr><th>Item</th><th>Value</th></tr>\n";
    items.forEach((item) => {
        // do something with items.
        list += "<tr><td>" + key + "</td>\n<td>"
            + localStorage.getItem(key) + "</td></tr>\n";
    });
};