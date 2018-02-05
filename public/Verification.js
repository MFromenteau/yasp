// Verification du login
var mail = document.getElementById("emailLogin");
var password = document.getElementById("passwordLogin");
var passwordError = document.getElementById("passwordError");
var mailError = document.getElementById("MailError");
var testPassword = /^[a-zA-Z0-9-. _\/]{4,20}$/;

password.addEventListener("keyup", function () {
    if (!testPassword.test(password.value)) {
        passwordError.hidden = false;
    } else {
        passwordError.hidden = true;
    }
}, false);

var testMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,}$/;

mail.addEventListener("keyup", function() {
    if(!testMail.test(mail.value)) {
        mailError.hidden = false;
    } else {
        mailError.hidden = true;
    }
}, false);

// Verification du register

var regMail = document.getElementById("emailRegister")
var regMailError = document.getElementById("regMailError");
var regPassword = document.getElementById("passwordRegister");
var regPasswordError = document.getElementById("regPasswordError");

var testMailRegister = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,}$/;

regMail.addEventListener("keyup", function() {
    if(!testMailRegister.test(regMail.value)) {
        regMailError.hidden = false;
    } else {
        regMailError.hidden = true;
    }
}, false);

var testPasswordRegister = /^[a-zA-Z0-9-. _\/]{4,20}$/;
regPassword.addEventListener("keyup", function () {
    if (!testPasswordRegister.test(regPassword.value)) {
        regPasswordError.hidden = false;
    } else {
        regPasswordError.hidden = true;
    }
}, false);

