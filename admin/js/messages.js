function showAllMessages() {
    updateButtons(this);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../model/db.php?action=getAllMessages', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            displayMessages(xhr.responseText);
        }
    };
    xhr.send();
}

function showMessagesByType(userType) {
    updateButtons(this);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', `../../model/db.php?action=getMessagesByType&type=${userType}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            displayMessages(xhr.responseText);
        }
    };
    xhr.send();
}

function updateButtons(clickedButton) {
    var buttons = document.getElementsByClassName('filter-btn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('active-btn');
    }
    clickedButton.classList.add('active-btn');
}

function displayMessages(messages) {
    var messagesList = document.getElementById('messages-list');
    if (!messages) {
        messagesList.innerHTML = '<p class="no-messages">No messages found.</p>';
        return;
    }

    var html = '';
    messages.forEach(function(message) {
        var userType = message.user_type.toLowerCase();
        var date = new Date().toLocaleDateString('en-US', { 
            weekday: 'short', 
            day: 'numeric', 
            month: 'short', 
            year: 'numeric' 
        });

        html += `<div class="message-card">
            <div class="message-header">
               <div class="sender-type ${userType}">${message.user_type}</div>
                <div class="message-date">${date}</div>
            </div>
            <h3 class="message-subject">${message.subject}</h3>
            <p class="message-sender">From: ${message.email}</p>
            <div class="message-content">${message.message}</div>
        </div>`;
    });
    
    messagesList.innerHTML = html;
}

window.onload = showAllMessages;