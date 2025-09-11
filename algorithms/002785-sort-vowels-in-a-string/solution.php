<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function sortVowels($s) {
        $vowels = [];
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            $c = $s[$i];
            if ($this->isVowel($c)) {
                $vowels[] = $c;
            }
        }
        sort($vowels);
        $j = 0;
        $result = '';
        for ($i = 0; $i < $n; $i++) {
            $c = $s[$i];
            if ($this->isVowel($c)) {
                $result .= $vowels[$j++];
            } else {
                $result .= $c;
            }
        }
        return $result;
    }

    /**
     * @param $c
     * @return bool
     */
    function isVowel($c) {
        return strpos('aeiouAEIOU', $c) !== false;
    }
}