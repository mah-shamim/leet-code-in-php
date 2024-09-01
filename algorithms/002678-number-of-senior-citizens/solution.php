<?php

class Solution {

    /**
     * @param String[] $details
     * @return Integer
     */
    function countSeniors($details) {
        $seniorCount = 0;

        foreach ($details as $detail) {
            // Extract the age part of the string
            $age = intval(substr($detail, 11, 2));

            // Check if the age is strictly greater than 60
            if ($age > 60) {
                $seniorCount++;
            }
        }

        return $seniorCount;

    }
}