<?php

namespace TransformStudios\Review\Http\Middleware;

use Closure;
use Statamic\Facades\Entry;
use Statamic\Facades\Site;

class SetSite
{
    public function handle($request, Closure $next)
    {
        abort_if(
            ! $entry = Entry::find($request->id),
            404
        );

        Site::setCurrent($entry->site()->handle());

        return $next($request);
    }
}
