<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxFreqSum($s) {
        $vowels = array('a', 'e', 'i', 'o', 'u');
        $freq = array();
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];
            if (!isset($freq[$char])) {
                $freq[$char] = 0;
            }
            $freq[$char]++;
        }

        $maxVowel = 0;
        $maxConsonant = 0;

        foreach ($freq as $char => $count) {
            if (in_array($char, $vowels)) {
                if ($count > $maxVowel) {
                    $maxVowel = $count;
                }
            } else {
                if ($count > $maxConsonant) {
                    $maxConsonant = $count;
                }
            }
        }

        return $maxVowel + $maxConsonant;
    }
}