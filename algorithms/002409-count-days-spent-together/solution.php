<?php

class Solution {

    /**
     * @param String $arriveAlice
     * @param String $leaveAlice
     * @param String $arriveBob
     * @param String $leaveBob
     * @return Integer
     */
    function countDaysTogether(string $arriveAlice, string $leaveAlice, string $arriveBob, string $leaveBob): int
    {
        $daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $toDayOfYear = function (string $date) use ($daysInMonth): int {
            $month = (int) substr($date, 0, 2);
            $day = (int) substr($date, 3, 2);

            $dayOfYear = $day;
            for ($i = 0; $i < $month - 1; $i++) {
                $dayOfYear += $daysInMonth[$i];
            }

            return $dayOfYear;
        };

        $aliceStart = $toDayOfYear($arriveAlice);
        $aliceEnd = $toDayOfYear($leaveAlice);
        $bobStart = $toDayOfYear($arriveBob);
        $bobEnd = $toDayOfYear($leaveBob);

        $overlapStart = max($aliceStart, $bobStart);
        $overlapEnd = min($aliceEnd, $bobEnd);

        return max(0, $overlapEnd - $overlapStart + 1);
    }
}