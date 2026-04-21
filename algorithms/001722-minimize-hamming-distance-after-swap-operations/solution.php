<?php

class Solution {

    /**
     * @param Integer[] $source
     * @param Integer[] $target
     * @param Integer[][] $allowedSwaps
     * @return Integer
     */
    function minimumHammingDistance(array $source, array $target, array $allowedSwaps): int
    {
        $n = count($source);

        // DSU setup
        $parent = range(0, $n - 1);
        $rank = array_fill(0, $n, 1);

        $find = function($x) use (&$parent, &$find) {
            if ($parent[$x] != $x) {
                $parent[$x] = $find($parent[$x]);
            }
            return $parent[$x];
        };

        $union = function($x, $y) use (&$parent, &$rank, $find) {
            $rootX = $find($x);
            $rootY = $find($y);
            if ($rootX != $rootY) {
                if ($rank[$rootX] < $rank[$rootY]) {
                    $parent[$rootX] = $rootY;
                } elseif ($rank[$rootX] > $rank[$rootY]) {
                    $parent[$rootY] = $rootX;
                } else {
                    $parent[$rootY] = $rootX;
                    $rank[$rootX]++;
                }
            }
        };

        // Union allowed swaps
        foreach ($allowedSwaps as $swap) {
            $union($swap[0], $swap[1]);
        }

        // Group indices by component root
        $components = [];
        for ($i = 0; $i < $n; $i++) {
            $root = $find($i);
            $components[$root][] = $i;
        }

        $distance = 0;

        // For each component, count matches
        foreach ($components as $indices) {
            $srcVals = [];
            $tgtVals = [];

            foreach ($indices as $idx) {
                $srcVals[] = $source[$idx];
                $tgtVals[] = $target[$idx];
            }

            // Count frequency of source values
            $srcFreq = array_count_values($srcVals);
            $tgtFreq = array_count_values($tgtVals);

            $matches = 0;
            foreach ($srcFreq as $val => $cnt) {
                if (isset($tgtFreq[$val])) {
                    $matches += min($cnt, $tgtFreq[$val]);
                }
            }

            $distance += count($indices) - $matches;
        }

        return $distance;
    }
}