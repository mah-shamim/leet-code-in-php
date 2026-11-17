<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function minimumChanges(string $s, int $k): int
    {
        $n = strlen($s);
        $INF = 1 << 30;

        // cost[l][r] = minimum changes to make s[l..r] a semi-palindrome
        $cost = array_fill(0, $n, array_fill(0, $n, $INF));

        for ($l = 0; $l < $n; $l++) {
            for ($r = $l + 1; $r < $n; $r++) {
                $len = $r - $l + 1;
                $best = $INF;

                // Try every valid divisor d of len, excluding len itself.
                for ($d = 1; $d < $len; $d++) {
                    if ($len % $d !== 0) {
                        continue;
                    }

                    $changes = 0;

                    // For this d, check each group of positions:
                    // off, off + d, off + 2d, ...
                    for ($off = 0; $off < $d; $off++) {
                        $count = intdiv($len - 1 - $off, $d) + 1;
                        $left = 0;
                        $right = $count - 1;

                        while ($left < $right) {
                            $p1 = $l + $off + $left * $d;
                            $p2 = $l + $off + $right * $d;

                            if ($s[$p1] !== $s[$p2]) {
                                $changes++;
                            }

                            $left++;
                            $right--;
                        }
                    }

                    if ($changes < $best) {
                        $best = $changes;
                    }

                    // Cannot do better than 0.
                    if ($best === 0) {
                        break;
                    }
                }

                $cost[$l][$r] = $best;
            }
        }

        // dp[i][parts] = minimum changes to split s[i..n-1] into 'parts' semi-palindromes
        $dp = array_fill(0, $n + 1, array_fill(0, $k + 1, $INF));
        $dp[$n][0] = 0;

        for ($parts = 1; $parts <= $k; $parts++) {
            for ($i = 0; $i < $n; $i++) {
                // Each semi-palindrome must have length at least 2.
                for ($end = $i + 1; $end < $n; $end++) {
                    if ($dp[$end + 1][$parts - 1] === $INF) {
                        continue;
                    }

                    if ($cost[$i][$end] === $INF) {
                        continue;
                    }

                    $value = $cost[$i][$end] + $dp[$end + 1][$parts - 1];

                    if ($value < $dp[$i][$parts]) {
                        $dp[$i][$parts] = $value;
                    }
                }
            }
        }

        return $dp[0][$k];
    }
}