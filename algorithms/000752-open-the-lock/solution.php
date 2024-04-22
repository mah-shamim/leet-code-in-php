<?php

class Solution {

    /**
     * @param String[] $deadends
     * @param String $target
     * @return Integer
     */
    function openLock(array $deadends, string $target): int
    {
        $seen = array_flip($deadends);
        if (isset($seen["0000"])) {
            return -1;
        }
        if ($target == "0000") {
            return 0;
        }

        $ans = 0;
        $q = ["0000"];

        while (!empty($q)) {
            $ans++;
            $sz = count($q);
            for ($i = 0; $i < $sz; $i++) {
                $word = array_shift($q);
                for ($j = 0; $j < 4; $j++) {
                    $cache = $word[$j];
                    $word[$j] = $word[$j] == '9' ? '0' : $word[$j] + 1;
                    if ($word == $target) {
                        return $ans;
                    }
                    if (!isset($seen[$word])) {
                        $q[] = $word;
                        $seen[$word] = true;
                    }
                    $word[$j] = $cache;
                    $word[$j] = $word[$j] == '0' ? '9' : $word[$j] - 1;
                    if ($word == $target) {
                        return $ans;
                    }
                    if (!isset($seen[$word])) {
                        $q[] = $word;
                        $seen[$word] = true;
                    }
                    $word[$j] = $cache;
                }
            }
        }

        return -1;
    }
}