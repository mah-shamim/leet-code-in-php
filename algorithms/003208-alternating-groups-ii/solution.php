<?php

class Solution {

    /**
     * @param Integer[] $colors
     * @param Integer $k
     * @return Integer
     */
    function numberOfAlternatingGroups($colors, $k) {
        $n = count($colors);
        if ($k > $n) {
            return 0;
        }
        $s = $k - 1;

        // Compute valid array
        $valid = array();
        for ($i = 0; $i < $n; $i++) {
            $j = ($i + 1) % $n;
            $valid[] = ($colors[$i] != $colors[$j]) ? 1 : 0;
        }

        // Check if all valid are 1
        $totalValid = array_sum($valid);
        if ($totalValid == $n) {
            return $n;
        }

        // Split into runs
        $runs = array();
        $current = $valid[0];
        $count = 1;
        for ($i = 1; $i < $n; $i++) {
            if ($valid[$i] == $current) {
                $count++;
            } else {
                $runs[] = array('val' => $current, 'len' => $count);
                $current = $valid[$i];
                $count = 1;
            }
        }
        $runs[] = array('val' => $current, 'len' => $count);

        // Merge first and last runs if both are 1
        if (!empty($runs)) {
            $first = $runs[0];
            $last = end($runs);
            if ($first['val'] == 1 && $last['val'] == 1) {
                $mergedLen = $first['len'] + $last['len'];
                $newRuns = array();
                $newRuns[] = array('val' => 1, 'len' => $mergedLen);
                $numRuns = count($runs);
                if ($numRuns > 2) {
                    for ($i = 1; $i < $numRuns - 1; $i++) {
                        $newRuns[] = $runs[$i];
                    }
                }
                $runs = $newRuns;
            }
        }

        // Calculate total valid windows
        $total = 0;
        foreach ($runs as $run) {
            if ($run['val'] == 1) {
                $L = $run['len'];
                if ($L >= $s) {
                    $total += $L - $s + 1;
                }
            }
        }

        return $total;
    }
}