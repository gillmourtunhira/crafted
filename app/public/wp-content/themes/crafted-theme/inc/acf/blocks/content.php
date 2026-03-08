<?php

declare(strict_types = 1);

/**
 * Content
 */

return array(
	'key'        => 'crafted_layout_content',
	'name'       => 'content',
	'label'      => 'Content Block',
	'display'    => 'block',

	'sub_fields' => array(
		array(
			'key'          => 'crafted_layout_content_value',
			'label'        => 'Content',
			'name'         => 'content',
			'type'         => 'wysiwyg',
			'required'     => 1,
			'tabs'         => 'all',
			'toolbar'      => 'full',
			'media_upload' => 0,
		),
	),

	'min'        => '',
	'max'        => '',
);
