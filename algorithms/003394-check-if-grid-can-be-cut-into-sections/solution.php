<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $rectangles
     * @return Boolean
     */
    function checkValidCuts($n, $rectangles) {
        $xs = array();
        $ys = array();

        foreach ($rectangles as $rect) {
            $startX = $rect[0];
            $startY = $rect[1];
            $endX = $rect[2];
            $endY = $rect[3];
            array_push($xs, array($startX, $endX));
            array_push($ys, array($startY, $endY));
        }

        $countX = $this->countMerged($xs);
        $countY = $this->countMerged($ys);
        return max($countX, $countY) >= 3;
    }

    /**
     * @param $intervals
     * @return int
     */
    private function countMerged($intervals) {
        $count = 0;
        $prevEnd = 0;

        usort($intervals, function($a, $b) {
            if ($a[0] < $b[0]) {
                return -1;
            } elseif ($a[0] > $b[0]) {
                return 1;
            } else {
                return 0;
            }
        });

        foreach ($intervals as $interval) {
            $start = $interval[0];
            $end = $interval[1];
            if ($start < $prevEnd) {
                $prevEnd = max($prevEnd, $end);
            } else {
                $prevEnd = $end;
                $count++;
            }
        }

        return $count;
    }
}