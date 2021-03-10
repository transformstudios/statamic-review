<?php

namespace TransformStudios\Drafts;

use Statamic\Providers\AddonServiceProvider;
use TransformStudios\Drafts\Fieldtypes\Draft;

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
