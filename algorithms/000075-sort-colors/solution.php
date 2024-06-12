<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(array &$nums) {
        $l = 0;                // The next 0 should be placed in l.
        $r = count($nums) - 1;  // The next 2 should be placed in r.

        for ($i = 0; $i <= $r;) {
            if ($nums[$i] == 0) {
                list($nums[$i], $nums[$l]) = array($nums[$l], $nums[$i]);
                $i++;
                $l++;
            } elseif ($nums[$i] == 1) {
                $i++;
            } else {
                // We may swap a 0 to index i, but we're still not sure whether this 0
                // is placed in the correct index, so we can't move pointer i.
                list($nums[$i], $nums[$r]) = array($nums[$r], $nums[$i]);
                $r--;
            }
        }
    }
}