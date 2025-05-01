<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer[] $queries
     * @return Integer[]
     */
    function maxPoints($grid, $queries) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $INF = PHP_INT_MAX;

        // Initialize distance array with INF, except the starting cell
        $dist = array_fill(0, $rows, array_fill(0, $cols, $INF));
        $dist[0][0] = $grid[0][0];

        // Priority queue to process cells in order of their current max value (min-heap)
        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $pq->insert([0, 0], -$dist[0][0]); // Using negative to simulate min-heap

        $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        while (!$pq->isEmpty()) {
            $element = $pq->extract();
            $current_max = -$element['priority'];
            $i = $element['data'][0];
            $j = $element['data'][1];

            // Skip if a shorter path (smaller max) was already found
            if ($current_max > $dist[$i][$j]) {
                continue;
            }

            foreach ($dirs as $d) {
                $ni = $i + $d[0];
                $nj = $j + $d[1];
                if ($ni >= 0 && $ni < $rows && $nj >= 0 && $nj < $cols) {
                    $new_max = max($current_max, $grid[$ni][$nj]);
                    if ($new_max < $dist[$ni][$nj]) {
                        $dist[$ni][$nj] = $new_max;
                        $pq->insert([$ni, $nj], -$new_max);
                    }
                }
            }
        }

        // Collect all minimal max values into a list and sort them
        $min_max_list = array();
        foreach ($dist as $row) {
            foreach ($row as $val) {
                $min_max_list[] = $val;
            }
        }
        sort($min_max_list);

        // Prepare answers for each query using binary search
        $answers = array();
        foreach ($queries as $q) {
            $low = 0;
            $high = count($min_max_list);
            while ($low < $high) {
                $mid = intdiv($low + $high, 2);
                if ($min_max_list[$mid] < $q) {
                    $low = $mid + 1;
                } else {
                    $high = $mid;
                }
            }
            $answers[] = $low;
        }

        return $answers;
    }
}