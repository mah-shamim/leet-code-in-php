<?php

class Solution {

    private array $prefix = [];
    private int $m, $n;
    private int $threshold;

    /**
     * @param Integer[][] $mat
     * @param Integer $threshold
     * @return Integer
     */
    function maxSideLength(array $mat, int $threshold): int
    {
        $this->m = count($mat);
        $this->n = count($mat[0]);
        $this->threshold = $threshold;

        // Build prefix sum array with 1-indexed for easier calculations
        $this->prefix = array_fill(0, $this->m + 1, array_fill(0, $this->n + 1, 0));
        for ($i = 0; $i < $this->m; $i++) {
            for ($j = 0; $j < $this->n; $j++) {
                $this->prefix[$i + 1][$j + 1] = $mat[$i][$j]
                    + $this->prefix[$i][$j + 1]
                    + $this->prefix[$i + 1][$j]
                    - $this->prefix[$i][$j];
            }
        }

        // Binary search for the maximum side length
        $left = 0;
        $right = min($this->m, $this->n);
        while ($left < $right) {
            $mid = intval(($left + $right + 1) / 2);
            if ($this->isValid($mid)) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }
        return $left;
    }

    /**
     * @param int $side
     * @return bool
     */
    private function isValid(int $side): bool {
        for ($i = 0; $i + $side <= $this->m; $i++) {
            for ($j = 0; $j + $side <= $this->n; $j++) {
                $sum = $this->prefix[$i + $side][$j + $side]
                    - $this->prefix[$i][$j + $side]
                    - $this->prefix[$i + $side][$j]
                    + $this->prefix[$i][$j];
                if ($sum <= $this->threshold) {
                    return true;
                }
            }
        }
        return false;
    }
}