<?php

class Solution {

    /**
     * @param String $word
     * @param Integer $k
     * @return Integer
     */
    function possibleStringCount($word, $k) {
        $MOD = 1000000007;
        $runs = $this->getRuns($word);
        $n_runs = count($runs);

        $total_ways = 1;
        foreach ($runs as $len) {
            $total_ways = (int)(((float)$total_ways * $len) % $MOD);
        }

        if ($k <= $n_runs) {
            return $total_ways;
        }

        $dp = array_fill(0, $k, 0);
        $dp[0] = 1;
        $min_index = 0;

        foreach ($runs as $l) {
            if ($min_index >= $k) {
                break;
            }

            $prefix = array_fill(0, $k, 0);
            $prefix[0] = $dp[0];
            for ($i = 1; $i < $k; $i++) {
                $prefix[$i] = ($prefix[$i-1] + $dp[$i]) % $MOD;
            }

            $new_dp = array_fill(0, $k, 0);
            $start_t = $min_index + 1;
            if ($start_t < $k) {
                for ($t = $start_t; $t < $k; $t++) {
                    $term1 = $prefix[$t-1];
                    $term2 = 0;
                    $prev_index = $t - $l - 1;
                    if ($prev_index >= 0) {
                        $term2 = $prefix[$prev_index];
                    }
                    $val = ($term1 - $term2) % $MOD;
                    if ($val < 0) $val += $MOD;
                    $new_dp[$t] = $val;
                }
            }

            $dp = $new_dp;
            $min_index++;
        }

        $F = 0;
        for ($i = 0; $i < $k; $i++) {
            $F = ($F + $dp[$i]) % $MOD;
        }

        $ans = ($total_ways - $F) % $MOD;
        if ($ans < 0) $ans += $MOD;
        return $ans;
    }

    /**
     * @param $word
     * @return array
     */
    function getRuns($word) {
        $runs = array();
        $n = strlen($word);
        $i = 0;
        while ($i < $n) {
            $j = $i;
            while ($j < $n && $word[$j] == $word[$i]) {
                $j++;
            }
            $len = $j - $i;
            $runs[] = $len;
            $i = $j;
        }
        return $runs;
    }
}