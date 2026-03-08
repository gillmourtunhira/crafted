# PHP Quality Tools

This WordPress theme is configured with comprehensive PHP quality tools to ensure code quality, consistency, and maintainability.

## Tools Included

### 1. PHP CodeSniffer (PHPCS)
- **Purpose**: Enforces coding standards and detects coding errors
- **Standards**: WordPress Coding Standards + PHP Compatibility + Slevomat Coding Standard
- **Config**: `phpcs.xml`

### 2. PHPStan
- **Purpose**: Static analysis tool for finding bugs in code
- **Level**: 6 (advanced analysis)
- **Config**: `phpstan.neon`

### 3. PHP Linting
- **Purpose**: Basic syntax checking
- **Integration**: Built into PHPCS workflow

## Installation

First, install the PHP quality tools dependencies:

```bash
composer install --dev
```

This will install:
- `dealerdirect/phpcodesniffer-composer-installer`
- `wp-coding-standards/wpcs`
- `phpcompatibility/php-compatibility`
- `phpstan/phpstan`
- `phpstan/phpstan-wordpress`
- `slevomat/coding-standard`

## Usage

### Quick Commands

```bash
# Run all PHP quality checks
composer test

# Run PHPCS only
composer phpcs

# Auto-fix PHPCS issues
composer phpcbf

# Run PHPStan only
composer phpstan
```

### NPM Scripts

You can also use the npm scripts defined in `package.json`:

```bash
# PHP linting
npm run lint:php

# Auto-fix PHP issues
npm run lint:php-fix

# PHPStan analysis
npm run phpstan

# PHP testing
npm run test:php

# All linting (PHP + JS + CSS)
npm run lint

# Full quality check
npm run quality
```

### Individual Tools

#### PHP CodeSniffer

```bash
# Check coding standards
composer phpcs

# Auto-fix coding standards
composer phpcbf

# Check specific file
vendor/bin/phpcs --standard=phpcs.xml functions.php

# Show detailed report
vendor/bin/phpcs --standard=phpcs.xml --report=full .
```

#### PHPStan

```bash
# Run static analysis
composer phpstan

# Run with more memory
vendor/bin/phpstan analyse --configuration=phpstan.neon --memory-limit=1G

# Run on specific file
vendor/bin/phpstan analyse --configuration=phpstan.neon functions.php

# Show progress
vendor/bin/phpstan analyse --configuration=phpstan.neon --debug
```

## Configuration

### PHPCS Rules (`phpcs.xml`)

The PHPCS configuration includes:
- **WordPress Coding Standards**: Core WordPress best practices
- **PHP Compatibility**: Ensures PHP 7.4+ compatibility
- **Slevomat Coding Standard**: Modern PHP practices
- **Custom Rules**: Theme-specific requirements

Key features:
- 120-character line limit
- Strict types required
- Trailing commas in arrays
- Alphabetically sorted use statements
- WordPress security rules
- Database query validation

### PHPStan Configuration (`phpstan.neon`)

The PHPStan configuration includes:
- **Level 6**: Advanced static analysis
- **WordPress Integration**: Understands WordPress functions and globals
- **Custom Ignore Rules**: Handles WordPress-specific patterns
- **Memory Limit**: 512MB for large analysis

Key features:
- WordPress function and class recognition
- ACF function support
- Hook system understanding
- Template function compatibility

## Pre-commit Hook (Optional)

To automatically run quality checks before commits, add this to `.git/hooks/pre-commit`:

```bash
#!/bin/sh
echo "Running PHP quality checks..."

# Run composer test
composer test
if [ $? -ne 0 ]; then
    echo "❌ PHP quality checks failed. Please fix the issues before committing."
    echo "Run 'composer phpcbf' to auto-fix coding standards issues."
    exit 1
fi

echo "✅ PHP quality checks passed."
exit 0
```

Make it executable:
```bash
chmod +x .git/hooks/pre-commit
```

## Common Issues and Solutions

### 1. WordPress Functions Not Found
**Issue**: PHPStan reports WordPress functions as undefined
**Solution**: The configuration includes WordPress scan files, but sometimes you may need to add more paths to `scanFiles` in `phpstan.neon`

### 2. ACF Functions Not Found
**Issue**: Advanced Custom Fields functions not recognized
**Solution**: ACF functions are included in ignore rules. If you use ACF Pro, add its path to the scan files

### 3. Memory Limit Issues
**Issue**: PHPStan runs out of memory
**Solution**: Increase memory limit:
```bash
vendor/bin/phpstan analyse --memory-limit=1G
```

### 4. Too Many Warnings
**Issue**: Overwhelming number of warnings
**Solution**: Run on specific files or exclude certain directories temporarily:
```bash
vendor/bin/phpcs --standard=phpcs.xml --exclude=WordPress.Security.ValidatedSanitizedInput .
```

## Integration with CI/CD

### GitHub Actions Example

```yaml
name: PHP Quality Checks
on: [push, pull_request]

jobs:
  php-quality:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v3
    
    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '7.4'
        extensions: mbstring, xml, ctype, iconv, intl
        coverage: none
    
    - name: Install dependencies
      run: composer install --dev --prefer-dist --no-progress
    
    - name: Run PHP CodeSniffer
      run: composer lint
    
    - name: Run PHPStan
      run: composer phpstan
```

## Best Practices

1. **Run locally before pushing**: Always run `composer test` before committing
2. **Fix issues incrementally**: Address warnings in small batches
3. **Use auto-fix**: Run `composer phpcbf` for automatic formatting
4. **Review warnings**: Not all warnings need fixing, but understand them
5. **Keep dependencies updated**: Regularly update quality tool versions
6. **Document exceptions**: Add comments for intentionally ignored issues

## Troubleshooting

### Commands Not Found
```bash
# Make sure vendor/bin is in your PATH
export PATH="$PATH:./vendor/bin"

# Or use full paths
./vendor/bin/phpcs --standard=phpcs.xml .
```

### Permissions Issues
```bash
# Make scripts executable
chmod +x vendor/bin/phpcs
chmod +x vendor/bin/phpcbf
chmod +x vendor/bin/phpstan
```

### Configuration Issues
```bash
# Validate PHPCS config
vendor/bin/phpcs --config-show

# Validate PHPStan config
vendor/bin/phpstan analyse --dry-run
```
