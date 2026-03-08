<?php

declare(strict_types = 1);

/**
 * Testimonials Block
 */

return array(
	'key'        => 'crafted_testimonials_block',
	'name'       => 'testimonials',
	'label'      => 'Testimonials Block',
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'crafted_testimonials_anchor',
			'name'     => 'anchor',
			'label'    => 'Testimonials Anchor',
			'type'     => 'text',
			'required' => 0,
			'wrapper'  => array(
				'width' => '50',
			),
		),
		array(
			'key'          => 'crafted_testimonials_top_content',
			'name'         => 'top_content',
			'label'        => 'Top Content',
			'type'         => 'wysiwyg',
			'media_upload' => 0,
			'required'     => 0,
		),
		array(
			'key'        => 'crafted_testimonials_list',
			'name'       => 'testimonials_list',
			'label'      => 'Testimonials List',
			'type'       => 'repeater',
			'required'   => 0,
			'min'        => 1,
			'layout'     => 'block',
			'sub_fields' => array(
				array(
					'key'      => 'crafted_testimonial_quote',
					'name'     => 'quote',
					'label'    => 'Quote',
					'type'     => 'textarea',
					'required' => 0,
				),
				array(
					'key'      => 'crafted_testimonial_author',
					'name'     => 'author',
					'label'    => 'Author',
					'type'     => 'text',
					'required' => 0,
				),
			),
		),
	),
);
