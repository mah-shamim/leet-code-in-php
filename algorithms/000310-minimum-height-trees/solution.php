<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findMinHeightTrees(int $n, array $edges): array
    {
        if ($n == 1 || empty($edges)) {
            return [0];
        }

        $ans = [];
        $graph = [];

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }

        foreach ($graph as $label => $children) {
            if (count($children) == 1) {
                $ans[] = $label;
            }
        }

        while ($n > 2) {
            $n -= count($ans);
            $nextLeaves = [];
            foreach ($ans as $leaf) {
                $u = current($graph[$leaf]);
                unset($graph[$u][array_search($leaf, $graph[$u])]);
                if (count($graph[$u]) == 1) {
                    $nextLeaves[] = $u;
                }
            }
            $ans = $nextLeaves;
        }

        return $ans;
    }
}