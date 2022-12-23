<?php

namespace App\Library;

use Symfony\Component\HttpFoundation\Response;
use Spatie\ResponseCache\Replacers\Replacer;

class JwtTokenReplacer implements Replacer
{
    protected string $replacementString = '/<meta name="description" content="(.*)">/';


    public function prepareResponseToCache(Response $response): void
    {
        if (! $response->getContent()) {
            return;
        }
        // $response->setContent(preg_replace(
        //     '<meta name="token" content="'.session()->get('jwt').'" />',
        //     $this->replacementString,
        //     $response->getContent()
        // ));

        $content = str_replace(
            '<meta name="jwt" content="jwt" />',
            '<meta name="jwt" content="'.session()->get('jwt').'" />',
            $response->getContent()
        );



        $response->setContent($content);
    }

    public function replaceInCachedResponse(Response $response): void
    {
        if (! $response->getContent()) {
            return;
        }
        $dom = new \DOMDocument();

        @$dom->loadHTML($response->getContent());

        foreach ($dom->getElementsByTagName("meta") as $tag) {
            if (stripos($tag->getAttribute("name"), "jwt") !== false) {
                $tag->setAttribute("content", session()->get('jwt'));
            }
        }
        $view = $dom->saveHTML();

        $response->setContent($view);

    }
}
