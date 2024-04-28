<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function sumOfDistancesInTree(int $n, array $edges): array
    {
        $g = array_fill(0, $n, array());
        foreach ($edges as $e) {
            $a = $e[0];
            $b = $e[1];
            array_push($g[$a], $b);
            array_push($g[$b], $a);
        }
        $ans = array_fill(0, $n, 0);
        $size = array_fill(0, $n, 0);

        $dfs1 = function ($i, $fa, $d) use (&$ans, &$size, &$g, &$dfs1) {
            $ans[0] += $d;
            $size[$i] = 1;
            foreach ($g[$i] as &$j) {
                if ($j != $fa) {
                    $dfs1($j, $i, $d + 1);
                    $size[$i] += $size[$j];
                }
            }
        };

        $dfs2 = function ($i, $fa, $t) use (&$ans, &$size, &$g, &$dfs2, $n) {
            $ans[$i] = $t;
            foreach ($g[$i] as &$j) {
                if ($j != $fa) {
                    $dfs2($j, $i, $t - $size[$j] + $n - $size[$j]);
                }
            }
        };

        $dfs1(0, -1, 0);
        $dfs2(0, -1, $ans[0]);
        return $ans;
    }
}