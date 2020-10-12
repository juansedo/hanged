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