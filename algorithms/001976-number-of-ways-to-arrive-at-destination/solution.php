<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function countPaths($n, $roads) {
        if ($n == 1) return 1;
        $mod = 1000000007;

        // Build adjacency list for Dijkstra's algorithm
        $adj = array_fill(0, $n, array());
        foreach ($roads as $road) {
            $u = $road[0];
            $v = $road[1];
            $t = $road[2];
            $adj[$u][] = array($v, $t);
            $adj[$v][] = array($u, $t);
        }

        // Dijkstra's algorithm to find shortest distances from node 0
        $dist = array_fill(0, $n, PHP_INT_MAX);
        $dist[0] = 0;
        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $pq->insert(array(0, 0), -0);

        while (!$pq->isEmpty()) {
            $elem = $pq->extract();
            $currentDist = -$elem['priority'];
            $u = $elem['data'][1];

            if ($currentDist > $dist[$u]) continue;

            foreach ($adj[$u] as $edge) {
                $v = $edge[0];
                $t = $edge[1];
                $newDist = $currentDist + $t;
                if ($newDist < $dist[$v]) {
                    $dist[$v] = $newDist;
                    $pq->insert(array($newDist, $v), -$newDist);
                }
            }
        }

        // Build the DAG adjacency list
        $dagAdj = array_fill(0, $n, array());
        foreach ($roads as $road) {
            $u = $road[0];
            $v = $road[1];
            $t = $road[2];
            if ($dist[$u] + $t == $dist[$v]) {
                $dagAdj[$u][] = $v;
            }
            if ($dist[$v] + $t == $dist[$u]) {
                $dagAdj[$v][] = $u;
            }
        }

        // Sort nodes based on their distance from 0
        $nodes = range(0, $n-1);
        usort($nodes, function ($a, $b) use ($dist) {
            return $dist[$a] - $dist[$b];
        });

        // Dynamic programming to count paths
        $dp = array_fill(0, $n, 0);
        $dp[0] = 1;
        foreach ($nodes as $u) {
            foreach ($dagAdj[$u] as $v) {
                $dp[$v] = ($dp[$v] + $dp[$u]) % $mod;
            }
        }

        return $dp[$n-1] % $mod;
    }
}