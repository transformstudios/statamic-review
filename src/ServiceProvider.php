<?php

namespace TransformStudios\Review;

use Statamic\Providers\AddonServiceProvider;
use TransformStudios\Review\Actions\OpenReview;
use TransformStudios\Review\Fieldtypes\Review;

class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        OpenReview::class,
    ];

    protected $fieldtypes = [
        Review::class,
    ];

    protected $vite = [
        'input' => ['resources/js/cp.js'],
        'publicDirectory' => 'dist',
        'hotFile' => __DIR__.'/../dist/hot',
    ];
}
