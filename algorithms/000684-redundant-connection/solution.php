<?php

class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges) {
        $N = count($edges);

        // Initialize adjacency list
        $adjList = array_fill(0, $N, []);

        foreach ($edges as $edge) {
            $visited = array_fill(0, $N, false);

            // Check if adding the edge creates a cycle
            if ($this->isConnected($edge[0] - 1, $edge[1] - 1, $visited, $adjList)) {
                return $edge;
            }

            // Add the edge to the adjacency list
            $adjList[$edge[0] - 1][] = $edge[1] - 1;
            $adjList[$edge[1] - 1][] = $edge[0] - 1;
        }

        return [];
    }

    /**
     * Helper function to perform DFS and check connectivity
     *
     * @param $src
     * @param $target
     * @param $visited
     * @param $adjList
     * @return bool
     */
    private function isConnected($src, $target, &$visited, &$adjList) {
        $visited[$src] = true;

        if ($src === $target) {
            return true;
        }

        foreach ($adjList[$src] as $adj) {
            if (!$visited[$adj]) {
                if ($this->isConnected($adj, $target, $visited, $adjList)) {
                    return true;
                }
            }
        }

        return false;
    }
}