<p align="center"><img src="/command-history.png" alt="Artisan command history for Laravel Pulse"></p>

# Artisan command history for Laravel Pulse

[![Latest Version on Packagist](https://img.shields.io/packagist/v/geowrgetudor/command-history.svg?style=flat-square)](https://packagist.org/packages/geowrgetudor/command-history)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/geowrgetudor/command-history/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/geowrgetudor/command-history/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/geowrgetudor/command-history/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/geowrgetudor/command-history/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/geowrgetudor/command-history.svg?style=flat-square)](https://packagist.org/packages/geowrgetudor/command-history)

View what artisan commands have been executed, how many times and if they were successful or failed.

## Installation

You can install the package via composer:

```bash
composer require geowrgetudor/command-history
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="command-history-views"
```

## Usage

Register the recorder inside `config/pulse.php`. (If you don\'t have this file make sure you have published the config file of Laravel Pulse using `php artisan vendor:publish --tag=pulse-config`)

```
return [
    // ...

    'recorders' => [
        // Existing recorders...

        \Geow\CommandHistory\Recorders\CommandHistoryRecorder::class => [
            'enabled' => env('GEOW_COMMAND_HISTORY', true),
            'ignore' => [
                // Ignore any command like "route:list"
            ],
        ]
    ]
]
```

Publish Laravel Pulse `dashboard.blade.php` view using `php artisan vendor:publish --tag=pulse-dashboard`

Then you can modify the file and add the disk-metrics livewire template.

```php
<livewire:command-history cols="full" />
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [George Tudor](https://github.com/geowrgetudor)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
