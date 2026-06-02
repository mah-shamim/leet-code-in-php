<?php

class Solution {

    /**
     * @param Integer[] $landStartTime
     * @param Integer[] $landDuration
     * @param Integer[] $waterStartTime
     * @param Integer[] $waterDuration
     * @return Integer
     */
    function earliestFinishTime(array $landStartTime, array $landDuration, array $waterStartTime, array $waterDuration): int
    {
        $minFinish = PHP_INT_MAX;

        foreach ($landStartTime as $i => $startL) {
            $durL = $landDuration[$i];

            foreach ($waterStartTime as $j => $startW) {
                $durW = $waterDuration[$j];

                // Land first
                $finishLand = $startL + $durL;
                $startWater = max($finishLand, $startW);
                $finishLandFirst = $startWater + $durW;

                // Water first
                $finishWater = $startW + $durW;
                $startLand = max($finishWater, $startL);
                $finishWaterFirst = $startLand + $durL;

                $pairMin = min($finishLandFirst, $finishWaterFirst);
                if ($pairMin < $minFinish) {
                    $minFinish = $pairMin;
                }
            }
        }

        return $minFinish;
    }
}