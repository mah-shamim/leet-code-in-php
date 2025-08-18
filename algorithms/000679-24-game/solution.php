<?php

class Solution {

    /**
     * @param Integer[] $cards
     * @return Boolean
     */
    function judgePoint24($cards) {
        return $this->judge($cards);
    }

    /**
     * @param $nums
     * @return bool
     */
    function judge($nums) {
        $n = count($nums);
        if ($n == 1) {
            return abs($nums[0] - 24) < 1e-6;
        }

        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $next = [];
                for ($k = 0; $k < $n; $k++) {
                    if ($k != $i && $k != $j) {
                        $next[] = $nums[$k];
                    }
                }

                $a = $nums[$i];
                $b = $nums[$j];
                $values = [
                    $a + $b,
                    $a * $b,
                    $a - $b,
                    $b - $a
                ];

                if (abs($b) > 1e-6) {
                    $values[] = $a / $b;
                }
                if (abs($a) > 1e-6) {
                    $values[] = $b / $a;
                }

                foreach ($values as $val) {
                    $nextArr = $next;
                    $nextArr[] = $val;
                    if ($this->judge($nextArr)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}