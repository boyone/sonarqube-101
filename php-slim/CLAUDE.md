# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP Slim 4.10 API project with PHP 8.2 that provides a simple hello world endpoint. The project follows PSR-4 autoloading standards and includes unit testing with PHPUnit.

## Development Commands

### Dependencies
```bash
composer install          # Install dependencies
composer update           # Update dependencies
```

### Development Server
```bash
composer start            # Start development server on localhost:8080
php -S localhost:8080 -t public  # Alternative way to start server
```

### Testing
```bash
composer test             # Run PHPUnit tests
composer test:coverage    # Run tests with HTML coverage report
phpunit                   # Run tests directly
phpunit --coverage-html coverage  # Generate coverage report
```

### Code Quality
```bash
vendor/bin/phpunit --coverage-clover coverage.xml  # Generate coverage for SonarQube
```

## Architecture

### Directory Structure
- `public/` - Web root with index.php entry point
- `src/` - Application source code (PSR-4 autoloaded as App\\)
- `tests/` - PHPUnit test files (PSR-4 autoloaded as Tests\\)
- `vendor/` - Composer dependencies
- `coverage/` - Test coverage reports

### API Endpoints
- `GET /hello` - Returns JSON: `{"message": "hello, world!"}`

### Key Files
- `public/index.php` - Main application entry point with Slim app setup
- `composer.json` - Dependencies and autoloading configuration
- `phpunit.xml` - PHPUnit configuration with coverage settings
- `sonar-project.properties` - SonarQube analysis configuration

## Testing Strategy

Tests are located in the `tests/` directory and use PHPUnit 10. The test suite includes:
- API endpoint testing using Slim's request/response handling
- JSON response validation
- HTTP status code verification

## SonarQube Integration

The project is configured for SonarQube analysis with:
- Source code analysis for `src/` and `public/` directories
- Test coverage reporting via `coverage.xml`
- Exclusions for vendor and coverage directories