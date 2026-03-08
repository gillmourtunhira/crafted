<?php

declare(strict_types = 1);

// Cards Block
return array(
	'key'        => 'crafted_layout_cards',
	'name'       => 'cards',
	'label'      => 'Cards Block',
	'display'    => 'block',

	'sub_fields' => array(
		array(
			'key'      => 'crafted_layout_cards_anchor',
			'name'     => 'anchor',
			'label'    => 'Anchor',
			'type'     => 'text',
			'required' => 0,
			'wrapper'  => array(
				'width' => '30',
			),
		),
		array(
			'key'          => 'crafted_layout_cards_description',
			'label'        => 'Description',
			'name'         => 'description',
			'type'         => 'wysiwyg',
			'media_upload' => 0,
			'required'     => 0,
		),
		array(
			'key'        => 'crafted_layout_cards_items',
			'label'      => 'Cards',
			'name'       => 'items',
			'type'       => 'repeater',
			'required'   => 0,
			'layout'     => 'block',
			'sub_fields' => array(
				array(
					'key'          => 'crafted_layout_cards_item_description',
					'label'        => 'Description',
					'name'         => 'description',
					'type'         => 'wysiwyg',
					'media_upload' => 0,
					'required'     => 1,
				),
				array(
					'key'           => 'crafted_layout_cards_item_image_icon_option',
					'label'         => 'Icon Option',
					'name'          => 'icon_option',
					'type'          => 'true_false',
					'required'      => 0,
					'ui'            => 1,
					'ui_on_text'    => 'Icon',
					'ui_off_text'   => 'Image',
					'default_value' => 1,
					'wrapper'       => array(
						'width' => '20',
					),
				),
				array(
					'key'               => 'crafted_layout_cards_item_image_font_awesome_icon',
					'label'             => 'Font-Awesome Icon',
					'name'              => 'font_awesome_icon',
					'type'              => 'text',
					'placeholder'       => __( 'fa-globe' ),
					'required'          => 0,
					'wrapper'           => array(
						'width' => '20',
					),
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'crafted_layout_cards_item_image_icon_option',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
				),
				array(
					'key'               => 'crafted_layout_cards_item_image_icon_image',
					'label'             => 'Image',
					'name'              => 'icon_image',
					'type'              => 'file',
					'mime_types'        => 'jpg,jpeg,png,svg,avif,webp',
					'required'          => 0,
					'wrapper'           => array(
						'width' => '20',
					),
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'crafted_layout_cards_item_image_icon_option',
								'operator' => '==',
								'value'    => '0',
							),
						),
					),
				),
				array(
					'key'      => 'crafted_layout_cards_item_link',
					'label'    => 'Link',
					'name'     => 'link',
					'type'     => 'link',
					'required' => 0,
					'wrapper'  => array(
						'width' => '40',
					),
				),
			),
		),
	),
);
