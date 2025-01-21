<?php

class Solution {

    /**
     * @param Integer[] $derived
     * @return Boolean
     */
    function doesValidArrayExist($derived) {
        $xorSum = 0;

        // Compute the XOR of all elements in derived
        foreach ($derived as $value) {
            $xorSum ^= $value;
        }

        // If the XOR sum is 0, a valid original array exists
        return $xorSum === 0;
    }
}