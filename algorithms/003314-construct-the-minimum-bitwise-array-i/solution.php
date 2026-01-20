<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function minBitwiseArray(array $nums): array
    {
        $ans = [];
        foreach ($nums as $n) {
            if ($n == 2) {
                $ans[] = -1;
                continue;
            }
            $found = false;
            for ($x = 0; $x < $n; $x++) {
                if (($x | ($x + 1)) == $n) {
                    $ans[] = $x;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $ans[] = -1;
            }
        }
        return $ans;
    }
}