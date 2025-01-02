<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Float[] $succProb
     * @param Integer $start_node
     * @param Integer $end_node
     * @return Float
     */
    function maxProbability($n, $edges, $succProb, $start_node, $end_node) {
        // Create an adjacency list to represent the graph
        $graph = array_fill(0, $n, []);
        foreach ($edges as $i => $edge) {
            list($a, $b) = $edge;
            $graph[$a][] = [$b, $succProb[$i]];
            $graph[$b][] = [$a, $succProb[$i]];
        }

        // Initialize the maximum probabilities array
        $maxProb = array_fill(0, $n, 0.0);
        $maxProb[$start_node] = 1.0;

        // Use a max heap (priority queue) to explore the paths
        $pq = new SplPriorityQueue();
        $pq->insert([$start_node, 1.0], 1.0);

        // Dijkstra's algorithm to find the path with maximum probability
        while (!$pq->isEmpty()) {
            list($node, $prob) = $pq->extract();

            // If we reached the end node, return the probability
            if ($node == $end_node) {
                return $prob;
            }

            // Explore the neighbors
            foreach ($graph[$node] as $neighbor) {
                list($nextNode, $edgeProb) = $neighbor;
                $newProb = $prob * $edgeProb;
                if ($newProb > $maxProb[$nextNode]) {
                    $maxProb[$nextNode] = $newProb;
                    $pq->insert([$nextNode, $newProb], $newProb);
                }
            }
        }

        // If no path was found, return 0
        return 0.0;

    }
}