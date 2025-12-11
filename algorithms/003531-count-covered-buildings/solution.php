<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $buildings
     * @return Integer
     */
    function countCoveredBuildings($n, $buildings) {
        $buildingStatus = [];
        $xMap = [];
        $yMap = [];

        // Group buildings by x and y
        foreach ($buildings as $building) {
            $x = $building[0];
            $y = $building[1];
            $key = $x . ',' . $y;

            $buildingStatus[$key] = [
                'above' => false,
                'below' => false,
                'left'  => false,
                'right' => false,
            ];

            $xMap[$x][] = $y;
            $yMap[$y][] = $x;
        }

        // Check vertical coverage (above/below)
        foreach ($xMap as $x => $yList) {
            sort($yList); // Sort ascending
            $count = count($yList);
            for ($i = 0; $i < $count; $i++) {
                $y = $yList[$i];
                $key = $x . ',' . $y;
                if ($i > 0) {
                    $buildingStatus[$key]['above'] = true; // Has building above
                }
                if ($i < $count - 1) {
                    $buildingStatus[$key]['below'] = true; // Has building below
                }
            }
        }

        // Check horizontal coverage (left/right)
        foreach ($yMap as $y => $xList) {
            sort($xList); // Sort ascending
            $count = count($xList);
            for ($i = 0; $i < $count; $i++) {
                $x = $xList[$i];
                $key = $x . ',' . $y;
                if ($i > 0) {
                    $buildingStatus[$key]['left'] = true; // Has building left
                }
                if ($i < $count - 1) {
                    $buildingStatus[$key]['right'] = true; // Has building right
                }
            }
        }

        // Count covered buildings
        $coveredCount = 0;
        foreach ($buildings as $building) {
            $key = $building[0] . ',' . $building[1];
            $status = $buildingStatus[$key];
            if ($status['above'] && $status['below'] && $status['left'] && $status['right']) {
                $coveredCount++;
            }
        }

        return $coveredCount;
    }
}