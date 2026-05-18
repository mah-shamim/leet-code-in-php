<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function minJumps(array $arr): int
    {
        $n = count($arr);
        if ($n == 1) return 0;

        // Build value → indices mapping
        $valToIndices = [];
        for ($i = 0; $i < $n; $i++) {
            $valToIndices[$arr[$i]][] = $i;
        }

        $visited = array_fill(0, $n, false);
        $queue = [[0, 0]]; // [index, distance]
        $visited[0] = true;

        while (!empty($queue)) {
            [$idx, $dist] = array_shift($queue);

            // Try idx - 1
            if ($idx - 1 >= 0 && !$visited[$idx - 1]) {
                if ($idx - 1 == $n - 1) return $dist + 1;
                $visited[$idx - 1] = true;
                $queue[] = [$idx - 1, $dist + 1];
            }

            // Try idx + 1
            if ($idx + 1 < $n && !$visited[$idx + 1]) {
                if ($idx + 1 == $n - 1) return $dist + 1;
                $visited[$idx + 1] = true;
                $queue[] = [$idx + 1, $dist + 1];
            }

            // Try same value indices
            if (isset($valToIndices[$arr[$idx]])) {
                foreach ($valToIndices[$arr[$idx]] as $j) {
                    if ($j != $idx && !$visited[$j]) {
                        if ($j == $n - 1) return $dist + 1;
                        $visited[$j] = true;
                        $queue[] = [$j, $dist + 1];
                    }
                }
                // Remove to avoid reprocessing
                unset($valToIndices[$arr[$idx]]);
            }
        }

        return -1; // unreachable (should not happen per problem constraints)
    }
}