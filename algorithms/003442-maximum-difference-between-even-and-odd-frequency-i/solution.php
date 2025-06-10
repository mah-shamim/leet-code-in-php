<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxDifference($s) {
        $freq = array_count_values(str_split($s));
        $odd_freqs = [];
        $even_freqs = [];

        foreach ($freq as $count) {
            if ($count % 2 == 1) {
                $odd_freqs[] = $count;
            } else {
                $even_freqs[] = $count;
            }
        }

        $max_odd = max($odd_freqs);
        $min_even = min($even_freqs);

        return $max_odd - $min_even;
    }
}