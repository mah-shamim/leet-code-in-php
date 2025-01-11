<?php

class Solution {

    /**
     * @param Integer[][] $pairs
     * @return Integer[][]
     */
    function validArrangement($pairs) {
        // Graph representation: adjacency list
        $graph = [];
        // In-degree and Out-degree for each node
        $outDegree = [];
        $inDegree = [];

        // Build the graph and calculate in-degree and out-degree
        foreach ($pairs as $pair) {
            list($start, $end) = $pair;
            $graph[$start][] = $end;
            $outDegree[$start] = isset($outDegree[$start]) ? $outDegree[$start] + 1 : 1;
            $inDegree[$end] = isset($inDegree[$end]) ? $inDegree[$end] + 1 : 1;
        }

        // Find the start node for Eulerian path (a node with outDegree - inDegree = 1)
        $startNode = null;
        foreach ($outDegree as $node => $outCount) {
            $inCount = isset($inDegree[$node]) ? $inDegree[$node] : 0;
            if ($outCount - $inCount == 1) {
                $startNode = $node;
                break;
            }
        }

        // If no start node found, use any node from the graph as a start
        if ($startNode === null) {
            $startNode = key($graph); // Just get the first key
        }

        // Hierholzer's algorithm to find the Eulerian path
        $stack = [];
        $result = [];
        $currentNode = $startNode;
        while (count($stack) > 0 || isset($graph[$currentNode]) && count($graph[$currentNode]) > 0) {
            if (isset($graph[$currentNode]) && count($graph[$currentNode]) > 0) {
                // There are still edges to visit from current node
                $stack[] = $currentNode;
                $nextNode = array_pop($graph[$currentNode]);
                $currentNode = $nextNode;
            } else {
                // No more edges, add current node to result
                $result[] = [$stack[count($stack) - 1], $currentNode];
                $currentNode = array_pop($stack);
            }
        }

        // Since we built the path backwards, reverse it
        return array_reverse($result);
    }
}