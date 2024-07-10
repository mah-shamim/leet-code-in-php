<?php

class Solution {

    /**
     * @param String[] $logs
     * @return Integer
     */
    function minOperations($logs) {
        $depth = 0;

        foreach ($logs as $log) {
            if ($log == "../") {
                if ($depth > 0) {
                    $depth--;
                }
            } elseif ($log != "./") {
                $depth++;
            }
        }

        return $depth;
    }
}