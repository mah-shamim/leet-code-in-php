<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function largestLocal(array $grid): array
    {
        $n = count($grid);
        $ans = array_fill(0, $n - 2, array_fill(0, $n - 2, 0));

        for ($i = 0; $i < $n - 2; ++$i){
            for ($j = 0; $j < $n - 2; ++$j){
                for ($x = $i; $x < $i + 3; ++$x){
                    for ($y = $j; $y < $j + 3; ++$y){
                        $ans[$i][$j] = max($ans[$i][$j], $grid[$x][$y]);
                    }
                }
            }
        }

        return $ans;
    }
}