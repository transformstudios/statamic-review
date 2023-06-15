<?php

namespace TransformStudios\Review\Actions;

use Statamic\Actions\Action;
use Statamic\Entries\Entry;
use Statamic\Support\Arr;
use TransformStudios\Review\Support\URL;

class OpenReview extends Action
{
    protected $confirm = false;

    public static $title = 'Open Review';

    public function redirect($items, $values)
    {
        return URL::reviewUrl($items->first());
    }

    public function visibleTo($item)
    {
        if (! $item instanceof Entry) {
            return false;
        }

        $fields = $item->blueprint()->fields()->items();

        if ($fields->doesntContain(fn (array $value) => Arr::get($value, 'field.type') === 'review')) {
            return false;
        }

        return ! $item->published() ||
               $item->hasWorkingCopy() ||
               ($item->collection()->dated() && $item->date()->isFuture());
    }

    public function visibleToBulk($items)
    {
        return false;
    }
}
