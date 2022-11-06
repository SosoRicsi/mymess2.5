function main() {
    var username = document.forms['logform']['username'];
    var password = document.forms['logform']['password'];
    if(username.value == "" && password.value == "") {
        username.style.boxShadow = "0px 0px 5px red";
        password.style.boxShadow = "0px 0px 5px red";
        password.style.color = "red";
        username.style.color = "red";
        username.focus();
        return false;
    }else if(username.value == ""){
        username.style.boxShadow = "0px 0px 5px red";
        username.style.color = "red";
        username.focus();
        return false;
    }else if(password.value == ""){
        password.style.boxShadow = "0px 0px 5px red";
        password.style.color = "red";
        password.focus();
        return false;
    }
}