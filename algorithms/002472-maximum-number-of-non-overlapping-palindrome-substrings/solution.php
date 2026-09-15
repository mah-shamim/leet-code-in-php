<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxPalindromes(string $s, int $k): int
    {
        $n = strlen($s);

        // Precompute all palindromic substrings with length >= k
        // palindromes[i] = list of start positions of palindromes ending at i
        $palindromesEndingAt = array_fill(0, $n, []);

        // Expand around centers to find all palindromes
        for ($center = 0; $center < $n; $center++) {
            // Odd length palindromes
            $this->expandAroundCenter($s, $center, $center, $k, $palindromesEndingAt, $n);

            // Even length palindromes
            if ($center + 1 < $n) {
                $this->expandAroundCenter($s, $center, $center + 1, $k, $palindromesEndingAt, $n);
            }
        }

        // DP: dp[i] = max palindromes in prefix s[0...i-1]
        $dp = array_fill(0, $n + 1, 0);

        for ($i = 1; $i <= $n; $i++) {
            // Don't use position i-1
            $dp[$i] = $dp[$i - 1];

            // Try to end a palindrome at position i-1
            foreach ($palindromesEndingAt[$i - 1] as $start) {
                $dp[$i] = max($dp[$i], $dp[$start] + 1);
            }
        }

        return $dp[$n];
    }

    /**
     * Expand around center to find all palindromes with length >= k
     *
     * @param string $s
     * @param int $left
     * @param int $right
     * @param int $k
     * @param array $palindromesEndingAt
     * @param int $n
     * @return void
     */
    private function expandAroundCenter(string $s, int $left, int $right, int $k, array &$palindromesEndingAt, int $n): void
    {
        while ($left >= 0 && $right < $n && $s[$left] === $s[$right]) {
            $len = $right - $left + 1;
            if ($len >= $k) {
                $palindromesEndingAt[$right][] = $left;
            }
            $left--;
            $right++;
        }
    }
}