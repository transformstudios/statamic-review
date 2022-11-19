<?php

namespace TransformStudios\Review\Fieldtypes;

use Statamic\Entries\Collection;
use Statamic\Entries\Entry;
use Statamic\Facades\Token as TokenFacade;
use Statamic\Fields\Fieldtype;
use Statamic\Tokens\Token;
use TransformStudios\Review\TokenHandler;

class Review extends Fieldtype
{
    protected $component = 'copy_review_url';

    public function icon()
    {
        return file_get_contents(__DIR__.'/../../resources/svg/review-icon.svg');
    }

    public function preload()
    {
        if (! $entry = $this->field->parent()) {
            return [];
        }

        // when it's a new entry the "parent" is the collection
        // in this case, we can't show it anyway so return empty
        if ($entry instanceof Collection) {
            return [];
        }

        return [
            'site_url' => $this->makeUrl($entry),
            'has_revision' => $entry->hasWorkingCopy(),
        ];
    }

    private function makeUrl(Entry $entry): string
    {
        /** @var \Statamic\Tokens\Token */
        $token = tap(
            TokenFacade::make(token: null, handler: TokenHandler::class, data: ['id' => $entry->id()]),
            fn (Token $token) => $token
                    ->expireAt(now()->addMonths(6))
                    ->save()
        );

        return $entry->absoluteUrl().'?token='.$token->token();
    }
}
