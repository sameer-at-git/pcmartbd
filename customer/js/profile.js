// Selecting all the input fields and error message containers
var nameInput = document.getElementById("name");
var emailInput = document.getElementById("email");
var phoneInput = document.getElementById("phone");
var addressInput = document.getElementById("address");
var passwordInput = document.getElementById("password"); // Corrected this variable name

var nameError = document.getElementById("nameError");
var emailError = document.getElementById("emailError");
var phoneError = document.getElementById("phoneError");
var addressError = document.getElementById("addressError");
var passError = document.getElementById("passError");

// Function to validate the form inputs
function validateProfileForm(event) {
    var isValid = true;

    // Clear previous error messages
    nameError.innerHTML = "";
    emailError.innerHTML = "";
    phoneError.innerHTML = "";
    addressError.innerHTML = "";
    passError.innerHTML = "";

    // Get the values of the inputs
    const nameValue = nameInput.value.trim();
    const emailValue = emailInput.value.trim();
    const phoneValue = phoneInput.value.trim();
    const addressValue = addressInput.value.trim();
    const passwordValue = passwordInput.value.trim(); // Corrected this variable name

    // Regular expressions for email, phone, and password validation
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const phoneRegex = /^[0-9]{11}$/;
    const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|:"<>?])[A-Za-z\d!@#$%^&*()_+{}|:"<>?]{9,}$/;

    // Name validation
    if (nameValue === "") {
        nameError.innerHTML = "Name is required.";
        isValid = false;
    }

    // Email validation
    if (emailValue === "" || !emailRegex.test(emailValue)) {
        emailError.innerHTML = "Please enter a valid email address.";
        isValid = false;
    }

    // Phone validation
    if (phoneValue === "" || !phoneRegex.test(phoneValue)) {
        phoneError.innerHTML = "Please enter a valid Bangladeshi phone number (11 digits).";
        isValid = false;
    }

    // Address validation
    if (addressValue === "") {
        addressError.innerHTML = "Address is required.";
        isValid = false;
    }

    // Password validation
    if (passwordValue === "") {
        passError.innerHTML = "Password is required.";
        isValid = false;
    } else if (!passwordRegex.test(passwordValue)) {
        passError.innerHTML = "Password must contain at least one uppercase letter, one special character, and be at least 9 characters long.";
        isValid = false;
    }

    // If any validation fails, prevent form submission
    if (!isValid) {
        event.preventDefault();
    }
}
