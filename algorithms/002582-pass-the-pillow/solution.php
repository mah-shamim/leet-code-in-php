<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $time
     * @return Integer
     */
    function passThePillow($n, $time) {
        $direction = 1;  // 1 for forward, -1 for backward
        $current = 0;    // Starting at the first person

        for ($i = 0; $i < $time; $i++) {
            $current += $direction;

            if ($current == $n - 1) {
                $direction = -1;  // Change direction to backward when reaching the last person
            } elseif ($current == 0) {
                $direction = 1;   // Change direction to forward when reaching the first person
            }
        }

        return $current + 1; // Convert to 1-based index
    }
}