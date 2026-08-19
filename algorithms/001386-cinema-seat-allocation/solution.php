<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $reservedSeats
     * @return Integer
     */
    function maxNumberOfFamilies(int $n, array $reservedSeats): int
    {
        // Map to store reserved seats per row
        $reservedMap = [];

        foreach ($reservedSeats as $seat) {
            $row = $seat[0];
            $seatNum = $seat[1];
            $reservedMap[$row][$seatNum] = true;
        }

        $totalGroups = 0;

        // Process each row that has at least one reserved seat
        foreach ($reservedMap as $row => $seats) {
            $groupsForRow = 0;

            // Check left block: seats 2,3,4,5
            if (!isset($seats[2]) && !isset($seats[3]) && !isset($seats[4]) && !isset($seats[5])) {
                $groupsForRow++;
            }

            // Check right block: seats 6,7,8,9
            if (!isset($seats[6]) && !isset($seats[7]) && !isset($seats[8]) && !isset($seats[9])) {
                $groupsForRow++;
            }

            // If neither left nor right block can be used,
            // check middle block: seats 4,5,6,7
            if ($groupsForRow == 0) {
                if (!isset($seats[4]) && !isset($seats[5]) && !isset($seats[6]) && !isset($seats[7])) {
                    $groupsForRow = 1;
                }
            }

            $totalGroups += $groupsForRow;
        }

        // For rows without any reserved seats, we can fit 2 groups each
        $emptyRows = $n - count($reservedMap);
        $totalGroups += $emptyRows * 2;

        return $totalGroups;
    }
}