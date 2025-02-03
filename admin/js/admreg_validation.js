var passwordAttempts = 0;
var emailMessage = "(Input valid email that ends with aiub.edu)";

function showEmailMessage() {
    document.getElementById('emailMessage').innerHTML ="<h6>" + emailMessage + "</h6>";
}

function hideEmailMessage() {
    document.getElementById('emailMessage').innerHTML = "";
}


function validateFullName() {
    var fullName = document.getElementById("uname").value;
    if (fullName.trim() === "") {
        document.getElementById("nameerr").innerHTML = "Full Name is required.";
        return false;
    } else if (fullName.trim().length < 4) {
        document.getElementById("nameerr").innerHTML = "Full name must be more than 4 characters.";
        return false;
    } else {
        document.getElementById("nameerr").innerHTML = "";
        return true;
    }
}


function validateGender() {
    var gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("gendererr").innerHTML = "Please select a gender.";
        return false;
    } else {
        document.getElementById("gendererr").innerHTML = "";
        return true;
    }
}


function validatePhone() {
    var phone = document.getElementById("phone").value;
    if (phone.trim() === "" || phone.length < 11 || isNaN(phone)) {
        document.getElementById("phoneerr").innerHTML = "Enter a valid phone number.";
        return false;
    } else {
        document.getElementById("phoneerr").innerHTML = "";
        return true;
    }
}

function validatePermissions() {
    var permission = document.getElementById("permit").value;
    if (permission === "0") {
        document.getElementById("permiterr").innerHTML = "Please select a permission.";
        return false;
    } else {
        document.getElementById("permiterr").innerHTML = "";
        return true;
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        document.getElementById("emailerr").innerHTML = "Enter a valid email address.";
        return false;
    } else {
        document.getElementById("emailerr").innerHTML = "";
        return true;
    }
}

function validatePassword() {
    var pass = document.getElementById("pass").value;
    var hasUpperCase = /[A-Z]/.test(pass);
    var hasLowerCase = /[a-z]/.test(pass);
    var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(pass);
    
    if (pass.length < 8) {
        document.getElementById("passerr").innerHTML = "Password must be at least 8 characters long.";
        return false;
    } else if (!hasUpperCase) {
        document.getElementById("passerr").innerHTML = "Password must include at least one capital letter.";
        return false;
    } else if (!hasLowerCase) {
        document.getElementById("passerr").innerHTML = "Password must include at least one small letter.";
        return false;
    } else if (!hasSpecialChar) {
        document.getElementById("passerr").innerHTML = "Password must include at least one special character (!@#$%^&*(),.?\":{}|<>).";
        return false;
    } else {
        document.getElementById("passerr").innerHTML = "";
        return true;
    }
}

function validateConfirmPassword() {
    var pass = document.getElementById("pass").value;
    var confirmPass = document.getElementById("conpass").value;
    if (confirmPass !== pass) {
        document.getElementById("conpasserr").innerHTML = "Passwords do not match.";
        return false;
    } else {
        document.getElementById("conpasserr").innerHTML = "";
        return true;
    }
}

function validateForm() {
    var isFullNameValid = validateFullName();
    var isGenderValid = validateGender();
    var isPhoneValid = validatePhone();
    var isPermissionsValid = validatePermissions();
    var isEmailValid = validateEmail();
    var isPasswordValid = validatePassword();
    var isConfirmPasswordValid = validateConfirmPassword();

    if (
        isFullNameValid &&
        isGenderValid &&
        isPhoneValid &&
        isPermissionsValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid
    ) {
        return true;
    } else {
        return false;
    }
}

function confirmationBox() {
    if (confirm("Are you sure you want to clear the form?")) {
        document.getElementById("adminForm").reset();
        document.getElementById("emailerr").innerHTML = "";
        document.getElementById("passerr").innerHTML = "";
        document.getElementById("conpasserr").innerHTML = "";
        document.getElementById("permiterr").innerHTML = "";
        document.getElementById("phoneerr").innerHTML = "";
        document.getElementById("gendererr").innerHTML = "";
        document.getElementById("nameerr").innerHTML = ""; 
        document.getElementById("email").value = "";
        document.getElementById("pass").value = "";
        document.getElementById("conpass").value = "";
        document.getElementById("permit").value = "0";
        document.getElementById("phone").value = "";
        document.getElementById("uname").value = "";
        document.getElementById("bio").value = "";
        document.getElementById("dob").value = "";
        document.getElementById("doj").value = "";
    }
}
