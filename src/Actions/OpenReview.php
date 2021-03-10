<?php

namespace TransformStudios\Review\Actions;

use Statamic\Actions\Action;
use Statamic\Entries\Entry;

class OpenReview extends Action
{
    protected $confirm = false;
    public static $title = 'Open Review';

    public function redirect($items, $values)
    {
        return route('statamic.review.show', ['id' => $items->first()->id()]);
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
