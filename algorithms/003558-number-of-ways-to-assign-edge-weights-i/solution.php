<?php

class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer
     */
    function assignEdgeWeights(array $edges): int
    {
        $n = count($edges) + 1;
        $adj = array_fill(0, $n + 1, []);

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $adj[$u][] = $v;
            $adj[$v][] = $u;
        }

        $maxDepth = 0;

        $this->dfs(1, -1, 0, $adj, $maxDepth);

        $mod = 1000000007;
        return $this->powMod(2, $maxDepth - 1, $mod);
    }

    /**
     * @param $node
     * @param $parent
     * @param $depth
     * @param $adj
     * @param $maxDepth
     * @return void
     */
    function dfs($node, $parent, $depth, &$adj, &$maxDepth): void
    {
        $maxDepth = max($maxDepth, $depth);
        foreach ($adj[$node] as $neighbor) {
            if ($neighbor != $parent) {
                $this->dfs($neighbor, $node, $depth + 1, $adj, $maxDepth);
            }
        }
    }

    /**
     * @param $base
     * @param $exp
     * @param $mod
     * @return int
     */
    function powMod($base, $exp, $mod): int
    {
        $result = 1;
        while ($exp > 0) {
            if ($exp % 2 == 1) {
                $result = ($result * $base) % $mod;
            }
            $base = ($base * $base) % $mod;
            $exp = intdiv($exp, 2);
        }
        return $result;
    }
}