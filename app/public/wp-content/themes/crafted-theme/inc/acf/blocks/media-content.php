<?php

declare(strict_types = 1);

// Media-Content Block

return array(
	'key'        => 'crafted_layout_media_content',
	'name'       => 'media-content',
	'label'      => 'Media Content Block',
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'crafted_layout_media_content_anchor',
			'name'     => 'anchor',
			'label'    => 'Anchor',
			'type'     => 'text',
			'required' => 0,
			'wrapper'  => array(
				'width' => '50',
			),
		),
		array(
			'key'           => 'crafted_layout_media_content_background_colour',
			'name'          => 'background_colour',
			'label'         => 'Background Colour',
			'type'          => 'select',
			'required'      => 0,
			'instructions'  => 'Select the background colour',
			'choices'       => array(
				'white'     => 'White',
				'black'     => 'Black',
				'green'     => 'Green',
				'primary'   => 'Primary',
				'secondary' => 'Secondary',
				'teal'      => 'Teal',
			),
			'default_value' => 'white',
			'wrapper'       => array(
				'width' => '50',
			),
		),
		array(
			'key'           => 'crafted_layout_media_content_image_alignment',
			'name'          => 'image_alignment',
			'label'         => 'Image Alignment',
			'type'          => 'select',
			'required'      => 0,
			'choices'       => array(
				'left'  => 'Left',
				'right' => 'Right',
			),
			'default_value' => 'left',
			'wrapper'       => array(
				'width' => '50',
			),
		),
		array(
			'key'           => 'crafted_layout_media_content_image',
			'name'          => 'image',
			'label'         => 'Image',
			'type'          => 'file',
			'mime_types'    => 'jpg,jpeg,png,gif,webp,avif',
			'required'      => 0,
			'wrapper'       => array(
				'width' => '50',
			),
			'return_format' => 'url',
		),
		array(
			'key'          => 'crafted_layout_media_content_top_content_option',
			'name'         => 'top_content_option',
			'label'        => 'Top Content Option',
			'instructions' => 'Select if you want to add top content',
			'type'         => 'true_false',
			'ui'           => true,
			'required'     => 0,
			'ui_on_text'   => 'Yes',
			'ui_off_text'  => 'No',
		),
		array(
			'key'               => 'crafted_layout_media_content_top_content',
			'name'              => 'top_content',
			'label'             => 'Top Content',
			'type'              => 'wysiwyg',
			'media_upload'      => 0,
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'crafted_layout_media_content_top_content_option',
						'operator' => '==',
						'value'    => '1',
					),
				),
			),
		),
		array(
			'key'          => 'crafted_layout_media_content_content',
			'name'         => 'content',
			'label'        => 'Content',
			'type'         => 'wysiwyg',
			'media_upload' => 0,
			'required'     => 1,
		),
	),
);
