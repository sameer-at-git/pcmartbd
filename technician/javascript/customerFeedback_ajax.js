function showRating(rating) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../functions/viewCustomerFeedback.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('filterResults').innerHTML = xhr.responseText;
        }
    }
    
    xhr.send('rating=' + rating);
}