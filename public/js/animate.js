/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('particles-js', 'js/particles.json', function() {
    console.log('callback - particles.js config loaded');
});

var tl1 = anime.timeline({
    easing: 'easeOutExpo',
    duration: 700
});

tl1
.add({
    targets: '.login-box .title>img',
    scale: [0,1]
})
.add({
    targets: 'form>*:nth-child(2)',
    scale: [0,1]
}, '-=600')
.add({
    targets: 'form>*:nth-child(3)',
    scale: [0,1]
}, '-=600')
.add({
    targets: 'form>*:nth-child(4)',
    scale: [0,1]
}, '-=600');


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