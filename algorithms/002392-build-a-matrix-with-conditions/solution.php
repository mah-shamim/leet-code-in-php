<?php

class Solution {

    /**
     * @param Integer $k
     * @param Integer[][] $rowConditions
     * @param Integer[][] $colConditions
     * @return Integer[][]
     */
    function buildMatrix($k, $rowConditions, $colConditions) {
        // Topologically sort the row and column conditions
        $rowOrder = $this->topologicalSort($rowConditions, $k);
        $colOrder = $this->topologicalSort($colConditions, $k);

        if (empty($rowOrder) || empty($colOrder)) {
            return []; // No valid matrix possible
        }

        // Create a mapping from value to its index in the sorted order
        $rowPosition = array_flip($rowOrder);
        $colPosition = array_flip($colOrder);

        // Initialize the matrix
        $matrix = array_fill(0, $k, array_fill(0, $k, 0));

        // Place the elements in the matrix based on the sorted order
        for ($i = 1; $i <= $k; $i++) {
            $row = $rowPosition[$i];
            $col = $colPosition[$i];
            $matrix[$row][$col] = $i;
        }

        return $matrix;
    }

    // Helper function to perform topological sort
    function topologicalSort($conditions, $k) {
        $graph = array_fill(1, $k, []);
        $inDegree = array_fill(1, $k, 0);

        foreach ($conditions as $condition) {
            $graph[$condition[0]][] = $condition[1];
            $inDegree[$condition[1]]++;
        }

        $queue = [];
        for ($i = 1; $i <= $k; $i++) {
            if ($inDegree[$i] == 0) {
                $queue[] = $i;
            }
        }

        $sortedOrder = [];
        while (!empty($queue)) {
            $node = array_shift($queue);
            $sortedOrder[] = $node;
            foreach ($graph[$node] as $neighbor) {
                $inDegree[$neighbor]--;
                if ($inDegree[$neighbor] == 0) {
                    $queue[] = $neighbor;
                }
            }
        }

        if (count($sortedOrder) == $k) {
            return $sortedOrder;
        }

        return []; // Cycle detected
    }
}