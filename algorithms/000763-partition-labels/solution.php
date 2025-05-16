<?php

class Solution {

    /**
     * @param String $s
     * @return Integer[]
     */
    function partitionLabels($s) {
        $last = array();
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];
            $last[$char] = $i;
        }

        $result = array();
        $start = 0;
        $end = 0;

        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];
            $end = max($end, $last[$char]);
            if ($i == $end) {
                array_push($result, $end - $start + 1);
                $start = $end + 1;
            }
        }

        return $result;
    }
}