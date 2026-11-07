<?php

class Solution {

    /**
     * @param Integer[] $servers
     * @param Integer[] $tasks
     * @return Integer[]
     */
    function assignTasks(array $servers, array $tasks): array
    {
        $n = count($servers);

        // Available servers: min weight, then min index.
        // SplPriorityQueue is max-heap, so store negative priority.
        $available = new SplPriorityQueue();
        $available->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        // Busy servers: earliest free time first.
        $busy = new SplPriorityQueue();
        $busy->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        $base = $n + 1;

        for ($i = 0; $i < $n; $i++) {
            $priority = -($servers[$i] * $base + $i);
            $available->insert($i, $priority);
        }

        $ans = [];
        $currentTime = 0;

        foreach ($tasks as $j => $duration) {
            // Task j is inserted at second j.
            if ($currentTime < $j) {
                $currentTime = $j;
            }

            // Release all servers free by currentTime.
            while (!$busy->isEmpty()) {
                $top = $busy->top();
                if ($top[0] <= $currentTime) {
                    $item = $busy->extract();
                    $idx = $item[1];
                    $priority = -($servers[$idx] * $base + $idx);
                    $available->insert($idx, $priority);
                } else {
                    break;
                }
            }

            // If no server is free, wait until the earliest busy server is free.
            if ($available->isEmpty()) {
                $item = $busy->extract();
                $currentTime = max($currentTime, $item[0]);

                $idx = $item[1];
                $priority = -($servers[$idx] * $base + $idx);
                $available->insert($idx, $priority);

                // Release all other servers that become free at the same time.
                while (!$busy->isEmpty()) {
                    $top = $busy->top();
                    if ($top[0] <= $currentTime) {
                        $it = $busy->extract();
                        $idx2 = $it[1];
                        $priority2 = -($servers[$idx2] * $base + $idx2);
                        $available->insert($idx2, $priority2);
                    } else {
                        break;
                    }
                }
            }

            // Assign task to the best available server.
            $serverIndex = $available->extract();
            $ans[] = $serverIndex;

            $freeTime = $currentTime + $duration;
            $busy->insert([$freeTime, $serverIndex], -$freeTime);
        }

        return $ans;
    }
}