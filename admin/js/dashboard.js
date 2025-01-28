function showSection(sectionName, event) {
    var sections = document.getElementsByClassName('content-section');
    for(var i = 0; i < sections.length; i++) {
        sections[i].classList.remove('active');
    }
    document.getElementById(sectionName).classList.add('active');
    var buttons = document.querySelectorAll('.sidebar-nav button');
    for(var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('active');
    }
        event.target.classList.add('active');
}