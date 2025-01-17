<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSquareStreak($nums) {
        // Step 1: Sort the array for ordered subsequences
        sort($nums);

        // Step 2: Create a set for quick existence checks
        $numSet = array_flip($nums); // Using array keys as a set

        $maxStreak = 0;

        // Step 3: Iterate over each number in the sorted array
        foreach ($nums as $num) {
            $currentStreak = 1;
            $currentNum = $num;

            // Check for the square streak
            while (isset($numSet[$currentNum * $currentNum])) {
                $currentNum = $currentNum * $currentNum;
                $currentStreak++;
            }

            // Update max streak if we found a longer one
            if ($currentStreak >= 2) {
                $maxStreak = max($maxStreak, $currentStreak);
            }
        }

        // Step 4: Return result
        return $maxStreak >= 2 ? $maxStreak : -1;
    }
}