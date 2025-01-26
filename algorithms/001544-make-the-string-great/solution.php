<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeGood(string $s): string
    {
        $ans = [];
        foreach(str_split($s) as $c) {
            if (!empty($ans) && $this->isBadPair(end($ans), $c)) {
                array_pop($ans);
            } else {
                $ans[] = $c;
            }
        }
        return implode('', $ans);
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    private function isBadPair($a, $b): bool
    {
        return $a != $b && strtolower($a) == strtolower($b);
    }
}
