<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function clearStars($s) {
        $s = str_split($s);
        $buckets = array_fill(0, 26, []);
        $n = count($s);

        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '*') {
                for ($j = 0; $j < 26; $j++) {
                    if (!empty($buckets[$j])) {
                        $index = array_pop($buckets[$j]);
                        $s[$index] = '';
                        $s[$i] = '';
                        break;
                    }
                }
            } else {
                $idx = ord($s[$i]) - ord('a');
                $buckets[$idx][] = $i;
            }
        }

        return implode('', $s);
    }
}