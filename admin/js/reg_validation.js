function validateForm() {
    var isValid = true;
    
    // Full Name validation
    var fullname = document.getElementById("uname").value;
    var nameerr = document.getElementById("nameerr");
    if (fullname.trim() === "") {
        nameerr.innerHTML = "Name cannot be empty";
        nameerr.style.color = "red";
        isValid = false;
    } else if (fullname.length < 3) {
        nameerr.innerHTML = "Name must be at least 3 characters";
        nameerr.style.color = "red";
        isValid = false;
    } else {
        nameerr.innerHTML = "";
    }

    // Gender validation
    var gender = document.querySelector('input[name="gender"]:checked');
    var gendererr = document.getElementById("gendererr");
    if (!gender) {
        gendererr.innerHTML = "Please select a gender";
        gendererr.style.color = "red";
        isValid = false;
    } else {
        gendererr.innerHTML = "";
    }

    // Phone number validation
    var phone = document.getElementById("phone").value;
    var phoneerr = document.getElementById("phoneerr");
    var phoneRegex = /^\d{10,11}$/;
    if (!phone) {
        phoneerr.innerHTML = "Phone number cannot be empty";
        phoneerr.style.color = "red";
        isValid = false;
    } else if (!phoneRegex.test(phone)) {
        phoneerr.innerHTML = "Please enter a valid phone number (10-11 digits)";
        phoneerr.style.color = "red";
        isValid = false;
    } else {
        phoneerr.innerHTML = "";
    }

    // Email validation
    var email = document.getElementById("email").value;
    var emailerr = document.getElementById("emailerr");
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        emailerr.innerHTML = "Email cannot be empty";
        emailerr.style.color = "red";
        isValid = false;
    } else if (!emailRegex.test(email)) {
        emailerr.innerHTML = "Please enter a valid email address";
        emailerr.style.color = "red";
        isValid = false;
    } else if (!email.endsWith("aiub.edu")) {
        emailerr.innerHTML = "Email must be from aiub.edu domain";
        emailerr.style.color = "red";
        isValid = false;
    } else {
        emailerr.innerHTML = "";
    }

    // Password validation
    var pass = document.getElementById("pass").value;
    var passerr = document.getElementById("passerr");
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!pass) {
        passerr.innerHTML = "Password cannot be empty";
        passerr.style.color = "red";
        isValid = false;
    } else if (!passwordRegex.test(pass)) {
        passerr.innerHTML = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character";
        passerr.style.color = "red";
        isValid = false;
    } else {
        passerr.innerHTML = "";
    }

    // Confirm password validation
    var conpass = document.getElementById("conpass").value;
    var conpasserr = document.getElementById("conpasserr");
    if (!conpass) {
        conpasserr.innerHTML = "Please confirm your password";
        conpasserr.style.color = "red";
        isValid = false;
    } else if (conpass !== pass) {
        conpasserr.innerHTML = "Passwords do not match";
        conpasserr.style.color = "red";
        isValid = false;
    } else {
        conpasserr.innerHTML = "";
    }

    // Permission validation
    var permit = document.getElementById("permit").value;
    var permiterr = document.getElementById("permiterr");
    if (permit === "0") {
        permiterr.innerHTML = "Please select a permission level";
        permiterr.style.color = "red";
        isValid = false;
    } else {
        permiterr.innerHTML = "";
    }

    // Date validations
    var dob = document.getElementById("dob").value;
    var doj = document.getElementById("doj").value;
    
    if (!dob) {
        document.getElementById("dob").style.borderColor = "red";
        isValid = false;
    } else {
        document.getElementById("dob").style.borderColor = "";
    }

    if (!doj) {
        document.getElementById("doj").style.borderColor = "red";
        isValid = false;
    } else {
        document.getElementById("doj").style.borderColor = "";
    }

    // File validations
    var nid = document.getElementById("nid").value;
    var pic = document.getElementById("pic").value;
    
    if (!nid) {
        document.getElementById("nid").style.borderColor = "red";
        isValid = false;
    } else {
        document.getElementById("nid").style.borderColor = "";
    }

    if (!pic) {
        document.getElementById("pic").style.borderColor = "red";
        isValid = false;
    } else {
        document.getElementById("pic").style.borderColor = "";
    }

    // Address validations
    var preadd = document.getElementById("preadd").value;
    var peradd = document.getElementById("peradd").value;
    
    if (!preadd.trim()) {
        document.getElementById("preadd").style.borderColor = "red";
        isValid = false;
    } else {
        document.getElementById("preadd").style.borderColor = "";
    }

    if (!peradd.trim()) {
        document.getElementById("peradd").style.borderColor = "red";
        isValid = false;
    } else {
        document.getElementById("peradd").style.borderColor = "";
    }

    return isValid;
}

// Add onchange handlers to form elements
function addValidationHandlers() {
    var inputs = document.getElementsByTagName('input');
    var selects = document.getElementsByTagName('select');
    var textareas = document.getElementsByTagName('textarea');
    
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].onchange = function() {
            validateForm();
        };
    }
    
    for (var i = 0; i < selects.length; i++) {
        selects[i].onchange = function() {
            validateForm();
        };
    }
    
    for (var i = 0; i < textareas.length; i++) {
        textareas[i].onchange = function() {
            validateForm();
        };
    }
}

// Call the function when window loads
window.onload = addValidationHandlers;