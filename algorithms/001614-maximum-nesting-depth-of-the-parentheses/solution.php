<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxDepth($s) {
        $maxDepth = 0;
        $currentDepth = 0;
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            if ($s[$i] == '(') {
                $currentDepth++;
                if ($currentDepth > $maxDepth) {
                    $maxDepth = $currentDepth;
                }
            } elseif ($s[$i] == ')') {
                $currentDepth--;
            }
        }
        return $maxDepth;
    }
}