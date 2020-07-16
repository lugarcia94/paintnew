import $ from 'jquery';

if ($('.filter_open').length > 0) {

    $('.filter_open').on('click', function () {
        $('#secondary').addClass('active');
    })
    $('.filter-close').on('click', function () {
        $('#secondary').removeClass('active');
    })

}