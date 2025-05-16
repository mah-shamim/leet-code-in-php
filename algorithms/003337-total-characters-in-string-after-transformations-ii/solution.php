<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $t
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthAfterTransformations($s, $t, $nums) {
        $mod = 1000000007;
        $matrix = $this->buildMatrix($nums, $mod);
        $power = $t - 1;
        $mat_pow = $this->matrix_power($matrix, $power, $mod);
        $total = 0;
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            $c = ord($s[$i]) - ord('a');
            $sum = 0;
            for ($d = 0; $d < 26; $d++) {
                $sum = ($sum + $mat_pow[$c][$d] * $nums[$d]) % $mod;
            }
            $total = ($total + $sum) % $mod;
        }
        return $total;
    }

    /**
     * @param $nums
     * @param $mod
     * @return array
     */
    function buildMatrix($nums, $mod) {
        $matrix = array_fill(0, 26, array_fill(0, 26, 0));
        for ($c = 0; $c < 26; $c++) {
            $k = $nums[$c];
            $start = ($c + 1) % 26;
            for ($i = 0; $i < $k; $i++) {
                $d = ($start + $i) % 26;
                $matrix[$c][$d] = ($matrix[$c][$d] + 1) % $mod;
            }
        }
        return $matrix;
    }

    /**
     * @param $a
     * @param $b
     * @param $mod
     * @return array
     */
    function matrix_multiply($a, $b, $mod) {
        $result = array_fill(0, 26, array_fill(0, 26, 0));
        for ($i = 0; $i < 26; $i++) {
            for ($k = 0; $k < 26; $k++) {
                if ($a[$i][$k] == 0) continue;
                for ($j = 0; $j < 26; $j++) {
                    $result[$i][$j] = ($result[$i][$j] + $a[$i][$k] * $b[$k][$j]) % $mod;
                }
            }
        }
        return $result;
    }

    /**
     * @param $mat
     * @param $power
     * @param $mod
     * @return array
     */
    function matrix_power($mat, $power, $mod) {
        $result = $this->matrix_identity();
        while ($power > 0) {
            if ($power % 2 == 1) {
                $result = $this->matrix_multiply($result, $mat, $mod);
            }
            $mat = $this->matrix_multiply($mat, $mat, $mod);
            $power = (int)($power / 2);
        }
        return $result;
    }

    /**
     * @return array
     */
    function matrix_identity() {
        $identity = array_fill(0, 26, array_fill(0, 26, 0));
        for ($i = 0; $i < 26; $i++) {
            $identity[$i][$i] = 1;
        }
        return $identity;
    }
}