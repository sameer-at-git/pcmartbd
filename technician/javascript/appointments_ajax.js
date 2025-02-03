function searchAppointments(searchTerm) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../functions/viewAllAppointment.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('searchResults').innerHTML = xhr.responseText;
        }
    }
    
    xhr.send('search=' + searchTerm);
}
