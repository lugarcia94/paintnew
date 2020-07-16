$('.menu__button').click(function(){

    if( $(this).hasClass('actived') ){
        $('body').attr('menu',false);
        $(this).removeClass('actived');
    }else{
        $('body').attr('menu',true);
        $(this).addClass('actived');
    }

})


$('.header').click(function(e){

   if( $(e.target).hasClass('header')  ){
        $('body').attr('menu',false);
        $('.menu__button').removeClass('actived')
   }

})