<?php

class Solution {

    /**
     * @param Integer[][] $graph
     * @return Integer[]
     */
    function eventualSafeNodes($graph) {
        $n = count($graph);
        $visited = array_fill(0, $n, 0); // 0: unvisited, 1: visiting, 2: safe

        // Check every node for safety
        $safeNodes = [];
        for ($i = 0; $i < $n; $i++) {
            if ($this->dfs($i, $graph, $visited) == 2) {
                $safeNodes[] = $i;
            }
        }

        return $safeNodes;
    }

    /**
     * DFS helper function
     *
     * @param $node
     * @param $graph
     * @param $visited
     * @return int|mixed
     */
    function dfs($node, $graph, &$visited) {
        if ($visited[$node] != 0) {
            return $visited[$node]; // Return the state (safe or unsafe)
        }

        $visited[$node] = 1; // Mark the node as visiting
        foreach ($graph[$node] as $neighbor) {
            // If the neighbor leads to an unsafe node, current node is unsafe
            if ($this->dfs($neighbor, $graph, $visited) == 1) {
                $visited[$node] = 1;
                return 1;
            }
        }

        $visited[$node] = 2; // Mark the node as safe
        return 2;
    }
}