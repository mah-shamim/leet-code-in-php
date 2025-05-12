<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function findEvenNumbers($digits) {
        $original_freq = array_count_values($digits);
        $result = array();

        for ($num = 100; $num <= 998; $num += 2) {
            $num_str = (string)$num;
            $h = intval($num_str[0]);
            $t = intval($num_str[1]);
            $u = intval($num_str[2]);

            // Check if the hundreds digit is zero
            if ($h == 0) {
                continue;
            }

            $candidate_digits = array($h, $t, $u);
            $candidate_freq = array_count_values($candidate_digits);
            $valid = true;

            foreach ($candidate_freq as $digit => $count) {
                if (!isset($original_freq[$digit]) || $original_freq[$digit] < $count) {
                    $valid = false;
                    break;
                }
            }

            if ($valid) {
                array_push($result, $num);
            }
        }

        return $result;

    }
}