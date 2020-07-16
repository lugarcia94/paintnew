

<?php if( have_rows('lista_produtos') ): ?>

<?php while ( have_rows('lista_produtos') ) : the_row(); ?>

<?php
        $titulo = get_sub_field('titulo');
        $link = get_sub_field('link');
        $produtos = get_sub_field('produtos');
        ?>
    <div class="showcase__header uk-grid uk-grid-collapse uk-grid-match" uk-grid>
        
        <div class="uk-width-expand">
            <h2 class="showcase__title"><?php echo $titulo;?></h2>
        </div>
        
        <div>
            <a href="<?php echo $link ;?>" class="showcase__allview">Ver todos</a>
        </div>
        
    </div>
    
    <?php if( $produtos ): ?>
        <ul class="showcase__list uk-grid uk-grid-small uk-child-width-1-1">
        <?php foreach( $produtos as $produto ): ?>
            <li class="showcase__list-item showcase__list-item--left">
                <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>
                    <button class="showcase__giftlist">
                        <?php
                            $productType = get_product( $produto->ID );
                            if( $productType->is_type( 'simple' ) ){
                                $echoType = 'simple';
                            }
                            if( $productType->is_type( 'variable' ) ){
                                $echoType = 'variable';
                            }
                            if( $productType->is_type( 'group' ) ){
                                $echoType = 'group';
                            }
                            if( $productType->is_type( 'virtual' ) ){
                                $echoType = 'virtual';
                            }
                            if( $productType->is_type( 'download' ) ){
                                $echoType = 'download';
                            }
                        ?>

                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo  $produto->ID ;?>  wishlist-fragment on-first-load" data-fragment-ref="<?php echo  $produto->ID ;?>" data-fragment-options='{"base_url":"<?php echo home_url(); ?>\/produto\/<?php echo $produto->post_name;?>?page&product=<?php echo $produto->post_name;?>&post_type=product&name=<?php echo $produto->post_name;?>","wishlist_url":"http:\/\/dev.paintcolor\/lista-de-desejos\/","in_default_wishlist":false,"is_single":false,"show_exists":false,"product_id":<?php echo  $produto->ID ;?>,"parent_product_id":<?php echo  $produto->ID ;?>,"product_type":"<?php echo  $echoType ;?>","show_view":false,"browse_wishlist_text":"Veja sua lista de desejos!","already_in_wishslist_text":"Esse produto já se encontra na sua lista de desejos!","product_added_text":"Produto adicionado!","heading_icon":"fa-heart-o","available_multi_wishlist":false,"disable_wishlist":false,"show_count":false,"ajax_loading":false,"loop_position":"shortcode","item":"add_to_wishlist"}'>
                            <div class="yith-wcwl-add-button">
                                <a href="<?php echo home_url(); ?>/produto/<?php echo $produto->post_name;?>?page&product=<?php echo $produto->post_name;?>&post_type=product&name=<?php echo $produto->post_name;?>&add_to_wishlist=<?php echo  $produto->ID ;?>" rel="nofollow" data-product-id="<?php echo  $produto->ID ;?>" data-product-type="<?php echo  $echoType ;?>" data-original-product-id="<?php echo  $produto->ID ;?>" class="add_to_wishlist single_add_to_wishlist" data-title="Adicionar aos meus desejos">
                                    <i class="yith-wcwl-icon fa fa-heart-o"></i>        <span>Adicionar aos meus desejos</span>
                                </a>
                            </div>
                        </div>              
                    </button>

                    <div class="uk-flex uk-flex-middle uk-flex-center">
                        <figure class="showcase__figure uk-card-media-left uk-cover-container">
                            <?php echo get_the_post_thumbnail( $produto->ID, 'medium', array('class' => 'showcase__image') ); ?>
                        </figure>
                    </div>
                    <div>
                        <h3 class="showcase__name">
                            <a href="<?php echo get_permalink( $produto->ID); ?>" class="showcase__link"><?php echo get_the_title($produto->ID);?></a>
                        </h3>
    
                        <div class="showcase__data">
                            <?php
                                $_product = wc_get_product( $produto->ID );
                            ?>
                            <strong class="showcase__offer"><?php echo $_product->get_price_html();;?></strong>
                            <em class="showcase__installments">12x de R$279,08 sem juros</em>
                        </div>
    
                        <div class="showcase__labels">
                            <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<?php endwhile;?>
<?php endif;?>
