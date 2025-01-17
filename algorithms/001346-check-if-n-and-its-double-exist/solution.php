<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function checkIfExist($arr) {
        $hashTable = array();

        foreach ($arr as $num) {
            // Check if double of the number exists in the hash table
            if (isset($hashTable[$num * 2])) {
                return true;
            }

            // Check if half of the number exists in the hash table (only if num is even)
            if ($num % 2 == 0 && isset($hashTable[$num / 2])) {
                return true;
            }

            // Add the current number to the hash table
            $hashTable[$num] = true;
        }

        return false;
    }
}