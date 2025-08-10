<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function reorderedPowerOf2($n) {
        $s = (string)$n;
        $len = strlen($s);
        $freq_n = $this->count_frequency($s);
        $p = "1";
        while (strlen($p) <= $len) {
            $current_len = strlen($p);
            if ($current_len == $len) {
                $freq_p = $this->count_frequency($p);
                if ($freq_p == $freq_n) {
                    return true;
                }
            }
            $p = $this->multiply_by_2($p);
        }
        return false;
    }

    /**
     * @param $s
     * @return array
     */
    private function count_frequency($s) {
        $freq = array_fill(0, 10, 0);
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            $digit = (int)$s[$i];
            $freq[$digit]++;
        }
        return $freq;
    }

    /**
     * @param $s
     * @return string
     */
    private function multiply_by_2($s) {
        $result = '';
        $carry = 0;
        $length = strlen($s);
        for ($i = $length - 1; $i >= 0; $i--) {
            $digit = (int)$s[$i];
            $product = $digit * 2 + $carry;
            $carry = (int)($product / 10);
            $digit_result = $product % 10;
            $result = (string)$digit_result . $result;
        }
        if ($carry) {
            $result = (string)$carry . $result;
        }
        return $result;
    }
}