<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function getBiggestThree(array $grid): array
    {
        $m = count($grid);
        $n = count($grid[0]);
        $sums = [];

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                // maximum possible size for this center
                $maxSize = min($i, $m - 1 - $i, $j, $n - 1 - $j);

                for ($size = 0; $size <= $maxSize; $size++) {
                    if ($size == 0) {
                        // single cell rhombus
                        $total = $grid[$i][$j];
                    } else {
                        $total = 0;
                        // iterate over all rows that belong to the border
                        for ($dr = -$size; $dr <= $size; $dr++) {
                            $absDr = abs($dr);
                            $rem = $size - $absDr; // remaining horizontal distance
                            $r = $i + $dr;
                            if ($rem == 0) {
                                // top or bottom vertex
                                $total += $grid[$r][$j];
                            } else {
                                // two symmetric cells on the same row
                                $total += $grid[$r][$j + $rem] + $grid[$r][$j - $rem];
                            }
                        }
                    }
                    $sums[] = $total;
                }
            }
        }

        // keep only distinct sums
        $unique = array_unique($sums);
        // sort descending
        rsort($unique);
        // return up to three largest
        return array_slice($unique, 0, 3);
    }
}