function validateFirstName() {
    var fname = document.getElementById("fname").value;
    if (fname.trim() === "") {
        document.getElementById("fnameerr").innerHTML = "First name is required.";
        return false;
    } else if (/\d/.test(fname)) {
        document.getElementById("fnameerr").innerHTML = "First name can't contain numbers.";
        return false;
    } else {
        document.getElementById("fnameerr").innerHTML = "";
        return true;
    }
}

function validateLastName() {
    var lname = document.getElementById("lname").value;
    if (lname.trim() === "") {
        document.getElementById("lnameerr").innerHTML = "Last name is required.";
        return false;
    } else if (/\d/.test(lname)) {
        document.getElementById("lnameerr").innerHTML = "Last name can't contain numbers.";
        return false;
    } else {
        document.getElementById("lnameerr").innerHTML = "";
        return true;
    }
}

function validateFathersName() {
    var fathersname = document.getElementById("fathersname").value;
    if (fathersname.trim() === "") {
        document.getElementById("fathersnameerr").innerHTML = "Father's name is required.";
        return false;
    }
    else if (/\d/.test(fathersname)) {
        document.getElementById("fathersnameerr").innerHTML = "Father's name can't contain numbers.";
        return false;
    } else {
        document.getElementById("fathersnameerr").innerHTML = "";
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
            document.getElementById("doberr").innerHTML = "Technician must be at least 18 years old.";
            return false;
        }
        document.getElementById("doberr").innerHTML = "";
        return true;
    }
}

function validateGender() {
    var gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("gendererr").innerHTML = "Gender is required.";
        return false;
    } else {
        document.getElementById("gendererr").innerHTML = "";
        return true;
    }
}



function validatePhone() {
    var phone = document.getElementById("phone").value.trim();
    
    if (phone === "") {
        document.getElementById("phoneerr").innerHTML = "Phone number is required.";
        return false;
    } else if (!/^\d+$/.test(phone)) {
        document.getElementById("phoneerr").innerHTML = "Phone number must contain only digits.";
        return false;
    } else if (phone.length !== 11) {
        document.getElementById("phoneerr").innerHTML = "Phone number must be exactly 11 digits.";
        return false;
    } else {
        document.getElementById("phoneerr").innerHTML = "";
        return true;
    }
}


function validateAddress() {
    var address = document.getElementById("address").value;
    if (address.trim() === "") {
        document.getElementById("addresserr").innerHTML = "Address is required.";
        return false;
    } else {
        document.getElementById("addresserr").innerHTML = "";
        return true;
    }
}

function validateExperience() {
    var experience = document.getElementById("experience").value;
    if (experience === "") {
        document.getElementById("experienceerr").innerHTML = "Please fill in the Experience";
        return false;
    } else {
        document.getElementById("experienceerr").innerHTML = "";
        return true;
    }
}

function validateWorkArea() {
    var workarea = document.getElementById("workarea").value;
    if (workarea.trim() === "") {
        document.getElementById("workareaerr").innerHTML = "Preferred work area must be selected.";
        return false;
    } else {
        document.getElementById("workareaerr").innerHTML = "";
        return true;
    }
}

function validateWorkHours() {
    var workhour = document.getElementById("workhour").value;
    if (workhour.trim() === "") {
        document.getElementById("workhourerr").innerHTML = "Preferred work hours must be selected.";
        return false;
    } else {
        document.getElementById("workhourerr").innerHTML = "";
        return true;
    }
}


function validateEmail() {
    var email = document.getElementById("email").value;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email.trim() === "") {
        document.getElementById("emailerr").innerHTML = "Email can't be empty.";
        return false;
    }
    else if (!emailRegex.test(email)) {
        document.getElementById("emailerr").innerHTML = "Enter a valid email address.";
        return false;
    } 
    else {
        document.getElementById("emailerr").innerHTML = "";
        return true;
    }
}

function validatePassword() {
    var password = document.getElementById("password").value;

    var hasUpperCase = /[A-Z]/.test(password);
    var hasLowerCase = /[a-z]/.test(password);
    var hasNumber = /[0-9]/.test(password);
    var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);

    if (!password.trim()) {
        document.getElementById("passworderr").innerHTML = "New password cannot be empty.";
        return false;
    }
    if (password.length < 8) {
        document.getElementById("passworderr").innerHTML = "Password must be at least 8 characters long.";
        return false;
    }
    if (!hasUpperCase) {
        document.getElementById("passworderr").innerHTML = "Password must include at least one uppercase letter.";
        return false;
    }
    if (!hasLowerCase) {
        document.getElementById("passworderr").innerHTML = "Password must include at least one lowercase letter.";
        return false;
    }
    if (!hasNumber) {
        document.getElementById("passworderr").innerHTML = "Password must include at least one number.";
        return false;
    }
    if (!hasSpecialChar) {
        document.getElementById("passworderr").innerHTML = "Password must include at least one special character (!@#$%^&*(),.?\":{}|<>).";
        return false;
    }

    document.getElementById("passworderr").innerHTML = "";
    return true;
}

function validateConfirmPassword() {
    var password = document.getElementById("password").value;
    var confirmpass = document.getElementById("confirmpass").value;
    if (confirmpass.trim() === "") {
        document.getElementById("confirmpasserr").innerHTML = "Confirm password is required.";
        return false;
    }
    else if (password !== confirmpass) {
        document.getElementById("confirmpasserr").innerHTML = "Passwords do not match.";
        return false;
    } else {
        document.getElementById("confirmpasserr").innerHTML = "";
        return true;
    }
}

function validateForm() {
    var isFirstNameValid = validateFirstName();
    var isLastNameValid = validateLastName();
    var isFathersNameValid = validateFathersName();
    var isGenderValid = validateGender();
    var isDOBValid = validateDOB();
    var isPhoneValid = validatePhone();
    var isAddressValid = validateAddress();
    var isExperienceValid = validateExperience();
    var isWorkAreaValid = validateWorkArea();
    var isWorkHourValid = validateWorkHours();
    var isEmailValid = validateEmail();
    var isPasswordValid = validatePassword();
    var isConfirmPasswordValid = validateConfirmPassword();

    if (
        isFirstNameValid &&
        isLastNameValid &&
        isFathersNameValid &&
        isGenderValid &&
        isDOBValid &&
        isPhoneValid &&
        isAddressValid &&
        isExperienceValid &&
        isWorkAreaValid &&
        isWorkHourValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid
    ) {
        return true;
    } else {
        return false;
    }
}



