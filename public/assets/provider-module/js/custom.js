/* It's the best idea to write your own JS in custom.js file. So if you want to write JS with your own use this file */

$(document).ready(function() {
    // Fallback to hide preloader after 5 seconds in case window.load is delayed
    setTimeout(function() {
        $(".preloader").fadeOut(200);
    }, 5000);
});
