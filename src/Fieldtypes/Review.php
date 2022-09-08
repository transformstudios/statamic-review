<?php

namespace TransformStudios\Review\Fieldtypes;

use Illuminate\Support\Arr;
use Statamic\Entries\Collection;
use Statamic\Entries\Entry;
use Statamic\Facades\Site;
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

        return [
            'site_url' => $this->makeUrl($entry),
            'has_revision' => $entry->hasWorkingCopy(),
        ];
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param  mixed  $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param  mixed  $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }

    private function makeUrl(Entry $entry): string
    {
        $parsed = parse_url(Site::get($entry->locale())->url());
        $port = Arr::has($parsed, 'port') ? ":{$parsed['port']}" : '';

        return $parsed['scheme'].'://'.$parsed['host'].$port;
    }
}
