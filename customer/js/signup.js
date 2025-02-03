// Selecting all the input fields and error message containers
var nameInput = document.getElementById("name");
var phoneInput = document.getElementById("phone");
var addressInput = document.getElementById("address");
var emailInput = document.getElementById("email"); 
var passwordInput = document.getElementById("password"); 
var conpasswordInput = document.getElementById("conpassword"); 

var nameError = document.getElementById("nameError");
var phoneError = document.getElementById("phoneError");
var addressError = document.getElementById("addressError");
var emailError = document.getElementById("emailError");
var passwordError = document.getElementById("passwordError");
var conpasswordError = document.getElementById("conpasswordError");

// Function to validate the form inputs
function validatesignUpForm() {

    // Clear previous error messages
    nameError.innerHTML = "";
    phoneError.innerHTML = "";
    addressError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    conpasswordError.innerHTML = "";

    // Get the values of the inputs
    const nameValue = nameInput.value.trim();
    const phoneValue = phoneInput.value.trim();
    const addressValue = addressInput.value.trim();
    const emailValue = emailInput.value.trim(); 
    const passwordValue = passwordInput.value.trim(); 
    const conpasswordValue = conpasswordInput.value.trim(); 

    // Regular expressions for validation
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const phoneRegex = /^\d{11}$/; // Assumes a 11-digit phone number
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Name validation
    if (nameValue === "") {
        nameError.innerHTML = "Name is required.";
        return  false;
    } else if (!/^[a-zA-Z\s]+$/.test(nameValue)) {
        nameError.innerHTML = "Name can only contain letters and spaces.";
        return false;
    }

    if (phoneValue === "") {
        phoneError.innerHTML = "Phone number is required.";
        return false;
    } else if (!phoneRegex.test(phoneValue)) {
        phoneError.innerHTML = "Phone number must be exactly 11 digits.";
        return false;
    }

    if (addressValue === "") {
        addressError.innerHTML = "Address is required.";
        return  false;
    }

    // Email validation
    if (emailValue === "") {
        emailError.innerHTML = "Email is required.";
        return false;
    } else if (!emailRegex.test(emailValue)) {
        emailError.innerHTML = "Please enter a valid email address.";
        return false;
    }

    // Password validation
    if (passwordValue === "") {
        passwordError.innerHTML = "Password is required.";
        return false;
    } else if (!passwordRegex.test(passwordValue)) {
        passwordError.innerHTML = "Password must be at least 8 characters long, include a number and a special character.";
        return false;
    }

    // Confirm Password validation
    if (conpasswordValue === "") {
        conpasswordError.innerHTML = "Confirm password is required.";
        return false;
    } else if (conpasswordValue !== passwordValue) {
        conpasswordError.innerHTML = "Passwords do not match.";
        return false;
    }

}

// Attach the function to the form's submit event

