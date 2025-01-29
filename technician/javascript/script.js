
function validateWorkArea() {
    var workarea = document.getElementById("workarea").value;
    if (workarea == "") {
        document.getElementById("workareaerr").innerHTML = "Select work area";
        return false;
    } else {
        document.getElementById("workareaerr").innerHTML = "";
        return true;
    }
}

function validateExperience() {
    var workarea = document.getElementById("experience").value;
    if (workarea == "") {
        document.getElementById("experienceerr").innerHTML = "Please fill in the Experience";
        return false;
    } else {
        document.getElementById("experienceerr").innerHTML = "";
        return true;
    }
}

function validateEmail(){
    var email = document.getElementById("email").value;
    if (email == "") {
        document.getElementById("emailerr").innerHTML = "Please fill in the Email";
        return false;
    } else {
        document.getElementById("emailerr").innerHTML = "";
        return true;
    }
}




function validateForm() {
    var isWorkareaValid = validateWorkArea();
    var isExperienceValid = validateExperience();
    var isEmailValid = validateEmail();

    if (
        isWorkareaValid &&
        isExperienceValid &&
        isEmailValid
    ) {
        return true;
    } else {
        return false;
    }
}



