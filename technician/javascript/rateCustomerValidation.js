function validateComment(appointmentId) {
    var commentInput = document.getElementById("comment_" + appointmentId).value;
    var errorElement = document.getElementById("comment_error_" + appointmentId);


    if (commentInput.length > 40) {
        errorElement.innerHTML = "Comment must not exceed 40 words.";
        return false;
    } else {
        errorElement.innerHTML = "";
        return true;
    }
}
