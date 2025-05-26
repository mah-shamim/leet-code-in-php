<?php

class Solution {

    /**
     * @param String $colors
     * @param Integer[][] $edges
     * @return Integer
     */
    function largestPathValue($colors, $edges) {
        $n = strlen($colors);
        $m = count($edges);

        $reverse_adj = array_fill(0, $n, array());
        $original_adj = array_fill(0, $n, array());
        $in_degree = array_fill(0, $n, 0);

        foreach ($edges as $edge) {
            $a = $edge[0];
            $b = $edge[1];
            $original_adj[$a][] = $b;
            $reverse_adj[$b][] = $a;
            $in_degree[$b]++;
        }

        $queue = new SplQueue();
        $top_order = array();

        for ($i = 0; $i < $n; $i++) {
            if ($in_degree[$i] == 0) {
                $queue->enqueue($i);
            }
        }

        while (!$queue->isEmpty()) {
            $u = $queue->dequeue();
            $top_order[] = $u;
            foreach ($original_adj[$u] as $v) {
                $in_degree[$v]--;
                if ($in_degree[$v] == 0) {
                    $queue->enqueue($v);
                }
            }
        }

        if (count($top_order) != $n) {
            return -1;
        }

        $dp = array();
        $max_color = 0;

        foreach ($top_order as $u) {
            $color = $colors[$u];
            $color_index = ord($color) - ord('a');
            $current_dp = array_fill(0, 26, 0);
            $current_dp[$color_index] = 1;

            foreach ($reverse_adj[$u] as $v) {
                for ($c = 0; $c < 26; $c++) {
                    $temp = $dp[$v][$c] + ($color_index == $c ? 1 : 0);
                    if ($temp > $current_dp[$c]) {
                        $current_dp[$c] = $temp;
                    }
                }
            }

            $current_max = max($current_dp);
            if ($current_max > $max_color) {
                $max_color = $current_max;
            }
            $dp[$u] = $current_dp;
        }

        return $max_color;
    }
}