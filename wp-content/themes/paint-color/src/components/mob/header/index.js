
import $ from 'jquery';

$('.menu__button').click(function () {

    if ($(this).hasClass('actived')) {
        $('body').attr('menu', false);
        $(this).removeClass('actived');
    } else {
        $('body').attr('menu', true);
        $(this).addClass('actived');
    }

})


$('.header').click(function (e) {

    if ($(e.target).hasClass('header')) {
        $('body').attr('menu', false);
        $('.menu__button').removeClass('actived')
    }

})

$('.menu-item.menu-item-has-children').each(function () {
    let _this = $(this);
    let _child = _this.find('>.sub-menu')
    _this.append('<span class="sub_trigger"></span>');
    let _trigger = _this.find('.sub_trigger');
    _trigger.on('click', function () {
        _this.toggleClass('active');
        _child.toggleClass('active');
    })
})