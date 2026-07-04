<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function minScore(int $n, array $roads): int
    {
        // Build adjacency list
        $adj = array_fill(1, $n, []);

        foreach ($roads as $road) {
            list($a, $b, $dist) = $road;
            $adj[$a][] = [$b, $dist];
            $adj[$b][] = [$a, $dist];
        }

        $visited = array_fill(1, $n, false);
        $minScore = PHP_INT_MAX;

        $dfs = function ($node) use (&$dfs, &$adj, &$visited, &$minScore) {
            $visited[$node] = true;

            foreach ($adj[$node] as $edge) {
                list($neighbor, $dist) = $edge;

                $minScore = min($minScore, $dist);

                if (!$visited[$neighbor]) {
                    $dfs($neighbor);
                }
            }
        };

        $dfs(1);

        return $minScore;
    }
}