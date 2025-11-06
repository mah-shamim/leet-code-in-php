<?php

class Solution {

    /**
     * @param Integer $c
     * @param Integer[][] $connections
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function processQueries($c, $connections, $queries) {
        // Build graph
        $graph = array_fill(1, $c, []);
        foreach ($connections as $conn) {
            $graph[$conn[0]][] = $conn[1];
            $graph[$conn[1]][] = $conn[0];
        }

        // Find connected components using BFS
        $visited = array_fill(1, $c, false);
        $componentId = array_fill(1, $c, 0);
        $componentStations = [];
        $compId = 1;

        for ($i = 1; $i <= $c; $i++) {
            if (!$visited[$i]) {
                $queue = new SplQueue();
                $queue->enqueue($i);
                $visited[$i] = true;
                $componentId[$i] = $compId;
                $componentStations[$compId] = [$i];

                while (!$queue->isEmpty()) {
                    $current = $queue->dequeue();
                    foreach ($graph[$current] as $neighbor) {
                        if (!$visited[$neighbor]) {
                            $visited[$neighbor] = true;
                            $componentId[$neighbor] = $compId;
                            $componentStations[$compId][] = $neighbor;
                            $queue->enqueue($neighbor);
                        }
                    }
                }
                $compId++;
            }
        }

        // Create min-heaps for each component
        $componentHeaps = [];
        $online = array_fill(1, $c, true);

        foreach ($componentStations as $id => $stations) {
            $heap = new SplMinHeap();
            foreach ($stations as $station) {
                $heap->insert($station);
            }
            $componentHeaps[$id] = $heap;
        }

        $result = [];

        foreach ($queries as $query) {
            $type = $query[0];
            $station = $query[1];
            $compId = $componentId[$station];
            $heap = $componentHeaps[$compId];

            if ($type == 1) {
                // Maintenance check
                if ($online[$station]) {
                    $result[] = $station;
                } else {
                    // Find smallest operational station using lazy heap
                    while (!$heap->isEmpty() && !$online[$heap->top()]) {
                        $heap->extract();
                    }

                    if ($heap->isEmpty()) {
                        $result[] = -1;
                    } else {
                        $result[] = $heap->top();
                    }
                }
            } else {
                // Station goes offline
                $online[$station] = false;
            }
        }

        return $result;
    }
}