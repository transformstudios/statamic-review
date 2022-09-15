<?php

namespace TransformStudios\Review;

use Closure;
use Statamic\Contracts\Tokens\Token;
use Statamic\Facades\Entry;

class TokenHandler
{
    public function handle(Token $token, $request, Closure $next)
    {
        /** @var \Statamic\Entries\Entry */
        $entry = Entry::find($token->get('id'));

        if ($entry->published()) {
            return redirect($entry->url());
        }

        if ($entry->hasWorkingCopy()) {
            $entry = $entry->fromWorkingCopy();
        }

        $entry->published(true);

        $entry->repository()->substitute($entry);

        return $next($request);
    }
}
