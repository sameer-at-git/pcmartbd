function validateBroadcastForm() {
    var subject = document.getElementById('subject').value.trim();
    var message = document.getElementById('message').value.trim();
    var errorElement = document.getElementById('js-error');
    
    errorElement.innerHTML = '';
    
    if (subject === '') {
        errorElement.innerHTML = 'Please enter a subject';
        return false;
    }
    
    if (message === '') {
        errorElement.innerHTML = 'Please enter a message';
        return false;
    }
    
    return true;
}
