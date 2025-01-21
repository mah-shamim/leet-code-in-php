<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minChanges($s) {
        $changes = 0;
        $n = strlen($s);

        for ($i = 0; $i < $n; $i += 2) {
            // Check the current block of two characters
            $first = $s[$i];
            $second = $s[$i + 1];

            if ($first !== $second) {
                // If they are different, we need one change
                $changes++;
            }
            // If they are the same, we do not need any changes
        }

        return $changes;
    }
}