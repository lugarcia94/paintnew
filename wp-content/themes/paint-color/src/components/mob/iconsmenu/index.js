import $ from 'jquery';

if ($('body').hasClass('home')) {
    if ($('.elementor-widget-container .menu-menu-home-categorias-container').length > 0) {
        $('.elementor-widget-container .menu-menu-home-categorias-container').attr('uk-slider', '')
        $('.elementor-widget-container .menu-menu-home-categorias-container > ul').addClass('uk-slider-items uk-child-width-1-2 uk-child-width-1-6@s uk-child-width-1-7@m')
        $('.elementor-widget-container .menu-menu-home-categorias-container').append(`
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        `)
    }

    if ($('.elementor-widget-container .menu-menu-home-marcas-container').length > 0) {
        $('.elementor-widget-container .menu-menu-home-marcas-container').attr('uk-slider', '')
        $('.elementor-widget-container .menu-menu-home-marcas-container > ul').addClass('uk-slider-items uk-child-width-1-2 uk-child-width-1-6@s uk-child-width-1-7@m')
        $('.elementor-widget-container .menu-menu-home-marcas-container').append(`
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        `)
    }
} 