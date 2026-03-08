<?php

declare(strict_types = 1);

$anchor      = get_sub_field( 'anchor' ) ?: '';
$top_content = get_sub_field( 'top_content' );
?>
<section class="testimonials-container my-5" id="<?php echo esc_attr( $anchor ); ?>">
	<div class="testimonials-header">
		<?php if ( $top_content ) : ?>
			<?php echo $top_content; ?>
		<?php endif; ?>
	</div>

	<div class="testimonials-wrapper">
		<div class="testimonials-track" id="testimonials-track">
			<!-- Original set of testimonials -->
			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">T</div>
					<h3 class="company-name">Tuple</h3>
				</div>
				<p class="testimonial-text">
					"Amet amet eget scelerisque tellus sit neque faucibus non eleifend. Integer eu praesent at a. Ornare arcu gravida natoque erat et cursus tortor consequat at. Vulputate gravida sociis enim nullam ultricies habitant malesuada lorem ac. Tincidunt urna dui pellentesque sagittis."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Judith Black" class="author-avatar">
					<div class="author-details">
						<h4>Judith Black</h4>
						<p>CEO of Tuple</p>
					</div>
				</div>
			</div>

			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">R</div>
					<h3 class="company-name">Reform</h3>
				</div>
				<p class="testimonial-text">
					"Excepteur veniam labore ullamco eiusmod. Pariatur consequat proident duis dolore nulla veniam reprehenderit nisi officia voluptate incididunt exercitation exercitation elit. Nostrud veniam sint dolor nisi ullamco."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Joseph Rodriguez" class="author-avatar">
					<div class="author-details">
						<h4>Joseph Rodriguez</h4>
						<p>CEO of Reform</p>
					</div>
				</div>
			</div>

			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">S</div>
					<h3 class="company-name">Savvycal</h3>
				</div>
				<p class="testimonial-text">
					"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis. Nemo expedita voluptas culpa sapiente alias molestiae."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Emily Chen" class="author-avatar">
					<div class="author-details">
						<h4>Emily Chen</h4>
						<p>Founder of Savvycal</p>
					</div>
				</div>
			</div>

			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">W</div>
					<h3 class="company-name">Workflow</h3>
				</div>
				<p class="testimonial-text">
					"Quasi est quaerat. Sit molestiae et. Provident ad dolorem occaecati eos iste. Soluta rerum quidem minus ut molestiae velit error quod. Excepteur veniam labore ullamco eiusmod pariatur consequat proident."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Michael Foster" class="author-avatar">
					<div class="author-details">
						<h4>Michael Foster</h4>
						<p>CTO of Workflow</p>
					</div>
				</div>
			</div>

			<!-- Duplicate set for seamless loop -->
			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">T</div>
					<h3 class="company-name">Tuple</h3>
				</div>
				<p class="testimonial-text">
					"Amet amet eget scelerisque tellus sit neque faucibus non eleifend. Integer eu praesent at a. Ornare arcu gravida natoque erat et cursus tortor consequat at. Vulputate gravida sociis enim nullam ultricies habitant malesuada lorem ac. Tincidunt urna dui pellentesque sagittis."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Judith Black" class="author-avatar">
					<div class="author-details">
						<h4>Judith Black</h4>
						<p>CEO of Tuple</p>
					</div>
				</div>
			</div>

			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">R</div>
					<h3 class="company-name">Reform</h3>
				</div>
				<p class="testimonial-text">
					"Excepteur veniam labore ullamco eiusmod. Pariatur consequat proident duis dolore nulla veniam reprehenderit nisi officia voluptate incididunt exercitation exercitation elit. Nostrud veniam sint dolor nisi ullamco."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Joseph Rodriguez" class="author-avatar">
					<div class="author-details">
						<h4>Joseph Rodriguez</h4>
						<p>CEO of Reform</p>
					</div>
				</div>
			</div>

			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">S</div>
					<h3 class="company-name">Savvycal</h3>
				</div>
				<p class="testimonial-text">
					"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis. Nemo expedita voluptas culpa sapiente alias molestiae."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Emily Chen" class="author-avatar">
					<div class="author-details">
						<h4>Emily Chen</h4>
						<p>Founder of Savvycal</p>
					</div>
				</div>
			</div>

			<div class="testimonial-card">
				<div class="company-header">
					<div class="company-icon">W</div>
					<h3 class="company-name">Workflow</h3>
				</div>
				<p class="testimonial-text">
					"Quasi est quaerat. Sit molestiae et. Provident ad dolorem occaecati eos iste. Soluta rerum quidem minus ut molestiae velit error quod. Excepteur veniam labore ullamco eiusmod pariatur consequat proident."
				</p>
				<div class="author-info">
					<img src="/placeholder.svg?height=56&width=56" alt="Michael Foster" class="author-avatar">
					<div class="author-details">
						<h4>Michael Foster</h4>
						<p>CTO of Workflow</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>