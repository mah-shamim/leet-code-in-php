<?php

class Solution {

    /**
     * @param Integer[][] $edges
     * @param Boolean[] $online
     * @param Integer $k
     * @return Integer
     */
    function findMaxPathScore(array $edges, array $online, int $k): int
    {
        $n = count($online);

        // Build graph adjacency list and compute in-degrees for topological sort
        $graph = array_fill(0, $n, []);
        $indegree = array_fill(0, $n, 0);
        $maxCost = 0;

        foreach ($edges as $e) {
            list($u, $v, $cost) = $e;
            $graph[$u][] = [$v, $cost];
            $indegree[$v]++;
            $maxCost = max($maxCost, $cost);
        }

        // Precompute topological order once
        $topo = [];
        $queue = new SplQueue();
        for ($i = 0; $i < $n; $i++) {
            if ($indegree[$i] == 0) {
                $queue->enqueue($i);
            }
        }
        while (!$queue->isEmpty()) {
            $u = $queue->dequeue();
            $topo[] = $u;
            foreach ($graph[$u] as [$v, $cost]) {
                if (--$indegree[$v] == 0) {
                    $queue->enqueue($v);
                }
            }
        }

        // Binary search for max score
        $low = 0;
        $high = $maxCost;
        $answer = -1;

        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($this->canAchieve($mid, $edges, $online, $k, $n, $topo)) {
                $answer = $mid;
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return $answer;
    }

    /**
     * @param $minCost
     * @param $edges
     * @param $online
     * @param $k
     * @param $n
     * @param $topo
     * @return bool
     */
    function canAchieve($minCost, $edges, $online, $k, $n, $topo): bool
    {
        // DP: min total cost to each node using edges with cost >= minCost
        $INF = PHP_INT_MAX;
        $dp = array_fill(0, $n, $INF);
        $dp[0] = 0;

        // Build adjacency for this check
        $adj = array_fill(0, $n, []);
        foreach ($edges as $e) {
            list($u, $v, $cost) = $e;
            if ($online[$u] && $online[$v] && $cost >= $minCost) {
                $adj[$u][] = [$v, $cost];
            }
        }

        // Process in topological order
        foreach ($topo as $u) {
            if ($dp[$u] == $INF) continue;
            foreach ($adj[$u] as [$v, $cost]) {
                $newCost = $dp[$u] + $cost;
                if ($newCost < $dp[$v]) {
                    $dp[$v] = $newCost;
                }
            }
        }

        return $dp[$n - 1] <= $k;
    }
}