<?php
/*
 *  Template Part for displaying list of posts of Supporter category
 *  @package
 */

$supporters = new WP_Query( ['category_name' => 'supporter'] );

if ( $supporters->have_posts() ) { 
	$counter = 0;
	?>

	<div class="section-title">
		<h2>Our Supporters</h2>
	</div>

	<?php		
	while ( $supporters->have_posts() ) {
		$supporters->the_post();
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
				<?php the_post_thumbnail( 'medium', ['title' => get_the_title()] ); ?>
			</a>
		</div>
	<?php
		if ( $counter%4 == 0 ) {
			echo '</div>';
		}
	}
}

wp_reset_postdata();