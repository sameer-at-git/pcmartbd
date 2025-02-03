// Selecting all the input fields and error message containers
var nameInput = document.getElementById("name");
var emailInput = document.getElementById("email");
var addressInput = document.getElementById("address");
var cardTypeInput = document.getElementById("card_type"); 

var nameError = document.getElementById("nameError");
var emailError = document.getElementById("emailError");
var addressError = document.getElementById("addressError");
var cardTypeError = document.getElementById("cardTypeError");

// Function to validate the form inputs
function validatePaymentForm(event) {
    var isValid = true;

    // Clear previous error messages
    nameError.innerHTML = "";
    emailError.innerHTML = "";
    addressError.innerHTML = "";
    cardTypeError.innerHTML = "";

    // Get the values of the inputs
    const nameValue = nameInput.value.trim();
    const emailValue = emailInput.value.trim();
    const addressValue = addressInput.value.trim();
    const cardTypeValue = cardTypeInput.value.trim(); 

    // Regular expressions for email, phone, and password validation
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

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


    // Address validation
    if (addressValue === "") {
        addressError.innerHTML = "Address is required.";
        isValid = false;
    }

    // Password validation
    if (cardTypeValue === "..." || cardTypeValue==="") {
        cardTypeError.innerHTML = "Please choose Cart Type.";
        isValid = false;
    } 
    // If any validation fails, prevent form submission
    if (!isValid) {
        event.preventDefault();
    }
}
