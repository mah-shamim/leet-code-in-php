<?php

class Solution {

    /**
     * @param String $num
     * @return Boolean
     */
    function sumGame(string $num): bool
    {
        $n = strlen($num);
        $ans = 0.0;

        for ($i = 0; $i < $n / 2; ++$i) {
            $ans += $this->getExpectation($num[$i]);
        }

        for ($i = $n / 2; $i < $n; ++$i) {
            $ans -= $this->getExpectation($num[$i]);
        }

        return $ans != 0.0;
    }

    /**
     * @param String $c
     * @return Float
     */
    private function getExpectation(string $c): float
    {
        return $c == '?' ? 4.5 : intval($c);
    }
}