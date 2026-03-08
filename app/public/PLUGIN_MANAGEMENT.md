# Plugin Management via Composer

This WordPress project uses Composer to manage all plugins. Plugin installation, updates, and deletion through the WordPress admin interface are disabled to ensure consistency and version control.

## Current Plugins

The following plugins are currently managed through Composer:

- `wpackagist-plugin/contact-form-7` - Contact form plugin
- `wpackagist-plugin/secure-custom-fields` - Secure custom fields (ACF alternative)
- `wpackagist-plugin/classic-editor` - Classic WordPress editor

## Adding New Plugins

To add a new plugin:

```bash
# Search for available plugins
composer search wpackagist-plugin/plugin-name

# Install a plugin
composer require wpackagist-plugin/plugin-name

# Install specific version
composer require wpackagist-plugin/plugin-name:^1.2.3
```

## Updating Plugins

To update plugins:

```bash
# Update all plugins
composer update

# Update specific plugin
composer update wpackagist-plugin/plugin-name

# Check for outdated packages
composer outdated
```

## Removing Plugins

To remove a plugin:

```bash
composer remove wpackagist-plugin/plugin-name
```

## Installing Plugins

After making changes to `composer.json`:

```bash
# Install all dependencies
composer install

# Update autoloader
composer dump-autoload
```

## Plugin Directory Structure

Plugins are automatically installed to:
- `wp-content/plugins/{plugin-name}/` - Regular plugins
- `wp-content/mu-plugins/{plugin-name}/` - Must-use plugins

## Security Benefits

1. **Version Control**: All plugin versions are tracked in `composer.json`
2. **Dependency Management**: Automatic resolution of plugin dependencies
3. **Consistency**: Same plugin versions across all environments
4. **Audit Trail**: Clear history of plugin changes via Git
5. **Security**: Prevents accidental plugin installations in production

## Notes

- WordPress admin plugin management is disabled for security
- All plugin operations must be performed via Composer
- Changes require a `composer install` to take effect
- Always test plugin updates in a staging environment first
