<?php

namespace TransformStudios\Review;

use Closure;
use Statamic\Contracts\Tokens\Token;
use Statamic\Entries\Entry;
use Statamic\Facades\Entry as EntryFacade;

class TokenHandler
{
    public function handle(Token $token, $request, Closure $next)
    {
        /** @var \Statamic\Entries\Entry */
        if (! $entry = EntryFacade::find($token->token())) {
            return $next($request);
        }

        if ($this->isLive($entry)) {
            return redirect($entry->url());
        }

        $entry->repository()->substitute($this->prepEntry($entry));

        return $next($request);
    }

    private function isLive(Entry $entry): bool
    {
        if (! $entry->published()) {
            return false;
        }

        if ($entry->hasWorkingCopy()) {
            return false;
        }

        if ($entry->collection()->dated() && $entry->date()->isFuture()) {
            return false;
        }

        return true;
    }

    private function prepEntry(Entry $entry): Entry
    {
        if ($entry->collection()->dated() && $entry->date()->isFuture()) {
            $entry->date(now());
        }

        if ($entry->hasWorkingCopy()) {
            $entry = $entry->fromWorkingCopy();
        }

        return $entry->published(true);
    }
}
