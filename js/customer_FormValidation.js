function customer_validateForm(username, password, name, address){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    if(username == "") {
        alert("Username is compulsory");
        return false;
    }

    if (username.match(/^[A-Za-z0-9]+$/) == null){
        alert("Invalid username");
        return false;
    }

    if (username.length < 8 ){
        alert("Username is too short")
        return false
    }

    if (username.length >15) {
        alert("Username is too long")
        return false
    }

    if(password == "") {
        alert("Password is compulsory");
        return false;
    }

    if (password.length >20) {
        alert("Password is too long")
        return false;
    }

    if (password.length <8) {
        alert("Password is too short")
        return false;
    }

    if (password.match(/[a-z]+/) == null) {
        alert("Password is invalid");
        return false;
    } else if (password.match(/[A-Z]+/) == null) {
        alert("Password is invalid");
        return false;
    } else if (password.match(/[0-9]+/) == null) {
        alert("Password is invalid");
        return false;
    } else if (password.match(/[!@#$%\^&*]+/) == null) {
        alert("Password is invalid");
        return false;
    }
    
    if (name.length <5) {
        alert("name is too short")
        return false;
    }
     
    if (address.length <5) {
        alert("Address is too short")
        return false;
    }

}

