var passwordAttempts = 0;
var emailInput = document.getElementById("email");
var passwordInput = document.getElementById("password");
var emailError = document.getElementById("emailError");
var passwordError = document.getElementById("passwordError");


function validateLoginForm(event) {
    
    var isValid = true;
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    const emailValue = emailInput.value.trim();
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (emailValue === ""|| !emailValue.includes("@") || !emailValue.includes(".")  ||!emailRegex.test(emailValue)    ) {
        emailError.innerHTML = "Please enter valid email address.";
       isValid = false;
    }

    if (passwordInput.value.trim() === "") {
        passwordError.innerHTML = "Please fill in your password.";
        passwordAttempts++;
        if (passwordAttempts >= 4) {
            if (confirm("You have made 4 unsuccessful attempts. Wish to proceed to Forget Password?")) {
                window.location.href = "forget_password.php";
            } else {
                window.location.reload();
            }
        }

        isValid = false;
    }
    
   
    if (!isValid) {
        event.preventDefault();
    }
}

