<?php

namespace TransformStudios\Review\Fieldtypes;

use Statamic\Entries\Collection;
use Statamic\Entries\Entry;
use Statamic\Fields\Fieldtype;
use TransformStudios\Review\Support\URL;

class Review extends Fieldtype
{
    protected $component = 'copy_review_url';

    public function icon()
    {
        return file_get_contents(__DIR__.'/../../resources/svg/review-icon.svg');
    }

    public function preload()
    {
        if (! $entry = $this->field->parent()) {
            return [];
        }

        // when it's a new entry the "parent" is the collection
        // in this case, we can't show it anyway so return empty
        if ($entry instanceof Collection) {
            return [];
        }

        return ['site_url' => URL::reviewUrl($entry)];
    }
}
