<?php

declare(strict_types = 1);

/**
 * Stats Block
 */

return array(
	'key'        => 'crafted_layout_stats',
	'name'       => 'stats',
	'label'      => 'Stats Block',
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'      => 'crafted_layout_stats_anchor',
			'name'     => 'anchor',
			'label'    => 'Stats Anchor',
			'type'     => 'text',
			'required' => 0,
			'wrapper'  => array(
				'width' => '50',
			),
		),
		array(
			'key'          => 'crafted_layout_stats_content',
			'name'         => 'content',
			'label'        => 'Stats Content',
			'type'         => 'wysiwyg',
			'required'     => 0,
			'media_upload' => 0,
		),
	),
);
