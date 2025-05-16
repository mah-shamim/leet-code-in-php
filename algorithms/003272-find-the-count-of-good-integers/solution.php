<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function countGoodIntegers($n, $k) {
        $fact = array();
        $fact[0] = 1;
        for ($i = 1; $i <= 10; $i++) {
            $fact[$i] = $fact[$i - 1] * $i;
        }

        $palindromes = $this->generatePalindromes($n, $k);

        $multisets = array();
        foreach ($palindromes as $pal) {
            $counts = array_fill(0, 10, 0);
            for ($i = 0; $i < strlen($pal); $i++) {
                $d = intval($pal[$i]);
                $counts[$d]++;
            }
            $key = implode(',', $counts);
            if (!isset($multisets[$key])) {
                $multisets[$key] = $counts;
            }
        }

        $sum = 0;
        foreach ($multisets as $counts) {
            $denominator = 1;
            foreach ($counts as $c) {
                $denominator *= $fact[$c];
            }
            $total_perms = $fact[$n] / $denominator;

            $zero_leading = 0;
            if ($counts[0] > 0) {
                $new_counts = $counts;
                $new_counts[0]--;
                $denom_zero = 1;
                foreach ($new_counts as $c) {
                    $denom_zero *= $fact[$c];
                }
                if ($denom_zero != 0) {
                    $zero_leading = $fact[$n - 1] / $denom_zero;
                }
            }

            $valid_perms = $total_perms - $zero_leading;
            $sum += $valid_perms;
        }

        return $sum;
    }

    /**
     * @param $n
     * @param $k
     * @return array
     */
    function generatePalindromes($n, $k) {
        $palindromes = array();

        if ($n == 1) {
            for ($d = 1; $d <= 9; $d++) {
                if ($d % $k == 0) {
                    $palindromes[] = (string)$d;
                }
            }
            return $palindromes;
        }

        if ($n % 2 == 0) {
            $half = $n / 2;
            $start = pow(10, $half - 1);
            $end = pow(10, $half);
            for ($first_half = $start; $first_half < $end; $first_half++) {
                $s = (string)$first_half;
                $pal = $s . strrev($s);
                if (intval($pal) % $k == 0) {
                    $palindromes[] = $pal;
                }
            }
        } else {
            $half = ($n - 1) / 2;
            $start = pow(10, $half - 1);
            $end = pow(10, $half);
            for ($first_part = $start; $first_part < $end; $first_part++) {
                $s_part = (string)$first_part;
                for ($middle = 0; $middle <= 9; $middle++) {
                    $pal = $s_part . $middle . strrev($s_part);
                    if (intval($pal) % $k == 0) {
                        $palindromes[] = $pal;
                    }
                }
            }
        }

        return $palindromes;
    }
}