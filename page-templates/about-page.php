<?php
/*
	Template Name: About Page Template
 */

get_header();

global $event_star_customizer_all_values;
$event_star_hide_front_page_header = $event_star_customizer_all_values['event-star-hide-front-page-header'];

if( is_page( 'about' ) ) {
	?>
	<div class="wrapper inner-main-title">
		<div class="container">
			<header class="entry-header init-animate">
				<?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                if( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ){
					event_star_breadcrumbs();
				}
				?>
			</header><!-- .entry-header -->
		</div>
	</div>
	<?php
}
?>
<div id="content" class="site-content container clearfix">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); ?>
					<div class="section camp-description">
						<h2>Cambodia ICT Camp 2018</h2>
						<p><?php the_excerpt() ?></p>
					</div>

					<div class="section camp-objective">
						<h2>Objectives</h2>
						<p><?php the_content(); ?></p>
					</div>

					<div class="section camp-organizers">
						<?php get_template_part( 'template-parts/organizer-post-list' ); ?>
					</div>
					<div class="clearfix"></div>

					<div class="section camp-partners">
						<?php get_template_part( 'template-parts/partner-post-list' ); ?>
					</div>
					<div class="clearfix"></div>

					<div class="section camp-supporters">
						<?php get_template_part( 'template-parts/supporter-post-list' ); ?>
					</div>
					<div class="clearfix"></div>
					<?php
				}
			}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    ?>
</div><!-- #content -->

<?php get_footer();