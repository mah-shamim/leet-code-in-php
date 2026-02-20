<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeLargestSpecial(string $s): string
    {
        $len = strlen($s);
        if ($len == 0) {
            return "";
        }

        $primitives = [];
        $count = 0;
        $start = 0;

        for ($i = 0; $i < $len; $i++) {
            $count += ($s[$i] == '1') ? 1 : -1;
            if ($count == 0) {
                // found a primitive substring from $start to $i
                $inner = substr($s, $start + 1, $i - $start - 1);
                $transformed = '1' . $this->makeLargestSpecial($inner) . '0';
                $primitives[] = $transformed;
                $start = $i + 1;
            }
        }

        // sort primitives in descending lexicographic order
        usort($primitives, function($a, $b) {
            return strcmp($b, $a);
        });

        return implode('', $primitives);
    }
}