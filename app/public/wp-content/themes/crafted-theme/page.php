<?php

declare(strict_types = 1);

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-12">
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
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>

			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>