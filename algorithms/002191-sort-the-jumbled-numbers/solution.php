<?php

class Solution {

    /**
     * @param Integer[] $mapping
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortJumbled($mapping, $nums) {
        // Create an array to store the mapped values along with original indices
        $mappedNums = [];
        for ($i = 0; $i < count($nums); $i++) {
            $mappedNums[] = ['original' => $nums[$i], 'mapped' => $this->mapNumber($nums[$i], $mapping)];
        }

        // Custom sorting function to sort based on mapped values and then by original index to maintain stability
        usort($mappedNums, function($a, $b) {
            if ($a['mapped'] == $b['mapped']) {
                return 0;
            }
            return ($a['mapped'] < $b['mapped']) ? -1 : 1;
        });

        // Extract the sorted original numbers
        $sortedNums = [];
        foreach ($mappedNums as $entry) {
            $sortedNums[] = $entry['original'];
        }

        return $sortedNums;

    }

    // Function to map a single number according to the given mapping
    function mapNumber($num, $mapping) {
        $strNum = strval($num);
        $mappedStr = "";
        for ($i = 0; $i < strlen($strNum); $i++) {
            $digit = intval($strNum[$i]);
            $mappedStr .= strval($mapping[$digit]);
        }
        return intval($mappedStr);
    }
}