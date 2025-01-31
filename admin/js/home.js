
function searchFunctionality() {
    let input = document.getElementById('searchInput');
    let filter = input.value.toLowerCase();
    let cards = document.getElementsByClassName('function-card');

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].getElementsByTagName('a')[0];
        let txtValue = title.textContent || title.innerText;
        
        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            cards[i].classList.remove('hidden');
        } else {
            cards[i].classList.add('hidden');
        }
    }
}