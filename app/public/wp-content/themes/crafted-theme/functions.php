<?php

// Include ACF
require_once get_template_directory() . "/inc/acf.php";
require_once get_template_directory() . "/inc/classes/class-crafted-nav-walker.php";
require_once get_template_directory() . "/inc/classes/Bootstrap_Helper.php";
require_once get_template_directory() . "/inc/classes/class-shortcodes.php";
require_once get_template_directory() . "/inc/utilities.php";

new CraftedTheme_Shortcodes();

/**
 * Enqueue theme styles and scripts.
 */
function crafted_theme_enqueue_assets()
{
    // Fonts
    wp_enqueue_style(
        "google-fonts",
        "https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap",
        [],
        "1.0.0",
        "all",
    );
    // Font Awesome
    wp_enqueue_style(
        "font-awesome",
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css",
        [],
        "6.4.0",
    );
    // Enqueue styles
    wp_enqueue_style(
        "crafted-theme-style",
        get_template_directory_uri() . "/dist/css/main.css",
        ["google-fonts", "font-awesome"],
        time(),
        "all",
    );

    // Enqueue scripts
    wp_enqueue_script(
        "crafted-theme-script",
        get_template_directory_uri() . "/dist/js/main.js",
        ["jquery"],
        "1.0.0",
        true,
    );

    wp_enqueue_script(
        'load-more',
        get_template_directory_uri() . '/assets/js/load-more.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script('load-more', 'ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action("wp_enqueue_scripts", "crafted_theme_enqueue_assets");

// Theme setup
function crafted_setup()
{
    // Add default posts and comments RSS feed links to head
    add_theme_support("automatic-feed-links");

    // Enable title tag support
    add_theme_support("title-tag");

    // Enable post thumbnails
    add_theme_support("post-thumbnails");

    // Enable excerpt
    add_theme_support("excerpt");

    // Register navigation menus
    register_nav_menus([
        "primary" => esc_html__("Primary Menu", "crafted-theme"),
        "footer" => esc_html__("Footer Menu", "crafted-theme"),
    ]);

    // HTML5 support
    add_theme_support("html5", [
        "search-form",
        "comment-form",
        "comment-list",
        "gallery",
        "caption",
    ]);

    // Add custom logo support
    add_theme_support("custom-logo", [
        "height" => 100,
        "width" => 400,
        "flex-height" => true,
        "flex-width" => true,
    ]);

    // Add editor styles
    add_theme_support("editor-styles");
    add_editor_style("dist/css/editor-style.min.css");

    // Add support for responsive embeds
    add_theme_support("responsive-embeds");

    // Add support for full and wide blocks
    add_theme_support("align-wide");
}
add_action("after_setup_theme", "crafted_setup");

// SVG support
function add_svg_support($file_types)
{
    $new_filetypes = [];
    $new_filetypes["svg"] = "image/svg+xml";
    return array_merge($file_types, $new_filetypes);
}
add_filter("upload_mimes", "add_svg_support");

function svg_sanitization($data, $file, $filename, $mimes)
{
    // Check if file is SVG
    if (!empty($data["ext"]) && $data["ext"] === "svg") {
        if ($data["type"] === "image/svg+xml") {
            // Validate SVG content
            $content = file_get_contents($file);
            // Basic security check - look for script tags or dangerous attributes
            if (
                preg_match("/.*?<script.*?>.*?<\/script>.*?/is", $content) ||
                preg_match(
                    "/.*?(onload|onerror|onclick|onmouseover)=.*?/is",
                    $content,
                )
            ) {
                $data["ext"] = "";
                $data["type"] = "";
            }
        }
    }
    return $data;
}
add_filter("wp_check_filetype_and_ext", "svg_sanitization", 10, 4);

function display_svg_in_media_library()
{
    echo '
    <style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action("admin_head", "display_svg_in_media_library");

function crafted_excerpt_length($length)
{
    return 20;
}
add_filter("excerpt_length", "crafted_excerpt_length");

// Add theme support for custom logo
function theme_setup()
{
    add_theme_support("custom-logo", [
        "height" => 50,
        "width" => 200,
        "flex-height" => true,
        "flex-width" => true,
    ]);
}
add_action("after_setup_theme", "theme_setup");

// Pre-get posts
add_action("pre_get_posts", function ($query) {
    if (!is_admin() && $query->is_main_query()) {
        $query->set("posts_per_page", 3);
    }
});

//
// Disable plugin installation, deletion, and updates in WordPress admin
// All plugins should be managed through Composer
//

// Disable plugin installation capabilities
function crafted_disable_plugin_installation() {
    // Remove plugin installation capability from all users
    $roles = wp_roles();
    foreach ($roles->role_objects as $role) {
        $role->remove_cap('install_plugins');
        $role->remove_cap('delete_plugins');
        $role->remove_cap('update_plugins');
    }
}
add_action('init', 'crafted_disable_plugin_installation');

// Hide plugin installation menu items
function crafted_hide_plugin_menus() {
    // Hide "Add New" plugin menu
    remove_submenu_page('plugins.php', 'plugin-install.php');
    
    // Hide plugin editor
    remove_submenu_page('plugins.php', 'plugin-editor.php');
}
add_action('admin_menu', 'crafted_hide_plugin_menus');

// Disable plugin installation actions via URL
function crafted_disable_plugin_actions() {
    // Disable plugin installation
    if (isset($_GET['action']) && $_GET['action'] === 'install-plugin') {
        wp_die('Plugin installation is disabled. All plugins must be managed through Composer.');
    }
    
    // Disable plugin deletion
    if (isset($_GET['action']) && $_GET['action'] === 'delete-selected' && isset($_GET['checked'])) {
        wp_die('Plugin deletion is disabled. All plugins must be managed through Composer.');
    }
    
    // Disable plugin updates
    if (isset($_GET['action']) && ($_GET['action'] === 'upgrade-plugin' || $_GET['action'] === 'upgrade-core')) {
        wp_die('Plugin updates are disabled. All plugins must be managed through Composer.');
    }
}
add_action('admin_init', 'crafted_disable_plugin_actions');

// Add admin notice about Composer-managed plugins
function crafted_composer_plugin_notice() {
    $screen = get_current_screen();
    if ($screen && $screen->id === 'plugins') {
        ?>
        <div class="notice notice-info is-dismissible">
            <p><strong>Composer-Managed Plugins:</strong> All plugins are managed through Composer. To add, update, or remove plugins, use <code>composer require</code>, <code>composer update</code>, or <code>composer remove</code> in your terminal.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'crafted_composer_plugin_notice');

// Hide plugin update notifications
function crafted_hide_plugin_update_notifications() {
    remove_all_actions('admin_notices');
}
add_action('admin_head-plugins.php', 'crafted_hide_plugin_update_notifications');
