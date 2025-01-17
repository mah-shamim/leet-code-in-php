<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxUniqueSplit($s) {
        // Call the backtracking function with an empty set and start index 0
        return $this->backtrack($s, [], 0);
    }

    /**
     * @param $s
     * @param $used
     * @param $start
     * @return int|mixed
     */
    private function backtrack($s, $used, $start) {
        // If we've reached the end of the string, return the size of the used set
        if ($start === strlen($s)) {
            return count($used);
        }

        $maxCount = 0;

        // Try to create substrings from start index to the end of the string
        for ($end = $start + 1; $end <= strlen($s); $end++) {
            // Get the current substring
            $substring = substr($s, $start, $end - $start);

            // Check if the substring is unique (not in the used set)
            if (!in_array($substring, $used)) {
                // Add the substring to the used set
                $used[] = $substring;

                // Recur for the next part of the string
                $maxCount = max($maxCount, $this->backtrack($s, $used, $end));

                // Backtrack: remove the last added substring
                array_pop($used);
            }
        }

        return $maxCount;
    }
}