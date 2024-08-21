<?php

class Solution {

    /**
     * @param Integer[] $rating
     * @return Integer
     */
    function numTeams($rating) {
        $n = count($rating);
        $count = 0;

        for ($j = 1; $j < $n - 1; $j++) {
            $leftLess = $leftMore = $rightLess = $rightMore = 0;

            for ($i = 0; $i < $j; $i++) {
                if ($rating[$i] < $rating[$j]) $leftLess++;
                if ($rating[$i] > $rating[$j]) $leftMore++;
            }

            for ($k = $j + 1; $k < $n; $k++) {
                if ($rating[$k] < $rating[$j]) $rightLess++;
                if ($rating[$k] > $rating[$j]) $rightMore++;
            }

            $count += $leftLess * $rightMore + $leftMore * $rightLess;
        }

        return $count;
    }
}