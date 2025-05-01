<?php

class Solution {

    /**
     * @param Integer[] $weights
     * @param Integer $k
     * @return Integer
     */
    function putMarbles($weights, $k) {
        $n = count($weights);
        if ($k == 1) {
            return 0;
        }

        $pairs = array();
        for ($i = 0; $i < $n - 1; $i++) {
            $pairs[] = $weights[$i] + $weights[$i + 1];
        }

        sort($pairs);
        $m = $k - 1;
        $min_sum = 0;
        $max_sum = 0;
        $pair_count = count($pairs);

        for ($i = 0; $i < $m; $i++) {
            $min_sum += $pairs[$i];
        }

        for ($i = $pair_count - 1; $i >= $pair_count - $m; $i--) {
            $max_sum += $pairs[$i];
        }

        return $max_sum - $min_sum;
    }
}