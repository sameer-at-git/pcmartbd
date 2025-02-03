function validateMessage(appointmentId) {
    var messageInput = document.getElementById("message_" + appointmentId).value;
    var errorElement = document.getElementById("message_error_" + appointmentId);


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
