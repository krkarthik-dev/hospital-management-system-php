function ValidateEmail() {
    var email = document.getElementById("email").value;
    var lblError = document.getElementById("emailmsg");
    lblError.innerHTML = "";
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email)) {
        lblError.innerHTML = "Invalid email address.";
    }
}
function ValidatePh() {
    var email = document.getElementById("phno").value;
    var lblError = document.getElementById("phmsg");
    lblError.innerHTML = "";
    var expr = /^\d{10}$/;
    if (!expr.test(email)) {
        lblError.innerHTML = "Invalid Phone number";
    }
}
function ValidatePswd() {
    var email = document.getElementById("pswd1").value;
    var lblError = document.getElementById("pswdmsg");
    lblError.innerHTML = "";
    var expr = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,14}$/;
    if (!expr.test(email)) {
        lblError.innerHTML = "Poor Password";
    }
}
function ConfirmPswd() {
    var ps1 = document.getElementById("pswd1").value;
    var ps2 = document.getElementById("pswd2").value;
    var lblError = document.getElementById("cpmsg");
    lblError.innerHTML = "";
    if (ps1!=ps2) {
        lblError.innerHTML = "**Passwords did not match";
    }
}