<?php

class Solution {

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        $length = strlen($s);

        // Create a table to record if the substring s[i..j] is a palindrome.
        $palindromeTable = array_fill(0, $length, array_fill(0, $length, true));

        // Fill the palindromeTable using dynamic programming.
        for ($i = $length - 1; $i >= 0; $i--) {
            for ($j = $i + 1; $j < $length; $j++) {
                // A substring is a palindrome if its outer characters are equal
                // and if its inner substring is also a palindrome.
                $palindromeTable[$i][$j] = ($s[$i] == $s[$j]) && $palindromeTable[$i + 1][$j - 1];
            }
        }
        // Create a vector to store all palindrome partitioning results.
        $result = array();

        // Temporary vector to store current partitioning.
        $tempPartition = array();

        // Recursively search for palindrome partitions starting from index 0.
        $depthFirstSearch = function($start) use (&$depthFirstSearch, &$result, &$tempPartition, $s, $length, $palindromeTable) {

            // If we've reached the end of the string, add the current partitioning to results.
            if ($start == $length) {
                $result[] = $tempPartition;
                return;
            }

            // Explore all possible partitioning.
            for ($end = $start; $end < $length; $end++) {

                // If the substring starting from 'start' to 'end' is a palindrome
                if ($palindromeTable[$start][$end]) {

                    // Push the current palindrome substring to the temporary partitioning.
                    $tempPartition[] = substr($s, $start, $end - $start + 1);

                    // Move to the next part of the string.
                    $depthFirstSearch($end + 1);

                    // Backtrack to explore other partitioning possibilities.
                    array_pop($tempPartition);
                }
            }
        };

        // Start the depth-first search from the first character.
        $depthFirstSearch(0);

        // Return all the palindrome partitioning found.
        return $result;
    }
}