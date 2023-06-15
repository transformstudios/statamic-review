<?php

namespace TransformStudios\Review\Actions;

use Statamic\Actions\Action;
use Statamic\Entries\Entry;
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
        return $item instanceof Entry &&
               (! $item->published() || $item->hasWorkingCopy()) &&
               in_array($item->collectionHandle(), config('review.collections'));
    }

    public function visibleToBulk($items)
    {
        return false;
    }
}
