<?php

if (!function_exists('highlightQuery')) {
    function highlightQuery($text, $query)
    {
        return str_replace($query, "<span class='highlight'>$query</span>", $text);
    }
}
