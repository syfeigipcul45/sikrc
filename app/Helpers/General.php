<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function changeDate($date)
{
    return Carbon::parse($date)->translatedFormat('l, d F Y');
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