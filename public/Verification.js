var mail = document.getElementById("emailLogin");
var password = document.getElementById("passwordLogin");
var passwordError = document.getElementById("passwordError");
var MailError = document.getElementById("MailError");
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