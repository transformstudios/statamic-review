<?php

namespace TransformStudios\Drafts\Actions;

use Statamic\Actions\Action;
use Statamic\Entries\Entry;

class Draft extends Action
{
    protected $confirm = false;
    public static $title = 'Open Draft';

    public function redirect($items, $values)
    {
        return route('statamic.drafts.show', ['id' => $items->first()->id()]);
    }

    public function visibleTo($item)
    {
        return $item instanceof Entry &&
               ! $item->published() &&
               in_array($item->collectionHandle(), config('drafts.collections'));
    }

    public function visibleToBulk($items)
    {
        return false;
    }
}
