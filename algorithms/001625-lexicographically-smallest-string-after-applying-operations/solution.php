<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $a
     * @param Integer $b
     * @return String
     */
    function findLexSmallestString($s, $a, $b) {
        $visited = array();
        $queue = array();
        array_push($queue, $s);
        $visited[$s] = true;
        $best = $s;

        while (!empty($queue)) {
            $current = array_shift($queue);

            // Update best if current is lexicographically smaller
            if (strcmp($current, $best) < 0) {
                $best = $current;
            }

            // Operation 1: Add a to all odd indices
            $newStr1 = "";
            for ($i = 0; $i < strlen($current); $i++) {
                if ($i % 2 == 1) {
                    $digit = intval($current[$i]);
                    $newDigit = ($digit + $a) % 10;
                    $newStr1 .= strval($newDigit);
                } else {
                    $newStr1 .= $current[$i];
                }
            }

            if (!array_key_exists($newStr1, $visited)) {
                $visited[$newStr1] = true;
                array_push($queue, $newStr1);
            }

            // Operation 2: Rotate right by b positions
            $n = strlen($current);
            $newStr2 = substr($current, $n - $b) . substr($current, 0, $n - $b);

            if (!array_key_exists($newStr2, $visited)) {
                $visited[$newStr2] = true;
                array_push($queue, $newStr2);
            }
        }

        return $best;
    }
}