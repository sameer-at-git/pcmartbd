function validateName(adminId) {
    var name = document.getElementById("admin_name_" + adminId).value;
    var error = document.getElementById("nameerr_" + adminId);
    
    if (name.trim() === "" || name.length < 4) {
        error.innerHTML = "Name must be at least 4 characters long";
    } else {
        error.innerHTML = "";
    }
}

function validatePhone(adminId) {
    var phone = document.getElementById("admin_phone_" + adminId).value;
    var error = document.getElementById("phoneerr_" + adminId);
    
    if (phone.trim() === "" || phone.length < 11 || isNaN(phone)) {
        error.innerHTML = "Enter valid 11-digit phone number";
    } else {
        error.innerHTML = "";
    }
}

function validateAccess(adminId) {
    var access = document.getElementById("admin_access_" + adminId).value;
    var error = document.getElementById("accesserr_" + adminId);
    
    if (access === "") {
        error.innerHTML = "Please select access level";
    } else {
        error.innerHTML = "";
    }
} 