<?php

namespace TransformStudios\Review;

use Statamic\Providers\AddonServiceProvider;
use TransformStudios\Review\Actions\OpenReview;
use TransformStudios\Review\Fieldtypes\CopyReviewUrl;

class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        OpenReview::class,
    ];

    protected $fieldtypes = [
        CopyReviewUrl::class,
    ];

    protected $routes = [
        'actions' => __DIR__.'/../routes/actions.php',
    ];

    protected $scripts = [
        __DIR__.'/../dist/js/cp.js',
    ];
}
