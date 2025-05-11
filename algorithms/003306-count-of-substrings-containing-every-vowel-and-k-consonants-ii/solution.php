<?php

class Solution {

    /**
     * @param String $word
     * @param Integer $k
     * @return Integer
     */
    function countOfSubstrings($word, $k) {
        return $this->substringsWithAtMost($word, $k) - $this->substringsWithAtMost($word, $k - 1);
    }

    /**
     * @param $word
     * @param $k
     * @return int|mixed
     */
    function substringsWithAtMost($word, $k) {
        if ($k == -1) return 0;

        $n = strlen($word);
        $res = 0;
        $vowels = 0;
        $uniqueVowels = 0;
        $vowelLastSeen = [];
        $vowelList = ['a', 'e', 'i', 'o', 'u'];

        foreach ($vowelList as $v) {
            $vowelLastSeen[$v] = -1; // Initialize last seen positions
        }

        $left = 0;
        for ($right = 0; $right < $n; ++$right) {
            $char = $word[$right];

            if ($this->isVowel($char)) {
                $vowels++;
                if ($vowelLastSeen[$char] < $left) {
                    $uniqueVowels++;
                }
                $vowelLastSeen[$char] = $right;
            }

            // Adjust the left boundary if consonants exceed k
            while (($right - $left + 1 - $vowels) > $k) {
                $leftChar = $word[$left];

                if ($this->isVowel($leftChar)) {
                    $vowels--;
                    if ($vowelLastSeen[$leftChar] == $left) {
                        $uniqueVowels--;
                    }
                }
                $left++;
            }

            // Count substrings if all vowels are present
            if ($uniqueVowels == 5) {
                $minVowelIndex = min(array_values($vowelLastSeen));
                $res += ($minVowelIndex - $left + 1);
            }
        }

        return $res;
    }

    /**
     * @param $char
     * @return bool
     */
    function isVowel($char) {
        return strpos("aeiou", $char) !== false;
    }
}