<?php

class Solution {

    /**
     * @param Integer $start
     * @param Integer $finish
     * @param Integer $limit
     * @param String $s
     * @return Integer
     */
    function numberOfPowerfulInt($start, $finish, $limit, $s) {
        $s_num = (int)$s;
        $s_len = strlen($s);
        $total = 0;

        // Check if the suffix itself is within the range
        if ($s_num >= $start && $s_num <= $finish) {
            $total += 1;
        }

        $pow10s = pow(10, $s_len);

        // Calculate upper bound for P
        $temp = $finish - $s_num;
        if ($temp < 0) {
            return $total;
        }
        $upper_p = (int)($temp / $pow10s);

        // No valid P if upper_p is less than 1
        if ($upper_p < 1) {
            return $total;
        }

        // Calculate lower bound for P
        $lower_p = 1;
        if ($start > $s_num) {
            $numerator = $start - $s_num;
            $lower_p = (int)ceil($numerator / $pow10s);
            $lower_p = max(1, $lower_p);
        }

        if ($lower_p > $upper_p) {
            return $total;
        }

        // Calculate the count of valid P in [lower_p, upper_p]
        $count_upper = $this->count_valid($upper_p, $limit);
        $count_lower = ($lower_p > 1) ? $this->count_valid($lower_p - 1, $limit) : 0;
        $count_p = $count_upper - $count_lower;

        $total += $count_p;

        return $total;
    }

    /**
     * Helper function to count valid numbers up to X with digits <= limit and no leading zeros
     *
     * @param $X
     * @param $limit
     * @return int|mixed
     */
    function count_valid($X, $limit) {
        if ($X < 1) {
            return 0;
        }

        $digits = str_split((string)$X);
        $n = count($digits);
        $memo = array();

        $dfs = function ($pos, $tight, $leading_zero, $digits, $limit, &$memo) use (&$dfs) {
            if ($pos == count($digits)) {
                return $leading_zero ? 0 : 1;
            }

            $key = "$pos," . ($tight ? '1' : '0') . "," . ($leading_zero ? '1' : '0');
            if (isset($memo[$key])) {
                return $memo[$key];
            }

            $max_digit = $tight ? (int)$digits[$pos] : 9;
            $max_digit = min($max_digit, $limit);

            $count = 0;
            for ($d = 0; $d <= $max_digit; $d++) {
                $new_tight = $tight && ($d == (int)$digits[$pos]);
                $new_leading_zero = $leading_zero && ($d == 0);

                if ($new_leading_zero) {
                    $count += $dfs($pos + 1, $new_tight, $new_leading_zero, $digits, $limit, $memo);
                } else {
                    // Check if we are transitioning from leading zero to non-zero
                    if ($leading_zero && $d != 0) {
                        if ($d > $limit) {
                            continue;
                        }
                        $count += $dfs($pos + 1, $new_tight, false, $digits, $limit, $memo);
                    } else {
                        $count += $dfs($pos + 1, $new_tight, false, $digits, $limit, $memo);
                    }
                }
            }

            $memo[$key] = $count;
            return $count;
        };

        return $dfs(0, true, true, $digits, $limit, $memo);
    }
}