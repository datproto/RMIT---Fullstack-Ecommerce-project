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