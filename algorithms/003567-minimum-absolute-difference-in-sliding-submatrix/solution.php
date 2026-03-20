<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer $k
     * @return Integer[][]
     */
    function minAbsDiff(array $grid, int $k): array
    {
        $m = count($grid);
        $n = count($grid[0]);
        $ans = [];

        // iterate over all top-left corners of k x k submatrices
        for ($i = 0; $i <= $m - $k; $i++) {
            $rowAns = [];
            for ($j = 0; $j <= $n - $k; $j++) {
                $values = [];

                // collect all elements of the current submatrix
                for ($x = $i; $x < $i + $k; $x++) {
                    for ($y = $j; $y < $j + $k; $y++) {
                        $values[] = $grid[$x][$y];
                    }
                }

                // keep only distinct values
                $unique = array_unique($values);

                if (count($unique) < 2) {
                    $rowAns[] = 0; // all elements are the same
                } else {
                    sort($unique);
                    $minDiff = PHP_INT_MAX;
                    for ($idx = 1; $idx < count($unique); $idx++) {
                        $diff = $unique[$idx] - $unique[$idx - 1];
                        if ($diff < $minDiff) {
                            $minDiff = $diff;
                        }
                    }
                    $rowAns[] = $minDiff;
                }
            }
            $ans[] = $rowAns;
        }

        return $ans;
    }
}