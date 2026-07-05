<?php

class Solution {

    /**
     * @param String[] $board
     * @return Integer[]
     */
    function pathsWithMaxScore(array $board): array
    {
        $n = count($board);
        $m = strlen($board[0]);
        $MOD = 1e9 + 7;
        $NEG = -1e9;

        $dp = array_fill(0, $n, array_fill(0, $m, $NEG));
        $ways = array_fill(0, $n, array_fill(0, $m, 0));

        $dp[$n-1][$m-1] = 0;
        $ways[$n-1][$m-1] = 1;

        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $m - 1; $j >= 0; $j--) {
                if ($board[$i][$j] == 'X') continue;
                if ($i == $n - 1 && $j == $m - 1) continue;

                $best = $NEG;
                $count = 0;

                // up
                if ($i + 1 < $n && $board[$i+1][$j] != 'X') {
                    $val = $dp[$i+1][$j];
                    if ($val != $NEG) {
                        $newScore = $val + ($board[$i][$j] == 'E' ? 0 : intval($board[$i][$j]));
                        if ($newScore > $best) {
                            $best = $newScore;
                            $count = $ways[$i+1][$j];
                        } elseif ($newScore == $best) {
                            $count = ($count + $ways[$i+1][$j]) % $MOD;
                        }
                    }
                }

                // left
                if ($j + 1 < $m && $board[$i][$j+1] != 'X') {
                    $val = $dp[$i][$j+1];
                    if ($val != $NEG) {
                        $newScore = $val + ($board[$i][$j] == 'E' ? 0 : intval($board[$i][$j]));
                        if ($newScore > $best) {
                            $best = $newScore;
                            $count = $ways[$i][$j+1];
                        } elseif ($newScore == $best) {
                            $count = ($count + $ways[$i][$j+1]) % $MOD;
                        }
                    }
                }

                // up-left
                if ($i + 1 < $n && $j + 1 < $m && $board[$i+1][$j+1] != 'X') {
                    $val = $dp[$i+1][$j+1];
                    if ($val != $NEG) {
                        $newScore = $val + ($board[$i][$j] == 'E' ? 0 : intval($board[$i][$j]));
                        if ($newScore > $best) {
                            $best = $newScore;
                            $count = $ways[$i+1][$j+1];
                        } elseif ($newScore == $best) {
                            $count = ($count + $ways[$i+1][$j+1]) % $MOD;
                        }
                    }
                }

                $dp[$i][$j] = $best;
                $ways[$i][$j] = $count;
            }
        }

        if ($dp[0][0] == $NEG) return [0, 0];
        return [$dp[0][0], $ways[0][0] % $MOD];
    }
}