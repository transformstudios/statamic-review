<?php

namespace TransformStudios\Review\Support;

use Statamic\Entries\Entry;
use Statamic\Facades\Token as TokenFacade;
use Statamic\Tokens\Token;
use TransformStudios\Review\TokenHandler;

class URL
{
    public static function reviewUrl(Entry $entry): string
    {
        /** @var \Statamic\Tokens\Token */
        if (! $token = TokenFacade::find($entry->id())) {
            $token = tap(
                TokenFacade::make(token: $entry->id(), handler: TokenHandler::class, data: [], cacheable: false),
                fn (Token $token) => $token->expireAt(now()->addMonths(6))->save()
            );
        }

        return $entry->absoluteUrl().'?token='.$token->token();
    }
}
