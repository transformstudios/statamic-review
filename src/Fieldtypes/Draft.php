<?php

namespace TransformStudios\Drafts\Fieldtypes;

use Statamic\Fields\Fieldtype;

class Draft extends Fieldtype
{
    protected $component = 'draft';

    /**
     * The blank/default value.
     *
     * @return array
     */
    public function defaultValue()
    {
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
