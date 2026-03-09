<?php

declare(strict_types = 1);

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h1><?php single_post_title(); ?></h1>
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
