<?php

declare(strict_types = 1);

/**
 * Posts Cards Block
 */

return array(
	'key'        => 'crafted_layout_posts_cards',
	'name'       => 'posts_cards',
	'label'      => 'Posts Cards Block',
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'crafted_layout_posts_cards_anchor',
			'name'     => 'anchor',
			'label'    => 'Posts Cards Anchor',
			'type'     => 'text',
			'required' => 0,
			'wrapper'  => array(
				'width' => '30',
			),
		),
		array(
			'key'          => 'crafted_layout_posts_cards_description',
			'name'         => 'cards_description',
			'label'        => 'Cards Description',
			'type'         => 'wysiwyg',
			'required'     => 0,
			'media_upload' => 0,
		),
		array(
			'key'           => 'crafted_layout_posts_selected_posts',
			'label'         => 'Selected Posts',
			'name'          => 'selected_posts',
			'type'          => 'relationship',
			'required'      => 0,
			'post_type'     => 'post',
			'return_format' => 'id',
		),
		array(
			'key'      => 'crafted_layout_posts_order',
			'label'    => 'Posts Order',
			'name'     => 'posts_order',
			'type'     => 'select',
			'required' => 0,
			'wrapper'  => array(
				'width' => '25',
			),
			'choices'  => array(
				'asc'  => 'Ascending',
				'desc' => 'Descending',
			),
		),
		array(
			'key'      => 'crafted_layout_posts_hide_author_avatar',
			'label'    => 'Hide Author Avatar',
			'name'     => 'hide_author_avatar',
			'type'     => 'true_false',
			'required' => 0,
			'wrapper'  => array(
				'width' => '25',
			),
		),
	),
);
