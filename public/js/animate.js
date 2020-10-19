/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('particles-js', 'js/particles.json', function() {
    console.log('callback - particles.js config loaded');
});

particlesJS.load('particles-js-congratulations', 'js/particles-congrats.json', function() {
    console.log('callback - particles.js config loaded');
});

particlesJS.load('particles-js-failed', 'js/particles-failed.json', function() {
    console.log('callback - particles.js config loaded');
});

anime({
    targets: '.login-box',
    easing: 'easeInOutQuad',
    duration: 1000,
    translateX: '-50%',
    translateY: '-50%',
    scale: [0,1]
});


var arr_input_underlined = document.querySelectorAll(".input-underlined");

arr_input_underlined.forEach(function(item) {
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