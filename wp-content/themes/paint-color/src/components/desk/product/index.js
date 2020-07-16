import $ from 'jquery';

if ($('body').hasClass('single-product')) {
    $(document).ready(function () {
        let cardIcon = `<svg class="icon icon-garantia"><use xlink:href="#icon-card-payment"></svg>`
        $('.fswp_installments_price.single').prepend(cardIcon)
    })

    if ($('body').hasClass('woo-variation-swatches-stylesheet-enabled')) {
        $(document).ready(function () {
            $('.customSelect option').each(function () {
                let varId = $(this).attr('value')
                let varContent = $(this).text()
                let varText = `<span>${varContent}</span>`

                console.log(varId)

                $('.image-variable-item[data-value="' + varId + '"]').append(varText)
            })
        })
    }

    $('a#modal__open').on('click', function () {
        $('body').addClass('on__modal-frete')
    })
    $('.close__modal').on('click', function () {
        $('body').removeClass('on__modal-frete')
    })

    $('#wscp-button').on('click', function () {
        localStorage.setItem("M-IDE", $('#wscp-postcode').val());
    });

    var e = localStorage.getItem("M-IDE");

    if ($(e)) {
        $('#wscp-postcode').val(e)
    }


}

