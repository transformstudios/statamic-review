<?php

namespace TransformStudios\Review\Http\Middleware;

use Closure;
use Statamic\Facades\Entry;
use Statamic\Facades\Site;

class SetSite
{
    public function handle($request, Closure $next)
    {
        Site::setCurrent(Entry::find($request->id)->site()->handle());

        return $next($request);
    }
}
