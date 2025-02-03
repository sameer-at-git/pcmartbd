function validateFname() {
    var fname = document.getElementById("fname").value;
    if (fname.trim() === "") {
        document.getElementById("fname-err").innerHTML = "First name is required";
        return false;
    }
    else {
        document.getElementById("fname-err").innerHTML = "";
        return true;
    }
}

function validateLname() {
    var lname = document.getElementById("lname").value;
    if (lname.trim() === "") {
        document.getElementById("lname-err").innerHTML = "Last name is required";
        return false;
    }
    else {
        document.getElementById("lname-err").innerHTML = "";
        return true;
    }
}

function validatePhone() {
    var phone = document.getElementById("phone").value;
    if (phone.trim() === "") {
        document.getElementById("phone-err").innerHTML = "Phone number is required";
        return false;
    }
    else {
        document.getElementById("phone-err").innerHTML = "";
        return true;
    }
}

function validateDob() {
    var dob = document.getElementById("dob").value;
    if (dob.trim() === "") {
        document.getElementById("dob-err").innerHTML = "Date of birth is required";
        return false;
    }
    else {
        document.getElementById("dob-err").innerHTML = "";
        return true;
    }
}

function validatePreAdd() {
    var pre_add = document.getElementById("pre_add").value;
    if (pre_add.trim() === "") {
        document.getElementById("pre_add-err").innerHTML = "Present address is required";
        return false;
    }
    else {
        document.getElementById("pre_add-err").innerHTML = "";
        return true;
    }
}

function validatePerAdd() {
    var per_add = document.getElementById("per_add").value;
    if (per_add.trim() === "") {
        document.getElementById("per_add-err").innerHTML = "Permanent address is required";
        return false;
    }
    else {
        document.getElementById("per_add-err").innerHTML = "";
        return true;
    }
}

function validatePassword() {
    var password = document.getElementById("password").value;
    if (password.trim() === "") {
        document.getElementById("password-err").innerHTML = "Password is required";
        return false;
    } 
    else if (password.length < 6) {
        document.getElementById("password-err").innerHTML = "Password must be at least 6 characters long";
        return false;
    }
    else if (!/[A-Z]/.test(password)) {
        document.getElementById("password-err").innerHTML = "Password must contain at least one uppercase letter";
        return false;
    }
    else if (!/[a-z]/.test(password)) {
        document.getElementById("password-err").innerHTML = "Password must contain at least one lowercase letter";
        return false;
    }
    else if (!/[0-9]/.test(password)) {
        document.getElementById("password-err").innerHTML = "Password must contain at least one number";
        return false;
    }
    else {
        document.getElementById("password-err").innerHTML = "";
        return true;
    }
}

function validateCpassword() {
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    if (cpassword.trim() === "") {
        document.getElementById("cpassword-err").innerHTML = "Confirm password is required";
        return false;
    }
    else if (password !== cpassword) {
        document.getElementById("cpassword-err").innerHTML = "Passwords do not match";
        return false;
    }
    else {
        document.getElementById("cpassword-err").innerHTML = "";
        return true;
    }
}

function validateForm() {
    var isFnameValid = validateFname();
    var isLnameValid = validateLname();
    var isPhoneValid = validatePhone();
    var isDobValid = validateDob();
    var isPreAddValid = validatePreAdd();
    var isPerAddValid = validatePerAdd();
    var isPasswordValid = validatePassword();
    var isCpasswordValid = validateCpassword();

    if (isFnameValid && 
        isLnameValid && 
        isPhoneValid && 
        isDobValid && 
        isPreAddValid && 
        isPerAddValid && 
        isPasswordValid && 
        isCpasswordValid) {
        return true;
    }
    else {
        return false;
    }
}
