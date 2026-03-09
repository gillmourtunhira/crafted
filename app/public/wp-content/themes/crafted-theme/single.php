<?php

declare(strict_types = 1);

get_header(); ?>

<section class="page-content my-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>