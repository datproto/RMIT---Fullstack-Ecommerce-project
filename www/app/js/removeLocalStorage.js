function removeLocalStorage(name) {
    localStorage.removeItem(name);
}

function removeProduct() {
    for (var i = 0; i < localStorage.length; i++) {
        var key = localStorage.key(i);
        removeLocalStorage(localStorage.getItem(key));
    }
}
