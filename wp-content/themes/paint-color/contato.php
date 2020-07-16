<?php
/* Template Name: Página de Contato Padrão
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package codesigner
 * @since codesigner 0.1
 */

get_header(); ?>

<?php
$newsSwitch = get_theme_mod('footer_newsletter_switch');
$mainSwitch = get_theme_mod('footer_main_switch');
$mail1 = get_theme_mod( 'email_1' );
$mail1Name = get_theme_mod( 'email_1_name' );
$mail2 = get_theme_mod( 'email_2' );
$mail2Name = get_theme_mod( 'email_2_name' );
$mail3 = get_theme_mod( 'email_3' );
$mail3Name = get_theme_mod( 'email_3_name' );
$mail4 = get_theme_mod( 'email_4' );
$mail4Name = get_theme_mod( 'email_4_name' );
$tel1 = get_theme_mod( 'tel_1' );
$tel1Title =get_theme_mod( 'tel_1_title' );
$tel2 = get_theme_mod( 'tel_2' );
$tel2Title =get_theme_mod( 'tel_2_title' );
$tel3 = get_theme_mod( 'tel_3' );
$tel3Title =get_theme_mod( 'tel_3_title' );
$tel4 = get_theme_mod( 'tel_4' );
$tel4Title =get_theme_mod( 'tel_4_title' );
$dados = get_theme_mod( 'dados_empresa' );
$endereco = get_theme_mod( 'endereco' );
$horario = get_theme_mod( 'horario_atendimento' );
$logo_footer = get_theme_mod( 'footer_logo' );

$socialSwitch = get_theme_mod('footer_social_switch');
$facebookUrl = get_theme_mod('facebook_url');
$facebookIcon = get_theme_mod('facebook_icon');
$twitterUrl = get_theme_mod('twitter_url');
$twitterIcon = get_theme_mod('twitter_icon');
$youtubeUrl = get_theme_mod('youtube_url');
$youtubeIcon = get_theme_mod('youtube_icon');
$instagramUrl = get_theme_mod('instagram_url');
$instagramIcon = get_theme_mod('instagram_icon');
$pinterestUrl = get_theme_mod('pinterest_url');
$pinterestIcon = get_theme_mod('pinterest_icon');
$gplusUrl = get_theme_mod('gplus_url');
$gplusIcon = get_theme_mod('gplus_icon');
$mapa = get_theme_mod( 'gmaps' );
?>
	<div id="page-breadcrumbs" class="breadcrumb-wrapper">
		<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				<span></span>
				<span></span>
				<span>Contato</span>
			</div>
		</div>
	</div>
	<div id="page" class="page-single-column template-contato">
	<?php do_action( 'before' ); ?>
		<div id="main" class="row">
			<div id="primary" class="col-xs-12">
				<div id="content" role="main">
					<?php
					global $more;
					$more = 0;
					?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

						<blockquote>
							<?php if ($tel1) :?>
								<div class="contact-block">
									<div class="televendas">
										<span><?php echo ($tel1Title); ?></span>
										<?php echo ($tel1); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($tel2) :?>
								<div class="contact-block">
									<div class="televendas">
										<span><?php echo ($tel2Title); ?></span>
										<?php echo ($tel2); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($tel3) :?>
								<div class="contact-block">
									<div class="televendas">
										<span><?php echo ($tel3Title); ?></span>
										<?php echo ($tel3); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($tel4) :?>
								<div class="contact-block">
									<div class="televendas">
										<span><?php echo ($tel4Title); ?></span>
										<?php echo ($tel4); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($horario) :?>
								<div class="contact-block">
									<?php echo ($horario);?>
								</div>
							<?php endif; ?>
						</blockquote>

						<?php if ($mail1) :?>
							<div class="contact-block">
								<h2><?php echo ($mail1Name);?></h2>
								<p><?php echo ($mail1);?></p>
							</div>
						<?php endif; ?>
						<?php if ($mail2) :?>
							<div class="contact-block">
								<h2><?php echo ($mail2Name);?></h2>
								<p><?php echo ($mail2);?></p>
							</div>
						<?php endif; ?>
						<?php if ($mail3) :?>
							<div class="contact-block">
								<h2><?php echo ($mail3Name);?></h2>
								<p><?php echo ($mail3);?></p>
							</div>
						<?php endif; ?>
						<?php if ($mail4) :?>
							<div class="contact-block">
								<h2><?php echo ($mail4Name);?></h2>
								<p><?php echo ($mail4);?></p>
							</div>
						<?php endif; ?>

						<?php echo ($mapa); ?>

						<?php if ($dados || $endereco) :?>
							<div class="footer-block">
								<p>
									<?php if($dados) :?>
										<?php echo ($dados);?>
									<?php endif ;?>
									<?php if($endereco) :?>
										<?php echo ($endereco);?>
									<?php endif ;?>
								</p>
							</div>
						<?php endif; ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
<?php get_footer(); ?>