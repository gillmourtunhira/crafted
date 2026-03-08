# JavaScript & CSS Quality Tools

This WordPress theme includes comprehensive JavaScript and CSS quality tools to ensure clean, maintainable, and consistent code.

## Tools Included

### 1. ESLint (JavaScript)
- **Purpose**: Enforces JavaScript coding standards and detects potential errors
- **Config**: `.eslintrc.json`
- **Features**: ES2021 support, jQuery globals, WordPress compatibility

### 2. Stylelint (CSS/SCSS)
- **Purpose**: Enforces CSS/SCSS coding standards and catches syntax errors
- **Config**: `.stylelintrc.json`
- **Features**: SCSS support, property ordering, modern CSS practices

### 3. Prettier (Formatter)
- **Purpose**: Automatic code formatting for consistent style
- **Config**: `.prettierrc`
- **Features**: 2-space indentation, single quotes, 120-char line limit

## Installation

Install the JavaScript and CSS quality tools dependencies:

```bash
npm install
```

This will install:
- `eslint` - JavaScript linter
- `stylelint` - CSS/SCSS linter
- `prettier` - Code formatter
- `stylelint-config-standard-scss` - SCSS standards
- `stylelint-order` - Property ordering
- `gulp-eslint` - Gulp ESLint integration
- `gulp-stylelint` - Gulp Stylelint integration
- `gulp-prettier` - Gulp Prettier integration

## Usage

### Quick Commands

```bash
# Lint JavaScript files
npm run lint:js

# Auto-fix JavaScript issues
npm run lint:js-fix

# Lint CSS/SCSS files
npm run lint:css

# Auto-fix CSS/SCSS issues
npm run lint:css-fix

# Format all files with Prettier
npm run format

# Lint all files (PHP + JS + CSS)
npm run lint

# Auto-fix all linting issues
npm run lint-fix

# Run full quality check
npm run quality
```

### Individual Tools

#### ESLint

```bash
# Check JavaScript files
npx eslint assets/js/**/*.js

# Auto-fix JavaScript files
npx eslint assets/js/**/*.js --fix

# Check specific file
npx eslint assets/js/main.js

# Show detailed output
npx eslint assets/js/**/*.js --format=verbose
```

#### Stylelint

```bash
# Check SCSS files
npx stylelint assets/scss/**/*.scss

# Auto-fix SCSS files
npx stylelint assets/scss/**/*.scss --fix

# Check specific file
npx stylelint assets/scss/main.scss

# Show detailed output
npx stylelint assets/scss/**/*.scss --format=verbose
```

#### Prettier

```bash
# Check formatting
npx prettier --check "assets/js/**/*.js" "assets/scss/**/*.scss"

# Format files
npx prettier --write "assets/js/**/*.js" "assets/scss/**/*.scss"

# Format specific file
npx prettier --write assets/js/main.js
```

### Gulp Tasks

```bash
# Lint JavaScript with Gulp
gulp lint-js

# Lint CSS/SCSS with Gulp
gulp lint-css

# Format JavaScript with Gulp
gulp format-js

# Format CSS/SCSS with Gulp
gulp format-css

# Format all files with Gulp
gulp format
```

## Configuration

### ESLint Configuration (`.eslintrc.json`)

Key settings:
- **Environment**: Browser, ES2021, jQuery
- **Style**: 2-space indentation, single quotes, semicolons
- **Rules**: Modern JavaScript practices, no console warnings
- **Globals**: WordPress (`wp`), jQuery (`$`, `jQuery`)

### Stylelint Configuration (`.stylelintrc.json`)

Key settings:
- **Extends**: Standard SCSS configuration
- **Indentation**: 2 spaces
- **Quotes**: Single quotes
- **Property Order**: Logical grouping (positioning, layout, typography, colors)
- **SCSS Features**: Full support for variables, mixins, nesting

### Prettier Configuration (`.prettierrc`)

Key settings:
- **Indentation**: 2 spaces
- **Quotes**: Single quotes
- **Line Width**: 120 characters
- **Semicolons**: Required
- **Trailing Commas**: None

## Integration with Development Workflow

### Pre-commit Hook

Add to `.git/hooks/pre-commit`:

```bash
#!/bin/sh
echo "Running code quality checks..."

# Run all linting
npm run lint
if [ $? -ne 0 ]; then
    echo "❌ Code quality checks failed."
    echo "Run 'npm run lint-fix' to auto-fix issues."
    exit 1
fi

echo "✅ Code quality checks passed."
exit 0
```

### VS Code Integration

Install these VS Code extensions:
- ESLint
- Stylelint
- Prettier - Code formatter

Add to `.vscode/settings.json`:

```json
{
  "editor.formatOnSave": true,
  "editor.defaultFormatter": "esbenp.prettier-vscode",
  "editor.codeActionsOnSave": {
    "source.fixAll.eslint": true,
    "source.fixAll.stylelint": true
  },
  "eslint.validate": ["javascript"],
  "stylelint.validate": ["scss", "css"]
}
```

## Common Issues and Solutions

### 1. ESLint jQuery Errors
**Issue**: `$ is not defined`
**Solution**: jQuery globals are configured, but ensure jQuery is loaded

### 2. Stylelint SCSS Variables
**Issue**: SCSS variables not recognized
**Solution**: Ensure `stylelint-config-standard-scss` is installed

### 3. Prettier Conflicts
**Issue**: Prettier and ESLint disagree on formatting
**Solution**: ESLint rules are configured to match Prettier

### 4. Bootstrap Integration
**Issue**: Linting errors in Bootstrap files
**Solution**: Bootstrap files are excluded from linting

## Best Practices

1. **Run before commits**: Always run `npm run lint` before committing
2. **Use auto-fix**: Run `npm run lint-fix` for automatic formatting
3. **Review warnings**: Not all warnings need fixing, but understand them
4. **Consistent style**: Let Prettier handle formatting automatically
5. **Update dependencies**: Keep linting tools updated regularly
6. **Configure editor**: Use editor extensions for real-time feedback

## File Structure

```
crafted-theme/
├── .eslintrc.json          # ESLint configuration
├── .stylelintrc.json       # Stylelint configuration
├── .prettierrc            # Prettier configuration
├── assets/
│   ├── js/                 # JavaScript source files
│   └── scss/               # SCSS source files
├── dist/                   # Built files (excluded from linting)
└── gulpfile.js            # Gulp tasks including linting
```

## CI/CD Integration

### GitHub Actions Example

```yaml
name: Code Quality
on: [push, pull_request]

jobs:
  js-css-quality:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v3
    
    - name: Setup Node.js
      uses: actions/setup-node@v3
      with:
        node-version: '18'
        cache: 'npm'
    
    - name: Install dependencies
      run: npm ci
    
    - name: Run ESLint
      run: npm run lint:js
    
    - name: Run Stylelint
      run: npm run lint:css
    
    - name: Check Prettier formatting
      run: npm run format -- --check
```

## Troubleshooting

### Commands Not Found
```bash
# Use npx to run locally installed tools
npx eslint --version
npx stylelint --version
npx prettier --version
```

### Configuration Issues
```bash
# Validate configurations
npx eslint --print-config .eslintrc.json
npx stylelint --print-config .stylelintrc.json
```

### Performance Issues
```bash
# Limit files for faster linting
npx eslint assets/js/main.js
npx stylelint assets/scss/main.scss
```
