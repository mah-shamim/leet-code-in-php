<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function findKthBit($n, $k) {
        if ($n == 1) {
            return "0";
        }

        $mid = (1 << ($n - 1)); // 2^(n-1)

        if ($k == $mid) {
            return "1";
        } elseif ($k < $mid) {
            return $this->findKthBit($n - 1, $k);
        } else {
            $result = $this->findKthBit($n - 1, $mid * 2 - $k);
            return $result === "0" ? "1" : "0"; // Flip the bit
        }
    }
}