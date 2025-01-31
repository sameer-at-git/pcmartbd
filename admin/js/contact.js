function getXMLHttpRequest() {
    var xhr = false;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhr;
}
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
function searchUsers() {
    var userType = document.getElementById('userType').value;
    var searchQuery = document.getElementById('searchUser').value;
    var searchResults = document.getElementById('searchResults');

    var xhr = getXMLHttpRequest();
    if (xhr) {
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                searchResults.innerHTML = xhr.responseText;
            }
        };

        xhr.open("POST", "contact_user.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("action=search&type=" + encodeURIComponent(userType) + "&query=" + encodeURIComponent(searchQuery));
    }
}

function selectUser(email, userId) {
    document.getElementById('selectedUserEmail').value = email;
    document.getElementById('selectedUserId').value = userId;  // Storing user_id for message insertion
    document.getElementById('searchUser').value = email;
    document.getElementById('searchResults').innerHTML = ''; // Clear search results
}

function validateAndSendMessage() {
    var userType = document.getElementById('userType').value;
    var userId = document.getElementById('selectedUserId').value;
    var email = document.getElementById('selectedUserEmail').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
    var errorContainer = document.getElementById('errorMessages');

    errorContainer.innerHTML = ''; // Clear previous errors

    if (!userType) {
        errorContainer.innerHTML += '<p>User type is required.</p>';
    }
    if (!email || !userId) {
        errorContainer.innerHTML += '<p>Email address is required.</p>';
    }
    if (!subject) {
        errorContainer.innerHTML += '<p>Subject is required.</p>';
    }
    if (!message) {
        errorContainer.innerHTML += '<p>Message content is required.</p>';
    }

    if (errorContainer.innerHTML === '') {
        var xhr = getXMLHttpRequest();
        if (xhr) {
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);  // Show success or error message
                }
            };

            xhr.open("POST", "contact_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("action=send&user_id=" + encodeURIComponent(userId) + 
                     "&subject=" + encodeURIComponent(subject) + 
                     "&message=" + encodeURIComponent(message));
        }
    }
}
function initializeFromUrl() {
    const email = getUrlParameter('email');
    const type = getUrlParameter('type');
    
    if (type) {
        const userTypeSelect = document.getElementById('userType');
        userTypeSelect.value = type;
    }
    
    if (email) {
        const searchUserInput = document.getElementById('searchUser');
        searchUserInput.value = email;
        // Trigger search after small delay to ensure DOM is ready
        setTimeout(searchUsers, 100);
    }
}

window.onload = function() {
    document.getElementById('userType').onchange = searchUsers;
    document.getElementById('searchUser').onkeyup = searchUsers;
    document.getElementById('sendMessage').onclick = validateAndSendMessage;
    initializeFromUrl();

};
