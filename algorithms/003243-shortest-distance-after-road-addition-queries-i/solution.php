<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function shortestDistanceAfterQueries($n, $queries) {
        // Initialize adjacency list for the graph
        $graph = array_fill(0, $n, []);
        for ($i = 0; $i < $n - 1; $i++) {
            $graph[$i][] = $i + 1; // Add the default unidirectional road
        }

        $result = [];

        // Process each query
        foreach ($queries as $query) {
            list($u, $v) = $query;
            $graph[$u][] = $v; // Add the new road

            // Calculate the shortest path from 0 to n-1 after adding this road
            $result[] = $this->bfs($graph, $n);
        }

        return $result;
    }

    /**
     * Function to find the shortest path using BFS
     *
     * @param $graph
     * @param $n
     * @return int
     */
    function bfs($graph, $n) {
        $queue = [[0, 0]]; // [current node, distance from source]
        $visited = array_fill(0, $n, false);
        $visited[0] = true;

        while (!empty($queue)) {
            list($node, $dist) = array_shift($queue);

            if ($node == $n - 1) {
                return $dist; // Found the shortest path to city n-1
            }

            foreach ($graph[$node] as $neighbor) {
                if (!$visited[$neighbor]) {
                    $visited[$neighbor] = true;
                    $queue[] = [$neighbor, $dist + 1];
                }
            }
        }

        return -1; // If there's no path (shouldn't happen in this problem)
    }

}