$(function(){
    $('#zvuk').hover(function() {
        $('#zvuk').removeClass('blink-image');
        $('.zvuk').fadeIn();

    }, function() {
        $('.zvuk').fadeOut();
        $('#zvuk').addClass('blink-image');
    });
    $('#kamera').hover(function() {
        $('#kamera').removeClass('blink-image2');
        $('.kamera').fadeIn();
    }, function() {
        $('.kamera').fadeOut();
        $('#kamera').addClass('blink-image2');
    });
    $('#dodir').hover(function() {
        $('#dodir').removeClass('blink-image3');
        $('.dodir').fadeIn();
    }, function() {
        $('.dodir').fadeOut();
        $('#dodir').addClass('blink-image3');
    });
    $('#tanak').hover(function() {
        $('#tanak').removeClass('blink-image4');
        $('.tanak').fadeIn();
    }, function() {
        $('.tanak').fadeOut();
        $('#tanak').addClass('blink-image4');
    });
    $('#osobine').hover(function() {
        $('#osobine').removeClass('blink-image5');
        $('.osobine').fadeIn();
    }, function() {
        $('.osobine').fadeOut();
        $('#osobine').addClass('blink-image5');
    });
    $('#ostaniteUkljuceni').hover(function() {
        $('#ostaniteUkljuceni').removeClass('blink-image');
        $('.ostaniteUkljuceni').fadeIn();
    }, function() {
        $('.ostaniteUkljuceni').fadeOut();
        $('#ostaniteUkljuceni').addClass('blink-image');
    });
    $('#crni').click(function () {
        $('#crni').hide();
        $('#crniAfter').show();

        $('#beliAfter').hide();
        $('#zlatniAfter').hide();
        $('#beli').show();
        $('#zlatni').show();


        $('.beli').hide();
        $('.zlatni').hide();
        $('.crni').show();
    });
    $('#zlatni').click(function () {
        $('#zlatni').hide();
        $('#zlatniAfter').show();

        $('#beliAfter').hide();
        $('#crniAfter').hide();
        $('#beli').show();
        $('#crni').show();

        $('.beli').hide();
        $('.crni').hide();
        $('.zlatni').show();
    });
    $('#beli').click(function () {
        $('#beli').hide();
        $('#beliAfter').show();
        $('#crni').show();
        $('#zlatni').show();
        $('#crniAfter').hide();
        $('#zlatniAfter').hide();
        $('.beli').show();
        $('.crni').hide();
        $('.zlatni').hide();
    });
});
