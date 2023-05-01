window.onload = function() {

    $('.detail').addClass('hide');
    $('#filter').click(function() {
        $('.detail').removeClass('hide');
        $('#filter').addClass('open');
    });
    $('#close').click(function() {
        $('.detail').addClass('hide');
    })


    $('.search-container').click(function() {
        $('.search-container').addClass('expand');

    })
}