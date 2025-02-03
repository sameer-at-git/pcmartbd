function validateFirstName() {
    var firstName = document.getElementById("fname").value;
    if (firstName.trim() === "") {
        document.getElementById("fnameerr").innerHTML = "First Name is required.";
        return false;
    } else if (firstName.trim().length < 4) {
        document.getElementById("fnameerr").innerHTML = "First name must be at least 2 characters.";
        return false;
    } 
     else {
        document.getElementById("fnameerr").innerHTML = "";
        return true;
    }
}

function validateLastName() {
    var lastName = document.getElementById("lname").value;
    if (lastName.trim() === "") {
        document.getElementById("lnameerr").innerHTML = "Last Name is required.";
        return false;
    } else {
        document.getElementById("lnameerr").innerHTML = "";
        return true;
    }
}

function validatePhone() {
    var phone = document.getElementById("phone").value;
    if (phone.trim() === "") {
        document.getElementById("phoneerr").innerHTML = "Phone number is required.";
        return false;
    } else if (!/^01\d{9}$/.test(phone)) {
        document.getElementById("phoneerr").innerHTML = "Phone number must start with '01' and be 11 digits.";
        return false;
    } else {
        document.getElementById("phoneerr").innerHTML = "";
        return true;
    }
}

function validateDOB() {
    var dob = document.getElementById("dob").value;
    if (!dob) {
        document.getElementById("doberr").innerHTML = "Date of Birth is required.";
        return false;
    } else {
        var dobDate = new Date(dob);
        var today = new Date();
        var age = today.getFullYear() - dobDate.getFullYear();
        if (age < 18) {
            document.getElementById("doberr").innerHTML = "Employee must be at least 18 years old.";
            return false;
        }
        document.getElementById("doberr").innerHTML = "";
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

function validateEmployment() {
    var employment = document.querySelector('input[name="employment"]:checked');
    if (!employment) {
        document.getElementById("employerr").innerHTML = "Please select employment type.";
        return false;
    } else {
        document.getElementById("employerr").innerHTML = "";
        return true;
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    if (!email) {
        document.getElementById("emailerr").innerHTML = "Email is required.";
        return false;
    } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
        document.getElementById("emailerr").innerHTML = "Please enter a valid email address.";
        return false;
    } else {
        document.getElementById("emailerr").innerHTML = "";
        return true;
    }
}

function validatePassword() {
    var pass = document.getElementById("pass").value;
    if (!pass) {
        document.getElementById("passerr").innerHTML = "Password is required.";
        return false;
    } else if (pass.length < 8) {
        document.getElementById("passerr").innerHTML = "Password must be at least 8 characters.";
        return false;
    } else if (!/[A-Z]/.test(pass) || !/[a-z]/.test(pass) || !/[0-9]/.test(pass) || !/[!@#$%^&*]/.test(pass)) {
        document.getElementById("passerr").innerHTML = "Password must contain uppercase, lowercase, number and special character.";
        return false;
    } else {
        document.getElementById("passerr").innerHTML = "";
        return true;
    }
}

function validateConfirmPassword() {
    var pass = document.getElementById("pass").value;
    var confirmPass = document.getElementById("confirmpass").value;
    if (confirmPass !== pass) {
        document.getElementById("conpasserr").innerHTML = "Passwords do not match.";
        return false;
    } else {
        document.getElementById("conpasserr").innerHTML = "";
        return true;
    }
}

function validateForm() {
    var isFirstNameValid = validateFirstName();
    var isLastNameValid = validateLastName();
    var isPhoneValid = validatePhone();
    var isDOBValid = validateDOB();
    var isGenderValid = validateGender();
    var isEmploymentValid = validateEmployment();
    var isEmailValid = validateEmail();
    var isPasswordValid = validatePassword();
    var isConfirmPasswordValid = validateConfirmPassword();

    return (
        isFirstNameValid && 
        isLastNameValid && 
        isPhoneValid && 
        isDOBValid && 
        isGenderValid && 
        isEmploymentValid && 
        isEmailValid && 
        isPasswordValid && 
        isConfirmPasswordValid
    );
}

function confirmationBox() {
    if (confirm("Are you sure you want to clear the form?")) {
        document.getElementById("employeeForm").reset();
        document.getElementById("fnameerr").innerHTML = "";
        document.getElementById("lnameerr").innerHTML = "";
        document.getElementById("phoneerr").innerHTML = "";
        document.getElementById("doberr").innerHTML = "";
        document.getElementById("gendererr").innerHTML = "";
        document.getElementById("employerr").innerHTML = "";
        document.getElementById("emailerr").innerHTML = "";
        document.getElementById("passerr").innerHTML = "";
        document.getElementById("conpasserr").innerHTML = "";
    }
}
