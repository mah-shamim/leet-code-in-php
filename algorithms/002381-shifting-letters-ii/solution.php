<?php

class Solution {

    /**
     * @param String $s
     * @param Integer[][] $shifts
     * @return String
     */
    function shiftingLetters($s, $shifts) {
        // Convert the string into an array of characters for easy manipulation
        $s = str_split($s);
        $n = count($s);

        // Create a shift array initialized to zero
        $shift = array_fill(0, $n + 1, 0);  // One extra element for boundary handling

        // Process each shift and mark the beginning and end of the shift
        foreach ($shifts as $shiftInfo) {
            list($start, $end, $direction) = $shiftInfo;
            $shift[$start] += ($direction == 1) ? 1 : -1;
            if ($end + 1 < $n) {
                $shift[$end + 1] -= ($direction == 1) ? 1 : -1;
            }
        }

        // Apply prefix sum to determine the total shift at each position
        $totalShift = 0;
        for ($i = 0; $i < $n; $i++) {
            $totalShift += $shift[$i];
            // Get the new character after shifting
            $currentChar = $s[$i];
            $shiftedChar = chr(((ord($currentChar) - ord('a') + $totalShift) % 26 + 26) % 26 + ord('a'));
            $s[$i] = $shiftedChar;
        }

        // Convert the array of characters back to a string and return
        return implode('', $s);
    }
}