<?php
/*
 *  Template Part for displaying list of posts of Organizer category
 *  @package
 */

$organizers = new WP_Query( ['category_name' => 'organizers'] );

if ( $organizers->have_posts() ) { 
	$counter = 0; ?>

	<div class="section-title">
		<h2>Our Organizers</h2>
	</div>

	<?php		
	while ( $organizers->have_posts() ) {
		$organizers->the_post();

		$counter++;

		if ( $counter%4 == 1 ) {
			echo '<div class="row">';
		} 
	?>
		<div class="col-xs-12 col-sm-12 col-md-3">
			<?php
			$url = apply_filters( 'the_content', get_the_content() );
			?>

			<a href="<?php echo wp_filter_nohtml_kses( $url ) ?>">
				<?php the_post_thumbnail( 'medium', ['title' => get_the_title(), 'class' => 'img-responsive'] ); ?>
			</a>
		</div>
	<?php
		if ( $counter%4 == 0 ) {
			echo '</div>';
		}
	}
}

wp_reset_postdata();