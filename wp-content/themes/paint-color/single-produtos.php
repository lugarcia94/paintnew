<?php
/**
 * The Template for displaying all single posts.
 *
 * @package codesigner
 * @since codesigner 0.1
 */

get_header(); ?>
	<div class="lightbox-wrapper" id="cotarProduto">
		<div class="lightbox-shadow"></div>
		<div class="lightbox-centralize">
			<div class="lightbox-panel">
				<span class="label-lightbox">
					<i class="icon-cotacao"></i><span>Orçamento</span>
				</span>
				<div class="lightbox-close">
					<i></i>
					<i></i>
				</div>
				<div class="lightbox-title">
					<h4>Informe os dados abaixo e receba retorno da nossa equipe em até 48h.</h4>
				</div>
				<div class="lightbox-body">
					<?php echo do_shortcode('[contact-form-7 id="93" title="Formulário de Orçamento"]')?>
				</div>
			</div>
		</div>
	</div>


	<div id="page">
		<?php do_action( 'before' ); ?>
		<div id="main">

			<div id="product-breadcrumbs" class="breadcrumb-wrapper">
				<div class="container">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
					</div>
				</div>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
			<div id="product-main-infos">
				<div class="container">


					<?php
					$img1 = get_field('imagem_01');
					$img2 = get_field('imagem_02');
					$img3 = get_field('imagem_03');
					$img4 = get_field('imagem_04');

					$code = get_field('codigo');
					$shortDescription = get_field('descricao_rapida');

					?>

					<div class="image-gallery">
						<ul class="thumbnails" id="gallery_01">
							<li>
								<a href="#" data-image="<?php echo $img1['sizes']['large']; ?>" data-zoom-image="<?php echo $img1['sizes']['large']; ?>">
									<img src="<?php echo ($img1['sizes']['thumbnail']);?>" alt="">
								</a>
							</li>
							<li>
								<a href="#" data-image="<?php echo $img2['sizes']['large']; ?>" data-zoom-image="<?php echo $img2['sizes']['large']; ?>">
									<img src="<?php echo ($img2['sizes']['thumbnail']);?>" alt="">
								</a>
							</li>
							<li>
								<a href="#" data-image="<?php echo $img3['sizes']['large']; ?>" data-zoom-image="<?php echo $img3['sizes']['large']; ?>">
									<img src="<?php echo ($img3['sizes']['thumbnail']);?>" alt="">
								</a>
							</li>
							<li>
								<a href="#" data-image="<?php echo $img4['sizes']['large']; ?>" data-zoom-image="<?php echo $img4['sizes']['large']; ?>">
									<img src="<?php echo ($img4['sizes']['thumbnail']);?>" alt="">
								</a>
							</li>
						</ul>
						<div class="main-image">
							<img id="zoomImage" src="<?php echo $img1['sizes']['large']; ?>" data-zoom-image="<?php echo $img1['sizes']['large']; ?>" alt="">
						</div>
					</div>
					<div class="product-infos">
						<h1 class="product-name"><?php the_title() ?></h1>
						<ul class="product-codes">
							<li>
								<strong>Código:</strong> <span><?php echo ($code); ?></span>
							</li>
							<li>
								<strong>Categorias:</strong> <span><?php echo taxonomies_terms_links(); ?></span>
							</li>
						</ul>

						<?php if ($shortDescription) : ?>
							<div class="short-description">
								<?php echo ($shortDescription); ?>
							</div>
						<?php endif; ?>

						<?php if( get_field('tipo_de_venda') == 'Venda direta' ) : ?>
							<a class="action-link" href="<?php echo the_field('link_do_produto') ?>" target="_blank"><i class="icon-cart"></i><span>Ir para a loja virtual</span></a>
						<?php else :?>
							<div class="form-trigger productpage-trigger action-link"><i class="icon-cotacao"></i><span>Orçamento</span></div>
						<?php endif; ?>
					</div>



					<div class="product-share">
						<div class="row">
							<div class="col-xs-12">
								<ul class="sharelist">
									<li><strong>Compartilhe</strong></li>
									<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink()?>&title=<?php the_title()?>" target="_blank"><i class="icon-facebook"></i></a></li>
									<li><a href="http://twitter.com/intent/tweet?status=<?php the_title()?>+<?php the_permalink()?>" target="_blank"><i class="icon-twitter"></i></a></li>
									<li><a href="https://plus.google.com/share?url=<?php the_permalink()?>" target="_blank"><i class="icon-google"></i></a></li>
									<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php the_post_thumbnail_url(); ?>&url=<?php the_permalink()?>&is_video=false&description=<?php the_title()?>" target="_blank"><i class="icon-pinterest"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="product-secondary-infos">

				<?php
					$description = get_field('descricao');
					$downloads = get_field('downloads');
					$sobre = get_field('sobre_o_fabricante');
				?>

				<div class="container">
					<ul class="tabs">
						<?php if($description) : ?>
						<li class="tab-link current" data-tab="descricao-tab"><span>Descrição</span></li>
						<?php endif; ?>
						<?php if($downloads) : ?>
						<li class="tab-link" data-tab="downloads-tab"><span>Dowloads</span></li>
						<?php endif; ?>
						<?php if($sobre) : ?>
						<li class="tab-link" data-tab="fabricante-tab"><span>Sobre o Fabricante</span></li>
						<?php endif; ?>
					</ul>
					<?php if($description) : ?>
					<div id="descricao-tab" class="tab-content current">
						<?php echo ($description);?>
					</div>
					<?php endif; ?>
					<?php if($downloads) : ?>
					<div id="downloads-tab" class="tab-content">
						<?php echo ($downloads);?>
					</div>
					<?php endif; ?>
					<?php if($sobre) : ?>
					<div id="fabricante-tab" class="tab-content">
						<?php echo ($sobre);?>
					</div>
					<?php endif; ?>

				</div>
			</div>

			<?php endwhile; // end of the loop. ?>
		</div>
	</div>

<?php get_footer(); ?>