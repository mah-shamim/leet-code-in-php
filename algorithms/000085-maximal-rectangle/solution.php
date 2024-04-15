<?php

class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle(array $matrix): int
    {
        if (!$matrix) {
            return 0;
        }

        $result = 0;
        $m = count($matrix);
        $n = count($matrix[0]);
        $L = array_fill(0, $n, 0);
        $H = array_fill(0, $n, 0);
        $R = array_fill(0, $n, $n);

        for ($i = 0; $i < $m; $i++) {
            $left = 0;
            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] == '1') {
                    $L[$j] = max($L[$j], $left);
                    $H[$j] += 1;
                } else {
                    $L[$j] = 0;
                    $H[$j] = 0;
                    $R[$j] = $n;
                    $left = $j + 1;
                }
            }

            $right = $n;
            for ($j = $n - 1; $j >= 0; $j--) {
                if ($matrix[$i][$j] == '1') {
                    $R[$j] = min($R[$j], $right);
                    $result = max($result, $H[$j] * ($R[$j] - $L[$j]));
                } else {
                    $right = $j;
                }
            }
        }

        return $result;
    }
}