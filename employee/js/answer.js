function validateResponse(responseID) {
    var response = document.getElementById('report_response' + responseID).value;
    var response_pr = document.getElementById('response_error' + responseID);
    
    if (/[<>?@#!]/.test(response)) {
        response_pr.innerHTML = 'Answer without using special characters';
        return false;
    }
    
    return true;
}