/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('particles-js', 'js/particles.json', function() {
    console.log('callback - particles.js config loaded');
});

particlesJS.load('particles-js-congratulations', 'js/particles-congrats.json', function() {
    console.log('callback - particles.js config loaded');
});

var tl1 = anime.timeline({
    easing: 'easeOutExpo',
    duration: 400
});

tl1
.add({
    targets: '.login-box .title>img',
    scale: [0,1]
})
.add({
    targets: 'form>#input-user',
    scale: [0,1]
}, '-=400')
.add({
    targets: 'form>#input-password',
    scale: [0,1]
}, '-=400')
.add({
    targets: 'form>input[type="submit"]',
    scale: [0,1]
}, '-=400');


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