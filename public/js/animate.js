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

anime({
    targets: '.hangman #head',
    easing: 'easeInOutQuad',
    duration: 300,
    scale: [0,1]
});

anime({
    targets: '.hangman #body',
    easing: 'easeInOutQuad',
    duration: 400,
    scale: [0,1],
    rotate: '1turn'
});

anime({
    targets: '.hangman #arms',
    easing: 'easeInOutQuad',
    duration: 400,
    translateX: [-500,0],
    rotate: '1turn'
});

anime({
    targets: '.hangman #lleg',
    easing: 'easeOutElastic(1, .8)',
    duration: 400,
    scale: [2,1],
    translateY: [5000,0],
    rotate: '1turn'
});

anime({
    targets: '.hangman #rleg',
    easing: 'easeOutElastic(1, .8)',
    duration: 400,
    scale: [2,1],
    translateY: [5000,0],
    rotate: '1turn'
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