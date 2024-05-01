<?php

class Solution {

    /**
     * @param String $word
     * @param String $ch
     * @return String
     */
    function reversePrefix(string $word, string $ch): string
    {
        $pos = strpos($word, $ch);
        if ($pos !== false) {
            $prefix = substr($word, 0, $pos + 1);
            $reversedPrefix = strrev($prefix);
            $rest = substr($word, $pos + 1);
            return $reversedPrefix . $rest;
        }
        return $word;
    }
}