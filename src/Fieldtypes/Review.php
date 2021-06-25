<?php

namespace TransformStudios\Review\Fieldtypes;

use Statamic\Entries\Collection;
use Statamic\Fields\Fieldtype;

class Review extends Fieldtype
{
    protected $component = 'copy_review_url';

    /**
     * The blank/default value.
     *
     * @return array
     */
    public function defaultValue()
    {
    }

    public function preload()
    {
        /** @var \Statamic\Entries\Entry */
        if (! $entry = $this->field->parent()) {
            return [];
        }

        // when it's a new entry the "parent" is the collection
        // in this case, we can't show it anyway so return empty
        if ($entry instanceof Collection) {
            return [];
        }

        return [
            'site_url' => $entry->site()->url(),
            'has_revision' => $entry->hasWorkingCopy(),
        ];
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }
}
