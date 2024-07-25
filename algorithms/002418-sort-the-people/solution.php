<?php

class Solution {

    /**
     * @param String[] $names
     * @param Integer[] $heights
     * @return String[]
     */
    function sortPeople($names, $heights) {
        // Combine names and heights into an array of pairs
        $combined = [];
        for ($i = 0; $i < count($names); $i++) {
            $combined[] = [$names[$i], $heights[$i]];
        }

        // Sort the combined array by heights in descending order
        usort($combined, function($a, $b) {
            return $b[1] - $a[1]; // Sort by height in descending order
        });

        // Extract the sorted names
        $sortedNames = [];
        foreach ($combined as $pair) {
            $sortedNames[] = $pair[0];
        }

        return $sortedNames;

    }
}