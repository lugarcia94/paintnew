<!-- Main -->

<main class="main">

    <?php get_template_part('snippets/slider/desk/slider');?>
    

    <!-- Categorys -->
    <section class="categorys uk-section uk-section-small">

    <div class="uk-container">

        <h2 class="categorys__title">Compre por categoria</h2>

        <?php get_template_part('snippets/home/desk/categorias-home');?>
        
    </div>

    </section>


    <?php the_content();?>


    <!-- Brands -->
    <section class="brands uk-section uk-section-small">

        <div class="uk-container">

            <h2 class="brands__title">Compre por Marca</h2>

            <?php get_template_part('snippets/home/desk/marcas-home');?>

        </div>

    </section>

    <!-- Showcase -->
    

    <?php get_template_part( 'snippets/showcase/desk/ofertas-especiais' ) ;?>


</main>