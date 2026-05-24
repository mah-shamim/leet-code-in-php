<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $d
     * @return Integer
     */
    function maxJumps(array $arr, int $d): int
    {
        $n = count($arr);
        $memo = array_fill(0, $n, 0);

        // Precompute reachable indices for each i
        $reachable = array_fill(0, $n, []);

        for ($i = 0; $i < $n; $i++) {
            // Left side
            for ($j = $i - 1; $j >= 0 && $i - $j <= $d; $j--) {
                if ($arr[$j] >= $arr[$i]) break;
                $reachable[$i][] = $j;
            }
            // Right side
            for ($j = $i + 1; $j < $n && $j - $i <= $d; $j++) {
                if ($arr[$j] >= $arr[$i]) break;
                $reachable[$i][] = $j;
            }
        }

        // Define DFS with memoization
        $dp = array_fill(0, $n, 0);

        $ans = 0;
        for ($i = 0; $i < $n; $i++) {
            $ans = max($ans, $this->dfs($i, $dp, $reachable));
        }

        return $ans;
    }

    /**
     * @param $i
     * @param $dp
     * @param $reachable
     * @return int|mixed
     */
    function dfs($i, &$dp, &$reachable): mixed
    {
        if ($dp[$i] != 0) return $dp[$i];

        $maxJumps = 1; // jump count including current index

        foreach ($reachable[$i] as $next) {
            $maxJumps = max($maxJumps, 1 + $this->dfs($next, $dp, $reachable));
        }

        $dp[$i] = $maxJumps;
        return $dp[$i];
    }
}