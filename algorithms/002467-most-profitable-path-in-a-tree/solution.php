<?php

class Solution {

    /**
     * @param Integer[][] $edges
     * @param Integer $bob
     * @param Integer[] $amount
     * @return Integer
     */
    function mostProfitablePath($edges, $bob, $amount) {
        // Build adjacency list
        $adj = [];
        foreach ($edges as $e) {
            $u = $e[0];
            $v = $e[1];
            if (!isset($adj[$u])) $adj[$u] = [];
            if (!isset($adj[$v])) $adj[$v] = [];
            $adj[$u][] = $v;
            $adj[$v][] = $u;
        }

        $n = count($adj);
        $parent = array_fill(0, $n, -1);
        $visited = array_fill(0, $n, false);
        $queue = new SplQueue();
        $queue->enqueue(0);
        $visited[0] = true;

        // BFS to find parent pointers
        while (!$queue->isEmpty()) {
            $u = $queue->dequeue();
            foreach ($adj[$u] as $v) {
                if (!$visited[$v] && $v != $parent[$u]) {
                    $parent[$v] = $u;
                    $visited[$v] = true;
                    $queue->enqueue($v);
                }
            }
        }

        // Get Bob's path and time
        $bob_path = [];
        $current = $bob;
        while ($current != -1) {
            $bob_path[] = $current;
            $current = $parent[$current];
        }

        $bob_time = [];
        $time = 0;
        foreach ($bob_path as $node) {
            $bob_time[$node] = $time++;
        }

        // Iterative DFS to find max sum
        $max_sum = PHP_INT_MIN;
        $stack = [[0, -1, 0, 0]]; // [node, parent, sum, depth]

        while (!empty($stack)) {
            $element = array_pop($stack);
            list($u, $p, $sum, $depth) = $element;

            // Calculate contribution for current node
            if (isset($bob_time[$u])) {
                $alice_time = $depth;
                $b_time = $bob_time[$u];
                if ($alice_time < $b_time) {
                    $add_val = $amount[$u];
                } elseif ($alice_time == $b_time) {
                    $add_val = $amount[$u] / 2;
                } else {
                    $add_val = 0;
                }
            } else {
                $add_val = $amount[$u];
            }

            $new_sum = $sum + $add_val;

            // Check if it's a leaf node
            $is_leaf = ($u != 0) && (count($adj[$u]) == 1);

            if ($is_leaf) {
                if ($new_sum > $max_sum) {
                    $max_sum = $new_sum;
                }
            } else {
                // Push children to stack
                foreach ($adj[$u] as $v) {
                    if ($v != $p) {
                        array_push($stack, [$v, $u, $new_sum, $depth + 1]);
                    }
                }
            }
        }

        return $max_sum;
    }
}