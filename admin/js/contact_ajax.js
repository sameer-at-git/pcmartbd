function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

function searchUsers() {
    var searchQuery = document.getElementById('searchUser').value;
    
    if (searchQuery.length >= 1) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'contact_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var users = JSON.parse(xhr.responseText);
                var output = '';
                
                if (users.length > 0) {
                    for (var i = 0; i < users.length; i++) {
                        var user = users[i];
                        output += '<div class="search-result" onclick="selectUser(\'' + 
                                user.email + '\', \'' + user.user_id + '\', \'' + 
                                user.user_type + '\')">' + 
                                user.email + '</div>';
                    }
                } else {
                    output = '<div>No users found</div>';
                }
                
                document.getElementById('searchResults').innerHTML = output;
            }
        }
        
        xhr.send('action=search&query=' + searchQuery);
    } else {
        document.getElementById('searchResults').innerHTML = '';
    }
}

function selectUser(email, userId, userType) {
    document.getElementById('selectedUserEmail').value = email;
    document.getElementById('selectedUserId').value = userId;
    document.getElementById('searchUser').value = email;
    document.getElementById('userType').value = userType;
    document.getElementById('searchResults').innerHTML = '';
}

function validateForm() {
    var userType = document.getElementById('userType').value;
    var email = document.getElementById('searchUser').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
    document.getElementById('typeError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('subjectError').innerHTML = '';
    document.getElementById('messageError').innerHTML = '';
    
    var isValid = true;
    
    if (!userType) {
        document.getElementById('typeError').innerHTML = 'Please select a user type';
        isValid = false;
    }
    
    if (!email) {
        document.getElementById('emailError').innerHTML = 'Please select a user';
        isValid = false;
    }
    
    if (!subject) {
        document.getElementById('subjectError').innerHTML = 'Please enter a subject';
        isValid = false;
    }
    
    if (!message) {
        document.getElementById('messageError').innerHTML = 'Please enter a message';
        isValid = false;
    }
    
    return isValid;
}
