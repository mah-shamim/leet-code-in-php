<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer[] $values
     * @param Integer $k
     * @return Integer
     */
    function maxKDivisibleComponents($n, $edges, $values, $k) {
        $ans = 0;
        $graph = array_fill(0, $n, []);

        // Build the adjacency list for the graph
        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }

        // Start DFS traversal
        $this->dfs($graph, 0, -1, $values, $k, $ans);
        return $ans;
    }

    /**
     * DFS Function
     *
     * @param $graph
     * @param $node
     * @param $parent
     * @param $values
     * @param $k
     * @param $ans
     * @return array|bool|int|int[]|mixed|null
     */
    private function dfs($graph, $node, $parent, &$values, $k, &$ans) {
        $treeSum = $values[$node];

        foreach ($graph[$node] as $neighbor) {
            if ($neighbor !== $parent) {
                $treeSum += $this->dfs($graph, $neighbor, $node, $values, $k, $ans);
            }
        }

        // If the subtree sum is divisible by k, it forms a valid component
        if ($treeSum % $k === 0) {
            $ans++;
            return 0; // Reset sum for the current component
        }

        return $treeSum;
    }
}