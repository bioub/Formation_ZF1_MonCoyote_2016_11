var blue = false;

setInterval(function() {
    if (blue) {
        $('body').css('background', 'lightgreen');
        blue = false;
    }
    else {
        $('body').css('background', 'lightblue');
        blue = true;
    }
}, 1000);
