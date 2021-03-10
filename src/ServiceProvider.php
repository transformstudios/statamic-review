<?php

namespace TransformStudios\Drafts;

use Statamic\Providers\AddonServiceProvider;
use TransformStudios\Drafts\Actions\Draft as DraftAction;
use TransformStudios\Drafts\Fieldtypes\Draft;

class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        DraftAction::class,
    ];

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
