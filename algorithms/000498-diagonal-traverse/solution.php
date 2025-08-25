<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer[]
     */
    function findDiagonalOrder($mat) {
        $m = count($mat);
        $n = count($mat[0]);
        $result = [];
        $maxSum = $m + $n - 2;

        for ($s = 0; $s <= $maxSum; $s++) {
            if ($s % 2 == 0) {
                $i = min($s, $m - 1);
                $j = $s - $i;
                while ($i >= 0 && $j < $n) {
                    $result[] = $mat[$i][$j];
                    $i--;
                    $j++;
                }
            } else {
                $j = min($s, $n - 1);
                $i = $s - $j;
                while ($i < $m && $j >= 0) {
                    $result[] = $mat[$i][$j];
                    $i++;
                    $j--;
                }
            }
        }

        return $result;
    }
}