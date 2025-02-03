
function togglePassword(icon, targetId) {
    const input = document.getElementById(targetId);

    if (icon.dataset.state === "hidden") {
        input.type = "text";
        icon.src = "../../images/icons/eye.png";
        icon.dataset.state = "visible";
    } else {
        input.type = "password";
        icon.src = "../../images/icons/hidden.png";
        icon.dataset.state = "hidden";
    }
}

function validateCurrentPassword() {
    var currentPassword = document.getElementById("currentPassword").value;
    if (!currentPassword.trim()) {
        document.getElementById("currentpasserr").innerHTML = "Current password cannot be empty.";
        return false;
    } else {
        document.getElementById("currentpasserr").innerHTML = "";
        return true;
    }

}

function validateNewPassword() {
    var newPassword = document.getElementById("newPassword").value;

    var hasUpperCase = /[A-Z]/.test(newPassword);
    var hasLowerCase = /[a-z]/.test(newPassword);
    var hasNumber = /[0-9]/.test(newPassword);
    var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(newPassword);

    if (!newPassword.trim()) {
        document.getElementById("newpasserr").innerHTML = "New password cannot be empty.";
        return false;
    }
    if (newPassword.length < 8) {
        document.getElementById("newpasserr").innerHTML = "Password must be at least 8 characters long.";
        return false;
    }
    if (!hasUpperCase) {
        document.getElementById("newpasserr").innerHTML = "Password must include at least one uppercase letter.";
        return false;
    }
    if (!hasLowerCase) {
        document.getElementById("newpasserr").innerHTML = "Password must include at least one lowercase letter.";
        return false;
    }
    if (!hasNumber) {
        document.getElementById("newpasserr").innerHTML = "Password must include at least one number.";
        return false;
    }
    if (!hasSpecialChar) {
        document.getElementById("newpasserr").innerHTML = "Password must include at least one special character (!@#$%^&*(),.?\":{}|<>).";
        return false;
    }

    document.getElementById("newpasserr").innerHTML = "";
    return true;
}


function validateConfirmPassword() {
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    if (confirmPassword.trim() === "") {
        document.getElementById("conpasserr").innerHTML = "Confirm password is required.";
        return false;
    }
    else if (confirmPassword !== newPassword) {
        document.getElementById("conpasserr").innerHTML = "Passwords do not match.";
        return false;
    } else {
        document.getElementById("conpasserr").innerHTML = "";
        return true;
    }
}

function validateChangePassword() {
    var isCurrentPasswordValid = validateCurrentPassword();
    var isNewPasswordValid = validateNewPassword();
    var isConfirmPasswordValid = validateConfirmPassword();

    if (isCurrentPasswordValid && isNewPasswordValid && isConfirmPasswordValid) {
        return true;
    } else {
        return false;
    }
}