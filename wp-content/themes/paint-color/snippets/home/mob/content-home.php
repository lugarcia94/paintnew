<?php get_template_part('snippets/slider/mob/slider');?>

<!-- Search -->
<section class="search--section">
    <div class="uk-container uk-container-small">
        <?php get_search_form();?>  
    </div>
</section>

<!-- Categorys -->
<section class="categorys uk-section uk-section-small">

    <div class="uk-container uk-container-small">

        <h2 class="categorys__title">Compre por categoria</h2>

        <?php get_template_part('snippets/home/mob/categorias-home');?>
        
    </div>
    
</section>

<!-- Brands -->
<section class="brands uk-section uk-section-small">
    
    <div class="uk-container uk-container-small">
        
        <h2 class="brands__title">Compre por Marca</h2>
        
        <?php get_template_part('snippets/home/mob/marcas-home');?>

    </div>

</section>

<!-- Showcase -->
<section class="showcase showcase--featured uk-section uk-section-xsmall">

    <div class="uk-container uk-container-small">

        <?php get_template_part( 'snippets/showcase/mob/ofertas-especiais' ) ;?>

    </div>

</section>