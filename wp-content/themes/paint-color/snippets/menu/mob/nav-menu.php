<nav class="menu__nav">

    <div class="menu__container">

        <div class="menu__head">
            <div class="menu__account">
                <a href="" title="">Entrar na Minha conta</a>
            </div>
            <div class="menu__whatsapp">
                <a href="https://wa.me/5514999999999" title="">Atendimento pelo Whatsapp</a>
            </div>
        </div>


        <h5 class="menu__title">Compra por categoria</h5>

        <div class="menu__categories">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' =>'ul',
                'menu_class' => 'menu__list'
                )
            ); ?>
        </div>


    </div>

</nav>