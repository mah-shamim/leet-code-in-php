<?php

class Solution {

    /**
     * @param String $text
     * @param String $brokenLetters
     * @return Integer
     */
    function canBeTypedWords($text, $brokenLetters) {
        $words = explode(' ', $text);
        $brokenSet = str_split($brokenLetters);
        $count = 0;
        foreach ($words as $word) {
            $canType = true;
            foreach (str_split($word) as $char) {
                if (in_array($char, $brokenSet)) {
                    $canType = false;
                    break;
                }
            }
            if ($canType) {
                $count++;
            }
        }
        return $count;
    }
}