<?php

namespace Transformstudios\Drafts;

use Statamic\Providers\AddonServiceProvider;
use Transformstudios\Drafts\Fieldtypes\Draft;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        Draft::class,
    ];

    protected $routes = [
        'actions' => __DIR__.'/../routes/actions.php',
    ];

    protected $scripts = [
        __DIR__.'/../dist/js/cp.js',
    ];
}
