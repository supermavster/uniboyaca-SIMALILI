function initSignIn() {
var formData = new FormData(document.getElementById("acceso"));
$.ajax({
url: "<?php echo URLWEB_FULL . 'signin'; ?>",
type: "POST",
dataType: "HTML",
data: formData,
cache: false,
contentType: false,
processData: false
}).done(function(echo) {
if (echo !== "") {
var n = echo.search("Complete");
if (n > -1) {
icon = 'shield-check';
color = 'success';
title = 'Complete';
message = 'Login in 1 second';
setTimeout(function() {
location.reload();
}, 2000);
} else {
icon = 'exclamation-triangle';
color = 'warning';
title = 'Error!';
message = echo;
}
//Show Notification
notifycations(title, message, color, icon);
//Show Exception
var objEr = "#";
if (echo == "<?php echo LANGUAGE['LOGIN-ERRO-2']; ?>") {
objEr += "userAcceso";
} else if (echo == "<?php echo LANGUAGE['LOGIN-ERRO-3']; ?>") {
objEr += "passAcceso";
}
if (objEr != "#") {
var element = $(objEr).parent().parent();
element.addClass("has-danger");
$(objEr).focus().select();
}
}
});
}

function initSignUp() {
var formData = new FormData(document.getElementById("registro"));
$.ajax({
url: "<?php echo URLWEB_FULL . 'signup'; ?>",
type: "POST",
dataType: "HTML",
data: formData,
cache: false,
contentType: false,
processData: false
}).done(function(echo) {
if (echo !== "") {
var n = echo.search("Complete");
if (n > -1) {
icon = 'shield-check';
color = 'success';
title = 'Complete';
message = 'Check your Email';
setTimeout(function() {
window.location.href = window.location.origin;
}, 2000);
} else {
icon = 'exclamation-triangle';
color = 'warning';
title = 'Error!';
message = echo;
}
//Show Notification
notifycations(title, message, color, icon);
//Show Exception
var objEr = "#";
if (echo == "<?php echo LANGUAGE['SIGNUP-ERRO-2']; ?>") {
objEr += "email_address";
} else if (echo == "<?php echo LANGUAGE['SIGNUP-ERRO-3']; ?>") {
objEr += "userRegistro";
} else if (echo == "<?php echo LANGUAGE['SIGNUP-ERRO-4']; ?>") {
objEr += "passRegistro";
$(objEr).text("");
$("#repeat_password").text("");
}
if (objEr != "#") {
var element = $(objEr).parent().parent();
element.addClass("has-danger");
}
}
});
}

function initForgetPassword() {
var formData = new FormData(document.getElementById("restore-pwd-form"));
$.ajax({
url: "<?php echo URLWEB_FULL . 'forgetPassword'; ?>",
type: "POST",
dataType: "HTML",
data: formData,
cache: false,
contentType: false,
processData: false
}).done(function(echo) {
;
if (echo !== "") {
var n = echo.search("Complete");
if (n > -1) {
icon = 'shield-check';
color = 'success';
title = 'Complete';
message = 'Reload 1 second';
setTimeout(function() {
location.reload();
}, 2000);
} else {
icon = 'exclamation-triangle';
color = 'warning';
title = 'Error!';
message = echo;
}
//Show Notification
notifycations(title, message, color, icon);
//Show Exception
var objEr = "#";
if (echo == "<?php echo LANGUAGE['FORGET-ERRO-1']; ?>") {
objEr += "FP_email_address";
}
if (objEr != "#") {
var element = $(objEr).parent().parent();
element.addClass("has-danger");
}
}
});
}

//Method Base - Notification
function notifycations(title, message, color, icon) {
$.notify({
icon: "far fa-" + icon,
title: title,
message: message,
}, {
type: color,
timer: 1000,
placement: {
from: 'top',
align: 'right'
},
z_index: 1050,
});
}