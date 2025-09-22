<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxFrequencyElements($nums) {
        $freqs = array_count_values($nums);
        $maxFreq = max($freqs);
        $count = 0;
        foreach ($freqs as $f) {
            if ($f == $maxFreq) {
                $count++;
            }
        }
        return $maxFreq * $count;
    }
}