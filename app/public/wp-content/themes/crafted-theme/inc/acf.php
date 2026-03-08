<?php

declare(strict_types = 1);

add_action( 'acf/init', 'crafted_acf_init' );

function crafted_acf_init(): void {
	// require_once __DIR__ . '/acf/buttons.php';
	require_once __DIR__ . '/acf/flexible_content.php';
}
