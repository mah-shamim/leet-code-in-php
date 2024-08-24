<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findMinHeightTrees($n, $edges) {
        if ($n == 1 || empty($edges)) {
            return [0];
        }

        $ans = [];
        $graph = [];

        // Build the adjacency list
        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }

        // Initialize leaves
        foreach ($graph as $label => $children) {
            if (count($children) == 1) {
                $ans[] = $label;
            }
        }

        // Remove leaves layer by layer
        while ($n > 2) {
            $n -= count($ans);
            $nextLeaves = [];
            foreach ($ans as $leaf) {
                $u = current($graph[$leaf]); // There is only one neighbor since it's a leaf
                // Remove the leaf from its neighbor's adjacency list
                unset($graph[$u][array_search($leaf, $graph[$u])]);
                // If neighbor becomes a leaf, add it to newLeaves
                if (count($graph[$u]) == 1) {
                    $nextLeaves[] = $u;
                }
            }
            $ans = $nextLeaves;
        }

        return $ans;
    }
}