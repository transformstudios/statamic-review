<?php

namespace TransformStudios\Review\Http\Controllers;

use Statamic\Entries\Entry;
use Statamic\Facades\Entry as EntryAPI;
use Statamic\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function __invoke(string $id)
    {
        /** @var Entry */
        $entry = EntryAPI::find($id);

        if ($entry->hasWorkingCopy()) {
            return $entry->fromWorkingCopy()->published(true);
        }

        if ($entry->published()) {
            return redirect($entry->url());
        }

        // indicate that we are "reviewing" the entry
        $entry->setSupplement('review_addon', true);

        return $entry->published(true);
    }
}
