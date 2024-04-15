<?php

class Solution
{

    /**
     * @param String $num
     * @param Integer $k
     * @return String
     */
    function removeKdigits(string $num, int $k): string
    {
        if (strlen($num) == $k) {
            return '0';
        }

        $ans = [];
        $stack = [];

        for ($i = 0; $i < strlen($num); $i++) {
            $digit = $num[$i];
            while ($k > 0 && !empty($stack) && $stack[count($stack) - 1] > $digit) {
                array_pop($stack);
                $k -= 1;
            }
            array_push($stack, $digit);
        }

        for ($j = 0; $j < $k; $j++) {
            array_pop($stack);
        }

        foreach ($stack as $c) {
            if ($c == '0' && empty($ans)) {
                continue;
            }
            array_push($ans, $c);
        }

        return implode($ans) ? implode($ans) : '0';
    }
}