<?php

class Solution {

    /**
     * @param Integer[][] $edges
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function assignEdgeWeights(array $edges, array $queries): array
    {
        $n = count($edges) + 1;
        $ans = [];

        // Build the graph
        $graph = array_fill(1, $n, []);
        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }

        // Prepare for LCA
        $LOG = ceil(log($n, 2)) + 1;
        $depth = array_fill(1, $n, 0);
        $parent = array_fill(0, $LOG, array_fill(1, $n, -1));

        // DFS to set up parents and depths
        $this->dfs(1, -1, $graph, $parent, $depth, 0);

        // Build binary lifting table
        for ($k = 1; $k < $LOG; $k++) {
            for ($v = 1; $v <= $n; $v++) {
                if ($parent[$k-1][$v] != -1) {
                    $parent[$k][$v] = $parent[$k-1][$parent[$k-1][$v]];
                }
            }
        }

        // Process each query
        foreach ($queries as $query) {
            $u = $query[0];
            $v = $query[1];

            if ($u == $v) {
                $ans[] = 0;
            } else {
                $lca = $this->lca($u, $v, $parent, $depth, $LOG);
                $dist = $depth[$u] + $depth[$v] - 2 * $depth[$lca];
                $ans[] = $this->modPow(2, $dist - 1);
            }
        }

        return $ans;
    }

    /**
     * @param $u
     * @param $p
     * @param $graph
     * @param $parent
     * @param $depth
     * @param $d
     * @return void
     */
    private function dfs($u, $p, &$graph, &$parent, &$depth, $d): void
    {
        $depth[$u] = $d;
        $parent[0][$u] = $p;

        foreach ($graph[$u] as $v) {
            if ($v != $p) {
                $this->dfs($v, $u, $graph, $parent, $depth, $d + 1);
            }
        }
    }

    /**
     * @param $u
     * @param $v
     * @param $parent
     * @param $depth
     * @param $LOG
     * @return mixed
     */
    private function lca($u, $v, &$parent, &$depth, $LOG): mixed
    {
        // Make u the deeper node
        if ($depth[$u] < $depth[$v]) {
            list($u, $v) = [$v, $u];
        }

        // Lift u up to v's depth
        $diff = $depth[$u] - $depth[$v];
        for ($k = 0; $k < $LOG; $k++) {
            if ($diff & (1 << $k)) {
                $u = $parent[$k][$u];
            }
        }

        if ($u == $v) {
            return $u;
        }

        // Lift both nodes up together
        for ($k = $LOG - 1; $k >= 0; $k--) {
            if ($parent[$k][$u] != -1 && $parent[$k][$u] != $parent[$k][$v]) {
                $u = $parent[$k][$u];
                $v = $parent[$k][$v];
            }
        }

        return $parent[0][$u];
    }

    /**
     * @param $x
     * @param $n
     * @return int
     */
    private function modPow($x, $n): int
    {
        $mod = 1000000007;
        if ($n == 0) return 1;
        if ($n % 2 == 1) {
            return ($x * $this->modPow($x % $mod, $n - 1)) % $mod;
        }
        $half = $this->modPow(($x * $x) % $mod, $n / 2);
        return $half;
    }
}