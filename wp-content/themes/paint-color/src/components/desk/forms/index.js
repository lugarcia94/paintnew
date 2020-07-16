import $ from 'jquery';

$('select').each(function () {
    let _this = $(this);
    let _trigger = '<svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg>'
    _this.wrap('<div class="customSelect"></div>');
    $(_this).parent().append(_trigger);
})