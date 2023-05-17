<?php

namespace TransformStudios\Review\Support;

use Statamic\Entries\Entry;
use Statamic\Facades\Token as TockenFacade;
use Statamic\Tokens\Token;
use TransformStudios\Review\TokenHandler;

class URL
{
    public static function reviewUrl(Entry $entry): string
    {
        /** @var \Statamic\Tokens\Token */
        $token = tap(
            TockenFacade::make(
                token: null,
                handler: TokenHandler::class,
                data: ['id' => $entry->id()]
            ),
            fn (Token $token) => $token
                ->expireAt(now()->addMonths(6))
                ->save()
        );

        return $entry->absoluteUrl().'?token='.$token->token();
    }
}
