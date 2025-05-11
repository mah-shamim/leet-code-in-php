<?php

class Solution {

    /**
     * @param Integer[] $favorite
     * @return Integer
     */
    function maximumInvitations($favorite) {
        $n = count($favorite);

        // Step 1: Build graph and indegree array
        $indegree = array_fill(0, $n, 0);
        $graph = array_fill(0, $n, []);

        for ($i = 0; $i < $n; $i++) {
            $indegree[$favorite[$i]]++;
            $graph[$favorite[$i]][] = $i;
        }

        // Step 2: Process chains (using topological sort to find chains)
        $queue = [];
        for ($i = 0; $i < $n; $i++) {
            if ($indegree[$i] === 0) {
                $queue[] = $i;
            }
        }

        $chainLengths = array_fill(0, $n, 0);
        while (!empty($queue)) {
            $current = array_pop($queue);
            $fav = $favorite[$current];
            $chainLengths[$fav] = max($chainLengths[$fav], $chainLengths[$current] + 1);
            if (--$indegree[$fav] === 0) {
                $queue[] = $fav;
            }
        }

        // Step 3: Process cycles
        $visited = array_fill(0, $n, false);
        $maxCycleLength = 0;
        $totalChainSum = 0;

        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $current = $i;
                $cycleNodes = [];

                // Detect cycle
                while (!$visited[$current]) {
                    $visited[$current] = true;
                    $cycleNodes[] = $current;
                    $current = $favorite[$current];
                }

                // Check if we found a cycle
                if (in_array($current, $cycleNodes)) {
                    $cycleStartIndex = array_search($current, $cycleNodes);
                    $cycle = array_slice($cycleNodes, $cycleStartIndex);
                    $cycleLength = count($cycle);

                    if ($cycleLength == 2) {
                        // Handle special case of 2-length cycles (merge chains)
                        $node1 = $cycle[0];
                        $node2 = $cycle[1];
                        $totalChainSum += $chainLengths[$node1] + $chainLengths[$node2] + 2;
                    } else {
                        // Regular cycle
                        $maxCycleLength = max($maxCycleLength, $cycleLength);
                    }
                }
            }
        }

        return max($maxCycleLength, $totalChainSum);
    }
}