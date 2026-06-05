<?php

class Solution {
    private array $digits = [];
    private array $memo = [];

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function totalWaviness(int $num1, int $num2): int
    {
        return $this->solve($num2) - $this->solve($num1 - 1);
    }

    /**
     * @param int $n
     * @return int
     */
    private function solve(int $n): int
    {
        if ($n <= 0) {
            return 0;
        }

        $this->digits = array_map('intval', str_split((string)$n));
        $this->memo = [];

        [, $waviness] = $this->dfs(0, 1, 0, -1, -1);

        return $waviness;
    }

    /**
     * @param int $pos
     * @param int $tight
     * @param int $started
     * @param int $secondLast
     * @param int $last
     * @return array|int[]
     */
    private function dfs(
        int $pos,
        int $tight,
        int $started,
        int $secondLast,
        int $last
    ): array {
        $len = count($this->digits);

        if ($pos === $len) {
            return [1, 0];
        }

        $key = null;

        if (!$tight) {
            $key = $pos . '|' . $started . '|' . $secondLast . '|' . $last;

            if (isset($this->memo[$key])) {
                return $this->memo[$key];
            }
        }

        $limit = $tight ? $this->digits[$pos] : 9;

        $totalCount = 0;
        $totalWaviness = 0;

        for ($digit = 0; $digit <= $limit; $digit++) {
            $nextTight = ($tight && $digit === $limit) ? 1 : 0;

            if (!$started && $digit === 0) {
                [$cnt, $wav] = $this->dfs(
                    $pos + 1,
                    $nextTight,
                    0,
                    -1,
                    -1
                );

                $totalCount += $cnt;
                $totalWaviness += $wav;
                continue;
            }

            if (!$started) {
                [$cnt, $wav] = $this->dfs(
                    $pos + 1,
                    $nextTight,
                    1,
                    -1,
                    $digit
                );

                $totalCount += $cnt;
                $totalWaviness += $wav;
                continue;
            }

            $add = 0;

            if ($secondLast !== -1) {
                if (
                    ($last > $secondLast && $last > $digit) ||
                    ($last < $secondLast && $last < $digit)
                ) {
                    $add = 1;
                }
            }

            [$cnt, $wav] = $this->dfs(
                $pos + 1,
                $nextTight,
                1,
                $last,
                $digit
            );

            $totalCount += $cnt;
            $totalWaviness += $wav + $add * $cnt;
        }

        $result = [$totalCount, $totalWaviness];

        if (!$tight) {
            $this->memo[$key] = $result;
        }

        return $result;
    }
}