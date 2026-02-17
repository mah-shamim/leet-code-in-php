<?php

class Solution {

    /**
     * @param Integer $turnedOn
     * @return String[]
     */
    function readBinaryWatch(int $turnedOn): array
    {
        $result = [];

        // Hours: 0-11 (4 bits)
        // Minutes: 0-59 (6 bits)
        for ($h = 0; $h < 12; $h++) {
            for ($m = 0; $m < 60; $m++) {
                // Count set bits in hour and minute
                $bitsHour = substr_count(decbin($h), '1');
                $bitsMinute = substr_count(decbin($m), '1');

                if ($bitsHour + $bitsMinute == $turnedOn) {
                    $result[] = sprintf("%d:%02d", $h, $m);
                }
            }
        }

        return $result;
    }
}