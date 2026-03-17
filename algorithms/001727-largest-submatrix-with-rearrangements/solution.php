<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return float|int
     */
    function largestSubmatrix(array $matrix): float|int
    {
        $m = count($matrix);
        $n = count($matrix[0]);
        $heights = array_fill(0, $n, 0);
        $maxArea = 0;

        for ($i = 0; $i < $m; $i++) {
            // update consecutive ones for each column
            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] == 1) {
                    $heights[$j]++;
                } else {
                    $heights[$j] = 0;
                }
            }

            // sort heights descending for this row
            $sorted = $heights;
            rsort($sorted);

            // compute maximum area for this row
            foreach ($sorted as $k => $h) {
                $area = $h * ($k + 1);
                if ($area > $maxArea) {
                    $maxArea = $area;
                }
            }
        }

        return $maxArea;
    }
}