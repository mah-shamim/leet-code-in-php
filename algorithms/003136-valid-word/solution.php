<?php

class Solution {

    /**
     * @param String $word
     * @return Boolean
     */
    function isValid($word) {
        $n = strlen($word);
        if ($n < 3) {
            return false;
        }

        for ($i = 0; $i < $n; $i++) {
            $c = $word[$i];
            if (!(($c >= 'a' && $c <= 'z') ||
                ($c >= 'A' && $c <= 'Z') ||
                ($c >= '0' && $c <= '9'))) {
                return false;
            }
        }

        $vowels = "aeiouAEIOU";
        $hasVowel = false;
        $hasConsonant = false;

        for ($i = 0; $i < $n; $i++) {
            $c = $word[$i];
            if (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z')) {
                if (strpos($vowels, $c) !== false) {
                    $hasVowel = true;
                } else {
                    $hasConsonant = true;
                }
            }
        }

        return $hasVowel && $hasConsonant;
    }
}