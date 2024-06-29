<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[][]
     */
    function getAncestors($n, $edges) {
        // Initialize adjacency list for the graph
        $adjacencyList = array_fill(0, $n, []);

        // Populate the adjacency list with reversed edges
        foreach ($edges as $edge) {
            $from = $edge[0];
            $to = $edge[1];
            $adjacencyList[$to][] = $from;
        }

        $ancestorsList = [];

        // For each node, find all its ancestors (children in reversed graph)
        for ($i = 0; $i < $n; $i++) {
            $ancestors = [];
            $visited = [];
            $this->findChildren($i, $adjacencyList, $visited);
            // Add visited nodes to the current nodes' ancestor list
            for ($node = 0; $node < $n; $node++) {
                if ($node == $i) continue;
                if (in_array($node, $visited))
                    $ancestors[] = $node;
            }
            $ancestorsList[] = $ancestors;
        }

        return $ancestorsList;
    }

    private function findChildren($currentNode, &$adjacencyList, &$visitedNodes) {
        // Mark current node as visited
        $visitedNodes[] = $currentNode;

        // Recursively traverse all neighbors
        foreach ($adjacencyList[$currentNode] as $neighbour) {
            if (!in_array($neighbour, $visitedNodes)) {
                $this->findChildren($neighbour, $adjacencyList, $visitedNodes);
            }
        }
    }
}