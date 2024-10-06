<?php

use Illuminate\Support\Facades\Session;

function validateAttributesText($text)
{
    if (strpos($text, ',') === false) {
        return $text;
    } else if (preg_match('/^\[(.*?)\]$/', $text, $matches)) {
        $attributes = explode(',', $matches[1]);
        $attributes = array_map('trim', $attributes);
        return $attributes;
    } else {
        Session::flash('error', 'Invalid format! Please edit again.');
        return false;
    }
}
