<?php

namespace Transformstudios\Drafts\Http\Controllers;

use Statamic\Entries\Entry;
use Statamic\Facades\Entry as EntryAPI;
use Statamic\Http\Controllers\Controller;

class DraftController extends Controller
{
    public function __invoke(string $id)
    {
        /** @var Entry */
        $content = EntryAPI::find($id);

        if ($content->published()) {
            return redirect($content->url());
        }

        return $content;
    }
}
