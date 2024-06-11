<?php

class Solution {

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        $result = array();
        // Traverse through the relative order array
        for ($i = 0; $i < count($arr2); $i++) {
            // Traverse through the target array
            for ($j = 0; $j < count($arr1); $j++) {
                // If element in target array matches with
                // relative order element
                if ($arr1[$j] == $arr2[$i]) {
                    // Add it to the result array
                    array_push($result, $arr1[$j]);
                    // Mark the element in target array as visited
                    $arr1[$j] = -1;
                }
            }
        }
        // Sort the remaining elements in the target array
        sort($arr1);
        // Add the remaining elements to the result array
        for ($i = 0; $i < count($arr1); $i++) {
            if ($arr1[$i] != -1) {
                array_push($result, $arr1[$i]);
            }
        }
        return $result;
    }
}