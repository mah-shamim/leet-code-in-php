<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumLength($nums) {
        $count_even = 0;
        $count_odd = 0;
        $even_len = 0;
        $odd_len = 0;
        $n = count($nums);

        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] % 2 == 0) {
                $count_even++;
                $even_len = max($even_len, $odd_len + 1);
            } else {
                $count_odd++;
                $odd_len = max($odd_len, $even_len + 1);
            }
        }

        $candidate_same1 = ($count_even >= 2) ? $count_even : 0;
        $candidate_same2 = ($count_odd >= 2) ? $count_odd : 0;
        $candidate_same = max($candidate_same1, $candidate_same2);
        $candidate_alt = max($even_len, $odd_len);

        if ($candidate_alt < 2) {
            $candidate_alt = 0;
        }

        return max($candidate_same, $candidate_alt);
    }
}