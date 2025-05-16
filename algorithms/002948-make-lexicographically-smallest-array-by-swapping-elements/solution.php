<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $limit
     * @return Integer[]
     */
    function lexicographicallySmallestArray($nums, $limit) {
        $n = count($nums);
        $ans = array_fill(0, $n, 0);

        // Get pairs of (num, index), sorted by num
        $numAndIndexes = $this->getNumAndIndexes($nums);

        // Groups of [(num, index)] where the difference between numbers <= limit
        $numAndIndexesGroups = [];

        foreach ($numAndIndexes as $numAndIndex) {
            if (empty($numAndIndexesGroups) ||
                $numAndIndex[0] - end($numAndIndexesGroups[count($numAndIndexesGroups) - 1])[0] > $limit) {
                // Start a new group
                $numAndIndexesGroups[] = [$numAndIndex];
            } else {
                // Append to the existing group
                $numAndIndexesGroups[count($numAndIndexesGroups) - 1][] = $numAndIndex;
            }
        }

        // Sort each group and place the values in the correct positions
        foreach ($numAndIndexesGroups as $numAndIndexesGroup) {
            $sortedNums = [];
            $sortedIndices = [];

            foreach ($numAndIndexesGroup as $pair) {
                $sortedNums[] = $pair[0];
                $sortedIndices[] = $pair[1];
            }

            // Sort the indices and the values independently
            sort($sortedNums);
            sort($sortedIndices);

            // Assign sorted values to the respective indices in the answer
            for ($i = 0; $i < count($sortedNums); $i++) {
                $ans[$sortedIndices[$i]] = $sortedNums[$i];
            }
        }

        return $ans;
    }

    /**
     * @param $nums
     * @return array
     */
    function getNumAndIndexes($nums) {
        $numAndIndexes = [];
        foreach ($nums as $index => $num) {
            $numAndIndexes[] = [$num, $index];
        }
        usort($numAndIndexes, function($a, $b) {
            return $a[0] <=> $b[0];
        });
        return $numAndIndexes;
    }
}