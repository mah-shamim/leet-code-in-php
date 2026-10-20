<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sortableIntegers(array $nums): int
    {
        $n = count($nums);

        $sorted = $nums;
        sort($sorted);

        $divisors = [];
        for ($d = 1; $d * $d <= $n; ++$d) {
            if ($n % $d === 0) {
                $divisors[] = $d;
                if ($d * $d !== $n) {
                    $divisors[] = intdiv($n, $d);
                }
            }
        }

        $answer = 0;

        foreach ($divisors as $k) {
            $ok = true;

            for ($start = 0; $start < $n; $start += $k) {
                if (!$this->canRotateToSortedSegment($nums, $sorted, $start, $k)) {
                    $ok = false;
                    break;
                }
            }

            if ($ok) {
                $answer += $k;
            }
        }

        return $answer;
    }

    /**
     * Checks whether nums[start ... start+k-1] is a cyclic rotation of
     * sorted[start ... start+k-1].
     *
     * @param array $nums
     * @param array $sorted
     * @param int $start
     * @param int $k
     * @return bool
     */
    private function canRotateToSortedSegment(array $nums, array $sorted, int $start, int $k): bool {
        $end = $start + $k;

        // Find the only possible descent in the block.
        $desc = -1;
        for ($i = $start + 1; $i < $end; ++$i) {
            if ($nums[$i - 1] > $nums[$i]) {
                if ($desc !== -1) {
                    return false;
                }
                $desc = $i - 1 - $start;
            }
        }

        // Rotation needed so that the descent moves to the end.
        $p = ($desc === -1) ? 0 : $desc + 1;

        $t = 0;

        // Compare rotated block with the corresponding sorted segment.
        for ($i = $start + $p; $i < $end; ++$i, ++$t) {
            if ($nums[$i] !== $sorted[$start + $t]) {
                return false;
            }
        }

        for ($i = $start; $i < $start + $p; ++$i, ++$t) {
            if ($nums[$i] !== $sorted[$start + $t]) {
                return false;
            }
        }

        return true;
    }
}