<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @param Integer[][] $invocations
     * @return Integer[]
     */
    function remainingMethods(int $n, int $k, array $invocations): array
    {
        // Build adjacency list
        $graph = array_fill(0, $n, []);
        foreach ($invocations as $inv) {
            $graph[$inv[0]][] = $inv[1];
        }

        // Find all suspicious nodes (reachable from k)
        $suspicious = array_fill(0, $n, false);
        $queue = [$k];
        $suspicious[$k] = true;

        while (!empty($queue)) {
            $node = array_shift($queue);
            foreach ($graph[$node] as $neighbor) {
                if (!$suspicious[$neighbor]) {
                    $suspicious[$neighbor] = true;
                    $queue[] = $neighbor;
                }
            }
        }

        // Check if any non-suspicious method invokes a suspicious method
        foreach ($invocations as $inv) {
            $a = $inv[0];
            $b = $inv[1];
            if (!$suspicious[$a] && $suspicious[$b]) {
                // Can't remove suspicious methods
                return range(0, $n - 1);
            }
        }

        // Collect all non-suspicious methods
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            if (!$suspicious[$i]) {
                $result[] = $i;
            }
        }

        return $result;
    }
}