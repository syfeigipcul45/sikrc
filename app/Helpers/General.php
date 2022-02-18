<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function changeDate($date)
{
    return Carbon::parse($date)->translatedFormat('l, d F Y');
}

if (! function_exists('convertYoutube')) {
    /**
     * @param string $text
     */
    function convertYoutube($link) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $link
        );
    }
}

if (! function_exists('getYoutubeEmbedUrl')) {
    /**
     * @param string $text
     */
    function getYoutubeEmbedUrl($url) {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
}


if (! function_exists('shrinkText')) {
    function shrinkText($text) {
        return Str::limit($text, 225, '...');
    }
}

if (! function_exists('shrinkTitle')) {
    function shrinkTitle($text) {
        return Str::limit($text, 50, '...');
    }
}