/**
 * This window on scroll is to be used and injected into our menu page via the PROGRESS html tag.
 * Its purpose is to be a sticky on the bottom of the page... As the user scrolls down, progress bar color
 * will change from pink to green bar entirely...
 * This change indicates to user that the page is longer than it seems.
 */
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

function myFunction() {
    let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
}