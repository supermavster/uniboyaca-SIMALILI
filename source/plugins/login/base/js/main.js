//Login Method
$("#acceso").on("submit", function (e) {
    e.preventDefault();
    initSignIn();
});
//Signup Method
$("#registro").on("submit", function (e) {
    e.preventDefault();
    initSignUp();
});

//Password Method
$("#forgetPassword").on("submit", function (e) {
    e.preventDefault();
    initForgetPassword();
});

