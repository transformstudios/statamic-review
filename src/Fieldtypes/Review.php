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

        // when it's a new entry the "parent" might be a collection
        // in this case, we can't show it anyway so return empty
        if ($entry instanceof Collection) {
            return [];
        }

        // if there's a computed field in the entry's collection that uses augmentation,
        // this maybe be an empty entry, without an id
        if (is_null($entry->id())) {
            return [];
        }

        return ['site_url' => $this->url($entry)];
    }

    private function url(Entry $entry): string
    {
        /** @var \Statamic\Tokens\Token */
        if (! $token = TokenFacade::find($entry->id())) {
            $token = tap(
                TokenFacade::make(token: $entry->id(), handler: TokenHandler::class),
                fn (Token $token) => $token->expireAt(now()->addMonths(6))->save()
            );
        }

        return $entry->absoluteUrl().'?token='.$token->token();
    }
}
