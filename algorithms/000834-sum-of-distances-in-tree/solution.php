<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function sumOfDistancesInTree($n, $edges) {
        // Build adjacency list
        $g = array_fill(0, $n, array());
        foreach ($edges as $e) {
            $a = $e[0];
            $b = $e[1];
            $g[$a][] = $b;
            $g[$b][] = $a;
        }

        // Arrays to store answers, subtree sizes, and visit status
        $ans = array_fill(0, $n, 0);
        $size = array_fill(0, $n, 0);

        // First DFS to calculate the size of each subtree and the distance for root
        $dfs1 = function ($i, $fa, $d) use (&$ans, &$size, &$g, &$dfs1) {
            $ans[0] += $d;
            $size[$i] = 1;
            foreach ($g[$i] as $j) {
                if ($j != $fa) {
                    $dfs1($j, $i, $d + 1);
                    $size[$i] += $size[$j];
                }
            }
        };

        // Second DFS to calculate the distance for all nodes
        $dfs2 = function ($i, $fa, $t) use (&$ans, &$size, &$g, &$dfs2, $n) {
            $ans[$i] = $t;
            foreach ($g[$i] as $j) {
                if ($j != $fa) {
                    $dfs2($j, $i, $t - $size[$j] + ($n - $size[$j]));
                }
            }
        };

        // Run the first DFS from node 0
        $dfs1(0, -1, 0);

        // Run the second DFS from node 0 with initial total distance
        $dfs2(0, -1, $ans[0]);

        return $ans;
    }
}