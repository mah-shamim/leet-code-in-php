<?php

class Solution {

    /**
     * @param Integer[] $basket1
     * @param Integer[] $basket2
     * @return Integer
     */
    function minCost($basket1, $basket2) {
        $n = count($basket1);
        $totalFreq = [];
        for ($i = 0; $i < $n; $i++) {
            $totalFreq[$basket1[$i]] = ($totalFreq[$basket1[$i]] ?? 0) + 1;
            $totalFreq[$basket2[$i]] = ($totalFreq[$basket2[$i]] ?? 0) + 1;
        }

        foreach ($totalFreq as $count) {
            if ($count % 2 != 0) {
                return -1;
            }
        }

        $m1 = min($basket1);
        $m2 = min($basket2);
        $m = min($m1, $m2);

        $count1 = [];
        foreach ($basket1 as $fruit) {
            $count1[$fruit] = ($count1[$fruit] ?? 0) + 1;
        }

        $freq_swap = [];
        foreach ($totalFreq as $fruit => $total_count) {
            $c1 = $count1[$fruit] ?? 0;
            $net = $c1 - intdiv($total_count, 2);
            if ($net != 0) {
                $freq_swap[$fruit] = abs($net);
            }
        }

        $total_swap = 0;
        foreach ($freq_swap as $count) {
            $total_swap += $count;
        }
        $k = $total_swap / 2;

        if ($k == 0) {
            return 0;
        }

        $fruits_arr = array_keys($freq_swap);
        sort($fruits_arr);

        $ans = 0;
        $remaining = $k;
        foreach ($fruits_arr as $fruit) {
            $count = $freq_swap[$fruit];
            $take = min($count, $remaining);
            $ans += $take * min($fruit, 2 * $m);
            $remaining -= $take;
            if ($remaining <= 0) {
                break;
            }
        }

        return $ans;
    }
}