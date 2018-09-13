<?php
get_header();

global $event_star_customizer_all_values;
?>

<div class="wrapper inner-main-title">
	<div class="container">
		<header class="entry-header init-animate">
			<h1 class="page-title"><?php echo post_type_archive_title(); ?></h1>
			<?php
			// the_archive_title( '<h1 class="page-title">', '</h1>' );
			// the_archive_description( '<div class="taxonomy-description">', '</div>' );

			if( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ){
				event_star_breadcrumbs();
			}
			?>
		</header><!-- .entry-header -->
	</div>
</div>

<div id="content" class="site-content container clearfix">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if( have_posts() ) :
				/* Start the Loop */
				$counter = 1;
				$wrap_count = 4;

				while( have_posts() ) : the_post();
					if( $counter%$wrap_count == 1 ) {
						echo '<div class="row">';
					}
					?>

					<div class="col-xs-12 col-sm-12 col-md-2">
						<?php 
						$attributes = [
							'title' => get_the_title(),
							'class' => 'aligncenter img-circle',
						];

						$profile = get_the_post_thumbnail( $post->ID, 'thumbnail', $attributes );
						$responsive_profile = preg_replace( '/(width|height)="\d*"\s/', '', $profile );
						?>
						<a href="#">
							<?php echo $responsive_profile; ?>
						</a>
						<p class="text-center">
							<?php echo get_the_title(); ?>
						</p>
						<p class="text-center">
							<?php echo get_post_meta( $post->ID, '_speakers_expertise_value_key', true ) ?>
						</p>
					</div>

					<?php
					if( $counter%$wrap_count == 0 ) {
						echo '</div>';
					}
					?>
					
				<?php
				endwhile;
				/**
				 * event_star_action_posts_navigation hook
				 * @since Event Star 1.0.0
				 *
				 * @hooked event_star_posts_navigation - 10
				 */
				do_action( 'event_star_action_posts_navigation' );
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	get_sidebar( 'left' );
	get_sidebar(); 
	?>
</div><!-- #content -->
<?php get_footer();