<?php

class Solution {

    /**
     * @param Integer[][] $edges1
     * @param Integer[][] $edges2
     * @return Integer
     */
    function minimumDiameterAfterMerge($edges1, $edges2) {
        // Construct adjacency list for Tree 1 and Tree 2
        $n = count($edges1) + 1;
        $m = count($edges2) + 1;

        $edgesTree1 = array_fill(0, $n, []);
        foreach ($edges1 as $edge) {
            list($a, $b) = $edge;
            $edgesTree1[$a][] = $b;
            $edgesTree1[$b][] = $a;
        }

        $edgesTree2 = array_fill(0, $m, []);
        foreach ($edges2 as $edge) {
            list($u, $v) = $edge;
            $edgesTree2[$u][] = $v;
            $edgesTree2[$v][] = $u;
        }

        // Find the diameter and center of both trees
        list($diameter1, $center1) = $this->getDiameterAndCenter($n, $edgesTree1);
        list($diameter2, $center2) = $this->getDiameterAndCenter($m, $edgesTree2);

        // Now find the longest paths in each tree from their respective centers
        list($distFromCenter1, $farthestFromCenter1) = $this->bfs($n, $edgesTree1, $center1);
        list($distFromCenter2, $farthestFromCenter2) = $this->bfs($m, $edgesTree2, $center2);

        // The result is the maximum of the 3 diameters
        return max($diameter1, $diameter2, $distFromCenter1[$farthestFromCenter1] + 1 + $distFromCenter2[$farthestFromCenter2]);
    }

    /**
     * Helper function to find the diameter of a tree and the farthest node from a start node
     *
     * @param $n
     * @param $edges
     * @param $start
     * @return array
     */
    function bfs($n, $edges, $start) {
        $dist = array_fill(0, $n, -1);
        $dist[$start] = 0;
        $queue = [$start];
        $farthestNode = $start;

        while (count($queue) > 0) {
            $node = array_shift($queue);
            foreach ($edges[$node] as $neighbor) {
                if ($dist[$neighbor] == -1) {
                    $dist[$neighbor] = $dist[$node] + 1;
                    $queue[] = $neighbor;
                    if ($dist[$neighbor] > $dist[$farthestNode]) {
                        $farthestNode = $neighbor;
                    }
                }
            }
        }
        return [$dist, $farthestNode];
    }

    /**
     * Helper function to find the diameter of a tree and its center
     *
     * @param $n
     * @param $edges
     * @return array
     */
    function getDiameterAndCenter($n, $edges) {
        // Find farthest node from an arbitrary node (node 0)
        list($distFromFirst, $farthestFromFirst) = $this->bfs($n, $edges, 0);

        // Find farthest node from the farthest node found (this gives the diameter's length)
        list($distFromFarthest, $farthestFromFarthest) = $this->bfs($n, $edges, $farthestFromFirst);

        // Now find the center (middle of the diameter)
        $path = [];
        $current = $farthestFromFarthest;
        while ($current != $farthestFromFirst) {
            $path[] = $current;
            foreach ($edges[$current] as $neighbor) {
                if ($distFromFarthest[$neighbor] == $distFromFarthest[$current] - 1) {
                    $current = $neighbor;
                    break;
                }
            }
        }
        $path[] = $farthestFromFirst;
        $diameterLength = $distFromFarthest[$farthestFromFarthest];
        $center = $path[floor(count($path) / 2)];

        return [$diameterLength, $center];
    }
}