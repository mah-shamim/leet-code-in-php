<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $x
     * @return Integer[]
     */
    function findXSum($nums, $k, $x) {
        $n = count($nums);
        $result = array();

        for ($i = 0; $i <= $n - $k; $i++) {
            $window = array_slice($nums, $i, $k);
            $freq = array();

            foreach ($window as $num) {
                if (!isset($freq[$num])) {
                    $freq[$num] = 0;
                }
                $freq[$num]++;
            }

            $distinct = array_keys($freq);
            usort($distinct, function($a, $b) use ($freq) {
                if ($freq[$a] == $freq[$b]) {
                    return $b - $a;
                }
                return $freq[$b] - $freq[$a];
            });

            $topX = array_slice($distinct, 0, $x);
            $sum = 0;
            foreach ($window as $num) {
                if (in_array($num, $topX)) {
                    $sum += $num;
                }
            }
            $result[] = $sum;
        }

        return $result;
    }
}