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

function validateEmployeeName(empId, type) {
    var name = document.getElementById("emp_" + type + "_name_" + empId).value;
    var error = document.getElementById(type + "nameerr_" + empId);
    
    if (name.trim() === "") {
        error.innerHTML = "Name is required";
    } else if (name.trim().length < 4) {
        error.innerHTML = "Name must be at least 4 characters";
    } else {
        error.innerHTML = "";
    }
}

function validateEmployeePhone(empId) {
    var phone = document.getElementById("emp_phone_" + empId).value;
    var error = document.getElementById("phoneerr_" + empId);
    
    if (phone.trim() === "") {
        error.innerHTML = "Phone number is required";
    } else if (!/^01\d{9}$/.test(phone)) {
        error.innerHTML = "Enter valid 11-digit phone number";
    } else {
        error.innerHTML = "";
    }
}

function validateEmployeeDOB(empId) {
    var dob = document.getElementById("emp_dob_" + empId).value;
    var error = document.getElementById("doberr_" + empId);
    
    if (!dob) {
        error.innerHTML = "Date of Birth is required";
    } else {
        var dobDate = new Date(dob);
        var today = new Date();
        var age = today.getFullYear() - dobDate.getFullYear();
        
        if (age < 18) {
            error.innerHTML = "Employee must be at least 18 years old";
        } else {
            error.innerHTML = "";
        }
    }
}

function validateEmployeeGender(empId) {
    var gender = document.getElementById("emp_gender_" + empId).value;
    var error = document.getElementById("gendererr_" + empId);
    
    if (!gender) {
        error.innerHTML = "Please select a gender";
    } else {
        error.innerHTML = "";
    }
}

function validateEmployeeAddress(empId) {
    var address = document.getElementById("emp_address_" + empId).value;
    var error = document.getElementById("addresserr_" + empId);
    
    if (address.trim() === "") {
        error.innerHTML = "Address is required";
    } else if (address.trim().length < 10) {
        error.innerHTML = "Please enter complete address";
    } else {
        error.innerHTML = "";
    }
}

function validateEmployeeType(empId) {
    var empType = document.getElementById("emp_type_" + empId).value;
    var error = document.getElementById("employerr_" + empId);
    
    if (!empType) {
        error.innerHTML = "Please select employment type";
    } else {
        error.innerHTML = "";
    }
} 