<?php

class Solution {

    /**
     * @param String[] $bank
     * @return Integer
     */
    function numberOfBeams($bank) {
        $totalBeams = 0;
        $prevCount = 0;

        foreach ($bank as $row) {
            $currentCount = substr_count($row, '1');
            if ($currentCount > 0) {
                $totalBeams += $prevCount * $currentCount;
                $prevCount = $currentCount;
            }
        }

        return $totalBeams;
    }
}