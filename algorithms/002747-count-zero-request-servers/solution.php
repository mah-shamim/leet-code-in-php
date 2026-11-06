<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $logs
     * @param Integer $x
     * @param Integer[] $queries
     * @return Integer[]
     */
    function countServers(int $n, array $logs, int $x, array $queries): array
    {
        // Sort logs by time
        usort($logs, function ($a, $b) {
            return $a[1] <=> $b[1];
        });

        // Store queries with original indices and sort by query time
        $sortedQueries = [];
        foreach ($queries as $i => $q) {
            $sortedQueries[] = [$q, $i];
        }

        usort($sortedQueries, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        $m = count($logs);
        $freq = array_fill(0, $n + 1, 0);
        $activeServers = 0;

        $left = 0;
        $right = 0;
        $ans = array_fill(0, count($queries), 0);

        foreach ($sortedQueries as [$q, $index]) {
            // Add all logs with time <= q
            while ($right < $m && $logs[$right][1] <= $q) {
                $serverId = $logs[$right][0];

                if ($freq[$serverId] === 0) {
                    $activeServers++;
                }

                $freq[$serverId]++;
                $right++;
            }

            // Remove logs with time < q - x
            $minTime = $q - $x;

            while ($left < $right && $logs[$left][1] < $minTime) {
                $serverId = $logs[$left][0];
                $freq[$serverId]--;

                if ($freq[$serverId] === 0) {
                    $activeServers--;
                }

                $left++;
            }

            // Servers with no request = total servers - active servers
            $ans[$index] = $n - $activeServers;
        }

        return $ans;
    }
}