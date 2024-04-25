<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    public function longestIdealString(string $s, int $k): int
    {
        // dp[$i] := the longest subsequence that ends in ('a' + $i)
        $dp = array_fill(0, 26, 0);

        for ($i = 0; $i < strlen($s); $i++) {
            $c = $s[$i];
            $charIndex = ord($c) - ord('a');
            $dp[$charIndex] = 1 + $this->getMaxReachable($dp, $charIndex, $k);
        }

        return max($dp);
    }

    /**
     * @param $dp
     * @param $i
     * @param $k
     * @return int|mixed
     */
    private function getMaxReachable($dp, $i, $k) {
        $first = max(0, $i - $k);
        $last = min(25, $i + $k);
        $maxReachable = 0;
        for ($j = $first; $j <= $last; $j++) {
            $maxReachable = max($maxReachable, $dp[$j]);
        }
        return $maxReachable;
    }
}