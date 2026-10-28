<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minCost(array $grid): int
    {
        $m = count($grid);
        $n = count($grid[0]);

        // XOR values are in [0, 1023], so we need 1024 bits = 32 ints.
        $WORDS = 32;

        // dp[$j] = bitset of possible XOR values for cell (previous row, $j)
        $dp = array_fill(0, $n, null);

        $left = null;

        for ($i = 0; $i < $m; $i++) {
            $left = null; // possible XOR values for cell (i, j - 1)

            for ($j = 0; $j < $n; $j++) {
                $val = $grid[$i][$j];

                if ($i === 0 && $j === 0) {
                    $res = array_fill(0, $WORDS, 0);
                    $res[$val >> 5] |= 1 << ($val & 31);
                } else {
                    $top = $dp[$j];

                    // Combine reachable XOR values from top and left cells.
                    $pre = array_fill(0, $WORDS, 0);

                    if ($top !== null) {
                        for ($w = 0; $w < $WORDS; $w++) {
                            $pre[$w] |= $top[$w];
                        }
                    }

                    if ($left !== null) {
                        for ($w = 0; $w < $WORDS; $w++) {
                            $pre[$w] |= $left[$w];
                        }
                    }

                    // XOR every reachable previous value with current cell value.
                    $res = array_fill(0, $WORDS, 0);

                    for ($x = 0; $x < 1024; $x++) {
                        if (($pre[$x >> 5] >> ($x & 31)) & 1) {
                            $y = $x ^ $val;
                            $res[$y >> 5] |= 1 << ($y & 31);
                        }
                    }
                }

                $dp[$j] = $res;
                $left = $res;
            }
        }

        // Find minimum reachable XOR value at the bottom-right cell.
        $last = $left;

        for ($x = 0; $x < 1024; $x++) {
            if (($last[$x >> 5] >> ($x & 31)) & 1) {
                return $x;
            }
        }

        return -1;
    }
}