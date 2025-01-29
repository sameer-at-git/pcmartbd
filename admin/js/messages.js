function showAllMessages() {
    const messagesList = document.getElementById('messages-list');
    const messages = messagesList.getElementsByClassName('message');
    for(let message of messages) {
        message.hidden = false;
    }
}

function showMessagesByType(type) {
    const messagesList = document.getElementById('messages-list');
    const messages = messagesList.getElementsByClassName('message');
    for(let message of messages) {
        const messageType = message.getElementsByClassName('message__type')[0].textContent;
        message.hidden = (messageType !== type);
    }
}

window.onload = showAllMessages;