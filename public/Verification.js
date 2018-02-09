// Verification du login
var mail = document.getElementById("emailLogin");
var password = document.getElementById("passwordLogin");
var passwordError = document.getElementById("passwordError");
var mailError = document.getElementById("mailError");
var testPassword = /^[a-zA-Z0-9-. _\/]{8,20}$/;
var testMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,}$/;

var mailLoginOk = false;
var passwordLoginOk = false;

var signInButt = document.getElementById("buttonLogin");

password.addEventListener("keyup", function(){
    if (!testPassword.test(password.value)) {
        passwordError.hidden = false;
        passwordLoginOk = false;
    } else {
        passwordError.hidden = true;
        passwordLoginOk = true;
    }
    loginIsOk();
});

password.addEventListener("load", function(){
    if (!testPassword.test(password.value)) {
        passwordError.hidden = false;
        passwordLoginOk = false;
    } else {
        passwordError.hidden = true;
        passwordLoginOk = true;
    }
    loginIsOk();
});

mail.addEventListener("keyup", function() {
    if(!testMail.test(mail.value)) {
        mailError.hidden = false;
        mailLoginOk = false;
    } else {
        mailError.hidden = true;
        mailLoginOk = true;
    }
    loginIsOk();
}, false);

function loginIsOk() {
    if(mailLoginOk && passwordLoginOk) {
        signInButt.disabled = false;
    } else {
        signInButt.disabled = true;
    }
}
// Verification du register

var regMail = document.getElementById("emailRegister")
var regMailError = document.getElementById("regMailError");
var regPassword = document.getElementById("passwordRegister");
var regPasswordError = document.getElementById("regPasswordError");

var testMailRegister = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,}$/;
var testPasswordRegister = /^[a-zA-Z0-9-. _\/]{8,20}$/;
var mailOk = false;
var mailConfirmOk = false;
var passwordOk = false;
var passwordConfirmOk = false;
var firstnameOk = false;
var lastnameOk = false;

var confirmMail = document.getElementById("confEmail");
var confirmPassword = document.getElementById("confPassword");

var firstName = document.getElementById("firstname");
var firstNameError = document.getElementById("firstnameError");
var lastName = document.getElementById("lastname");
var lastNameError = document.getElementById("lastnameError");

var testFirstName = /^[a-zA-Z]{2,}$/;
var testLastName = /^[a-zA-Z]{2,}$/;

var signupButt = document.getElementById("signupButton");

firstName.addEventListener("keyup", function () {
    if(!testFirstName.test(firstName.value)) {
        firstNameError.hidden = false;
        firstnameOk = false;
    } else {
        firstNameError.hidden = true;
        firstnameOk = true;
    }
    isOk();
});
lastName.addEventListener("keyup", function () {
    if(!testLastName.test(lastName.value)) {
        lastNameError.hidden = false;
        lastnameOk = false;
    } else {
        lastNameError.hidden = true;
        lastnameOk = true;
    }
    isOk();
});

regMail.addEventListener("keyup", function() {
    if(!testMailRegister.test(regMail.value)) {
        regMailError.hidden = false;
        mailOk = false;
    } else {
        regMailError.hidden = true;
        mailOk = true;
    }
    if (confirmMail.value === regMail.value){
        mailConfirmOk = true;
    } else {
        mailConfirmOk = false;
    }
    isOk();
}, false);

confirmMail.addEventListener("keyup", function () {
    if(confirmMail.value === regMail.value ) {
        mailConfirmOk = true;
    } else {
        mailConfirmOk = false;
    }
    isOk();
});

regPassword.addEventListener("keyup", function () {
    if (!testPasswordRegister.test(regPassword.value)) {
        regPasswordError.hidden = false;
        passwordOk = false;
    } else {
        regPasswordError.hidden = true;
        passwordOk = true;
    }
    if(confirmPassword.value === regPassword.value) {
        passwordConfirmOk = true;
    } else {
        passwordConfirmOk = false;
    }
    isOk();
}, false);

confirmPassword.addEventListener("keyup", function(){
    if(confirmPassword.value === regPassword.value) {
        passwordConfirmOk = true;
    } else {
        passwordConfirmOk = false;
    }
    isOk();
} );

function isOk() {
    if (mailOk && mailConfirmOk && passwordOk && passwordConfirmOk && firstnameOk && lastnameOk) {
        signupButt.disabled = false;
    } else {
        signupButt.disabled = true;
    }
}




