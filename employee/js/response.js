function validateResponse() {
    var responseID = document.getElementById('report_id').value;
    var response = document.getElementById('report_response' + responseID).value;
    var response_pr = document.getElementById('response_error' + responseID);
    if (/[<>?@#!]/.test(response)) {
        response_pr.innerHTML = 'Response cannot contain special characters ';
        return false;
    }
    return true;
}

function cleanResponse() {
    if (!validateResponse()) {
        return false;
    } else {
        return true;
    }
}
