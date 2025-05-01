<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function punishmentNumber($n) {
        $sum = 0;
        for ($i = 1; $i <= $n; $i++) {
            $square = $i * $i;
            $s = strval($square);
            if ($this->canSplit($s, $i, 0, 0)) {
                $sum += $square;
            }
        }
        return $sum;
    }

    /**
     * @param $s
     * @param $target
     * @param $index
     * @param $currentSum
     * @return bool
     */
    function canSplit($s, $target, $index, $currentSum) {
        $len = strlen($s);
        if ($index == $len) {
            return $currentSum == $target;
        }
        for ($splitLength = 1; $splitLength <= $len - $index; $splitLength++) {
            $numStr = substr($s, $index, $splitLength);
            $num = intval($numStr);
            if ($currentSum + $num > $target) {
                break;
            }
            if ($this->canSplit($s, $target, $index + $splitLength, $currentSum + $num)) {
                return true;
            }
        }
        return false;
    }
}