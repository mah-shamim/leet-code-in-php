<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function minCost(int $n, array $edges): int
    {
        // Build adjacency lists
        $adj = array_fill(0, $n, []);
        $reverseAdj = array_fill(0, $n, []);

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $w = $edge[2];

            $adj[$u][] = [$v, $w];
            $reverseAdj[$v][] = [$u, $w]; // For potential reversal
        }

        // Dijkstra with distance array for each node
        $dist = array_fill(0, $n, PHP_INT_MAX);
        $dist[0] = 0;

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        $pq->insert([0, 0, false], 0);

        $visited = [];

        while (!$pq->isEmpty()) {
            $current = $pq->extract();
            $cost = -$current[0];
            $u = $current[1];
            $usedSwitch = $current[2];

            $key = $u . '_' . ($usedSwitch ? '1' : '0');
            if (isset($visited[$key])) continue;
            $visited[$key] = true;

            // Check if we reached destination
            if ($u == $n - 1) {
                return $cost;
            }

            // Process original outgoing edges
            foreach ($adj[$u] as $edge) {
                $v = $edge[0];
                $w = $edge[1];
                $newCost = $cost + $w;
                $newKey = $v . '_0'; // Arriving at v, switch not used

                if (!isset($visited[$newKey]) && $newCost < $dist[$v]) {
                    $dist[$v] = $newCost;
                    $pq->insert([-$newCost, $v, false], -$newCost);
                }
            }

            // If we haven't used switch at current node, consider reversing
            if (!$usedSwitch) {
                foreach ($reverseAdj[$u] as $edge) {
                    $v = $edge[0]; // Original source, now destination after reversal
                    $w = $edge[1];
                    $newCost = $cost + 2 * $w;
                    $newKey = $v . '_0'; // Arriving at v, switch not used

                    if (!isset($visited[$newKey]) && $newCost < $dist[$v]) {
                        $dist[$v] = $newCost;
                        $pq->insert([-$newCost, $v, false], -$newCost);
                    }
                }
            }
        }

        return $dist[$n - 1] == PHP_INT_MAX ? -1 : $dist[$n - 1];
    }
}