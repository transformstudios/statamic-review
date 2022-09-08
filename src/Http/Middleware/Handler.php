<?php

namespace Statamic\Tokens\Handlers;

use Closure;
use Statamic\Contracts\Tokens\Token;

class LivePreview
{
    public function handle(Token $token, $request, Closure $next)
    {
        $id = $token->get('id'); // 123

        $entry = Entry::find($id);

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
