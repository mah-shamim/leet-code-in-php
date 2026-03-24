<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function constructProductMatrix(array $grid): array
    {
        $mod = 12345;
        $n = count($grid);
        $m = count($grid[0]);
        $N = $n * $m;

        // flatten the matrix into a 1D array
        $flat = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $flat[] = $grid[$i][$j];
            }
        }

        // prefix products: prefix[i] = product of first i elements (i from 0 to N)
        $prefix = array_fill(0, $N + 1, 1);
        for ($i = 0; $i < $N; $i++) {
            $prefix[$i + 1] = ($prefix[$i] * $flat[$i]) % $mod;
        }

        // compute answer using suffix product on the fly
        $ans = array_fill(0, $N, 0);
        $suffix = 1;
        for ($i = $N - 1; $i >= 0; $i--) {
            $ans[$i] = ($prefix[$i] * $suffix) % $mod;
            $suffix = ($suffix * $flat[$i]) % $mod;
        }

        // reshape the answer into the original matrix dimensions
        $result = [];
        $idx = 0;
        for ($i = 0; $i < $n; $i++) {
            $row = [];
            for ($j = 0; $j < $m; $j++) {
                $row[] = $ans[$idx++];
            }
            $result[] = $row;
        }

        return $result;
    }
}