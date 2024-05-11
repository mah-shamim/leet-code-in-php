<?php

class Solution {

    /**
     * @param Integer[] $quality
     * @param Integer[] $wage
     * @param Integer $k
     * @return Float
     */
    function mincostToHireWorkers(array $quality, array $wage, int $k): float
    {
        $ans = PHP_INT_MAX;
        $qualitySum = 0;
        // (wagePerQuality, quality) sorted by wagePerQuality
        $workers = array();
        $maxHeap = new SplMaxHeap();

        for ($i = 0; $i < count($quality); ++$i) {
            $workers[$i] = array((double) $wage[$i] / $quality[$i], $quality[$i]);
        }

        usort($workers, function($a, $b) {
            return $a[0] <=> $b[0];
        });

        foreach ($workers as $worker) {
            $wagePerQuality = $worker[0];
            $q = $worker[1];
            $maxHeap->insert($q);
            $qualitySum += $q;
            if ($maxHeap->count() > $k) {
                $qualitySum -= $maxHeap->extract();
            }
            if ($maxHeap->count() == $k) {
                $ans = min($ans, $qualitySum * $wagePerQuality);
            }
        }

        return $ans;
    }
}