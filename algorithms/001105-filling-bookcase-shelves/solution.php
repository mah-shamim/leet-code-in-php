<?php

class Solution {

    /**
     * @param Integer[][] $books
     * @param Integer $shelfWidth
     * @return Integer
     */
    function minHeightShelves($books, $shelfWidth) {
        $n = count($books);
        $dp = array_fill(0, $n + 1, PHP_INT_MAX);
        $dp[0] = 0;

        for ($i = 1; $i <= $n; $i++) {
            $width = 0;
            $height = 0;
            for ($j = $i; $j > 0; $j--) {
                $width += $books[$j - 1][0];
                if ($width > $shelfWidth) {
                    break;
                }
                $height = max($height, $books[$j - 1][1]);
                $dp[$i] = min($dp[$i], $dp[$j - 1] + $height);
            }
        }

        return $dp[$n];

    }
}