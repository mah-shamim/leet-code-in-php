<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function removeCoveredIntervals(array $intervals): int
    {
        $count = count($intervals);
        $remaining = 0;

        for ($i = 0; $i < $count; $i++) {
            $covered = false;
            for ($j = 0; $j < $count; $j++) {
                if ($i !== $j) {
                    $a = $intervals[$i][0];
                    $b = $intervals[$i][1];
                    $c = $intervals[$j][0];
                    $d = $intervals[$j][1];

                    // Check if interval i is covered by interval j
                    if ($c <= $a && $b <= $d) {
                        $covered = true;
                        break;
                    }
                }
            }
            if (!$covered) {
                $remaining++;
            }
        }

        return $remaining;
    }
}