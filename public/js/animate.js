/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('particles-js', 'js/particles.json', function() {
    console.log('callback - particles.js config loaded');
});

anime({
    targets: '.login-box .title>img',
    easing: 'easeOutExpo', 
    scale: [0,1],
    duration:1000
});


var input_underlined = document.querySelectorAll(".input-underlined");

input_underlined.forEach(function(item) {
    if (item.querySelector("input").value.length != 0) {
        item.querySelector(".input-placeholder").classList.add("filled");
    }

    item.addEventListener("focusin", function() {
        item.querySelector(".input-placeholder").classList.add("filled");
    });

    item.addEventListener("focusout", function() {
        if (item.querySelector("input").value.length == 0) {
            item.querySelector(".input-placeholder").classList.remove("filled");
        }
    });
});