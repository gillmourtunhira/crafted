<?php

declare(strict_types = 1);

get_header(); ?>

<?php if ( have_rows( 'flexible_content' ) ) : ?>

	<!-- loop through the rows of data -->
	<?php
	while ( have_rows( 'flexible_content' ) ) :
		the_row();
		?>

		<?php include 'partials/blocks/' . get_row_layout() . '.php'; ?>

	<?php endwhile; ?>

<?php else : ?>

	<!-- no layouts found -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>No content found.</p>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>