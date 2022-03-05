<?php

use App\Models\Option;
use App\Models\Profil;
use Carbon\Carbon;
use Illuminate\Support\Str;

function changeDate($date)
{
    return Carbon::parse($date)->translatedFormat('l, d F Y');
}

function getTanggal($date)
{
    return Carbon::parse($date)->translatedFormat('d F Y');
}

if (! function_exists('getOption')) {
    function getOption() {
        $result = Option::first();
        return $result;
    }
}

if (! function_exists('getProfil')) {
    function getProfil() {
        $result = Profil::orderBy('order', 'asc')->get();
        return $result;
    }
}

if (! function_exists('convertYoutube')) {
    /**
     * @param string $text
     */
    function convertYoutube($link) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width='200px' height='100px' src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $link
        );
    }
}

if (! function_exists('convertYoutubeHomepage')) {
    /**
     * @param string $text
     */
    function convertYoutubeHomepage($link) {
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