<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function longestSubsequence($s, $k) {
        $n = strlen($s);
        $total_zeros = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '0') {
                $total_zeros++;
            }
        }
        $prefix_zeros = array_fill(0, $n + 1, 0);
        for ($i = 0; $i < $n; $i++) {
            $prefix_zeros[$i + 1] = $prefix_zeros[$i] + ($s[$i] == '0' ? 1 : 0);
        }
        $best = $total_zeros;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] != '1') {
                continue;
            }
            $cur_val = 1;
            $cur_len = 1;
            $zeros_before = $prefix_zeros[$i];
            for ($j = $i + 1; $j < $n; $j++) {
                if ($cur_val > $k) {
                    break;
                }
                if ($s[$j] == '0') {
                    $new_val = $cur_val * 2;
                    if ($new_val <= $k) {
                        $cur_val = $new_val;
                        $cur_len++;
                    }
                } else {
                    $new_val = $cur_val * 2 + 1;
                    if ($new_val <= $k) {
                        $cur_val = $new_val;
                        $cur_len++;
                    }
                }
            }
            $total_len = $zeros_before + $cur_len;
            if ($total_len > $best) {
                $best = $total_len;
            }
        }
        return $best;
    }
}