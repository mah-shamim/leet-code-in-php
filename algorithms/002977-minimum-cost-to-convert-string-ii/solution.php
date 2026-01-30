<?php

class Solution {

    /**
     * @param String $source
     * @param String $target
     * @param String[] $original
     * @param String[] $changed
     * @param Integer[] $cost
     * @return Integer
     */
    function minimumCost(string $source, string $target, array $original, array $changed, array $cost): int
    {
        $n = strlen($source);
        $m = count($original);
        $INF = PHP_INT_MAX / 2;

        // Step 1: Get all unique strings
        $allStrings = [];
        foreach ($original as $s) $allStrings[$s] = true;
        foreach ($changed as $s) $allStrings[$s] = true;

        $strToId = [];
        $id = 0;
        foreach (array_keys($allStrings) as $s) {
            $strToId[$s] = $id++;
        }

        $nodeCount = $id;

        // Step 2: Floyd-Warshall
        $dist = array_fill(0, $nodeCount, array_fill(0, $nodeCount, $INF));
        for ($i = 0; $i < $nodeCount; $i++) {
            $dist[$i][$i] = 0;
        }

        for ($i = 0; $i < $m; $i++) {
            $u = $strToId[$original[$i]];
            $v = $strToId[$changed[$i]];
            $dist[$u][$v] = min($dist[$u][$v], $cost[$i]);
        }

        // Optimized Floyd-Warshall
        for ($k = 0; $k < $nodeCount; $k++) {
            for ($i = 0; $i < $nodeCount; $i++) {
                if ($dist[$i][$k] == $INF) continue;
                for ($j = 0; $j < $nodeCount; $j++) {
                    if ($dist[$k][$j] == $INF) continue;
                    $newDist = $dist[$i][$k] + $dist[$k][$j];
                    if ($newDist < $dist[$i][$j]) {
                        $dist[$i][$j] = $newDist;
                    }
                }
            }
        }

        // Step 3: DP array
        $dp = array_fill(0, $n + 1, $INF);
        $dp[0] = 0;

        // Precompute lengths that exist in conversions
        $lengths = [];
        foreach ($original as $s) {
            $len = strlen($s);
            $lengths[$len] = true;
        }
        $lengths = array_keys($lengths);
        sort($lengths); // Sort lengths for early termination

        // Step 4: Main DP loop
        for ($i = 0; $i <= $n; $i++) {
            if ($dp[$i] == $INF) continue;

            // Try to match characters directly
            if ($i < $n && $source[$i] == $target[$i]) {
                $dp[$i + 1] = min($dp[$i + 1], $dp[$i]);
            }

            // Try all possible conversions starting at i
            foreach ($lengths as $len) {
                $end = $i + $len;
                if ($end > $n) continue;

                $srcSub = substr($source, $i, $len);
                $tgtSub = substr($target, $i, $len);

                // Skip if substrings are the same (already handled by direct match)
                if ($srcSub == $tgtSub) {
                    $dp[$end] = min($dp[$end], $dp[$i]);
                    continue;
                }

                // Check if we can convert
                if (isset($strToId[$srcSub]) && isset($strToId[$tgtSub])) {
                    $u = $strToId[$srcSub];
                    $v = $strToId[$tgtSub];
                    if ($dist[$u][$v] < $INF) {
                        $newCost = $dp[$i] + $dist[$u][$v];
                        if ($newCost < $dp[$end]) {
                            $dp[$end] = $newCost;
                        }
                    }
                }
            }
        }

        return $dp[$n] >= $INF ? -1 : $dp[$n];
    }
}