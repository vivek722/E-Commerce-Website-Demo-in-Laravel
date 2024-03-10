function activateLink(linkname){
    var activeElements = document.querySelectorAll('.active-link');

    activeElements.forEach(function(element) {
        element.classList.remove('active-link');
    });    

    document.getElementById(linkname).classList.add('active-link');
}