function validateSubject() {
    var subject = document.getElementById("subject").value.trim();
    var errorElement = document.getElementById("subjecterr");

    if (subject === "") {
        errorElement.innerHTML = "Subject is required.";
        return false;
    } else if (subject.length > 40) {
        errorElement.innerHTML = "Subject must not exceed 40 words.";
        return false;
    }else {
        errorElement.innerHTML = "";
        return true;
    }
}

function validateMessage() {
    var messageInput = document.getElementById("message").value;
    var errorElement = document.getElementById("messageerr");


    if (messageInput === "") {
        errorElement.innerHTML = "Message can not be empty.";
        return false;
    } else if (messageInput.length > 100) {
        errorElement.innerHTML = "Message must not exceed 100 words.";
        return false;
    } else {
        errorElement.innerHTML = "";
        return true;
    }
}

function validateForm() {
    var isSubjectValid = validateSubject();
    var isMessageValid = validateMessage();

    return isSubjectValid && isMessageValid;
}