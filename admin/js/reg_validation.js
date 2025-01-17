// Function to validate Full Name
function validateFullName() {
    var fullName = document.getElementById("uname").value;
    if (fullName.trim() === "") {
        document.getElementById("nameerr").innerHTML = "Full Name is required.";
        return false;
    } else {
        document.getElementById("nameerr").innerHTML = "";
        return true;
    }
}

// Function to validate Gender
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

// Function to validate Phone Number
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

// Function to validate Permissions
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

// Function to validate Email
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

// Function to validate Password
function validatePassword() {
    var pass = document.getElementById("pass").value;
    if (pass.length < 8) {
        document.getElementById("passerr").innerHTML = "Password must be at least 6 characters long.";
        return false;
    } else {
        document.getElementById("passerr").innerHTML = "";
        return true;
    }
}

// Function to validate Confirm Password
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

// Function to validate the entire form
function validateForm() {
    var isFullNameValid = validateFullName();
    var isGenderValid = validateGender();
    var isPhoneValid = validatePhone();
    var isPermissionsValid = validatePermissions();
    var isEmailValid = validateEmail();
    var isPasswordValid = validatePassword();
    var isConfirmPasswordValid = validateConfirmPassword();

    // Aggregate validation results
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

// Function to navigate to the home page (placeholder for actual implementation)
function goToHomePage() {
    window.location.href = "../admin_home.php";
}

// Function to show a confirmation box for clearing the form
function confirmationBox() {
    if (confirm("Are you sure you want to clear the form?")) {
        document.getElementById("adminForm").reset(); // Reset the form only if the user confirms
    }
}


