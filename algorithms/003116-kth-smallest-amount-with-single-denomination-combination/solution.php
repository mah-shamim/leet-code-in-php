<?php

class Solution {

    /**
     * @param Integer[] $coins
     * @param Integer $k
     * @return Integer
     */
    function findKthSmallest(array $coins, int $k): int
    {
        // Binary search range: min coin to max possible (k * min coin is safe upper bound)
        $low = min($coins);
        $high = $k * min($coins);

        while ($low < $high) {
            $mid = $low + intdiv($high - $low, 2);
            if ($this->countAtMost($coins, $mid) >= $k) {
                $high = $mid;
            } else {
                $low = $mid + 1;
            }
        }

        return $low;
    }

    /**
     * Count how many numbers ≤ x are multiples of at least one coin
     * Using Inclusion-Exclusion Principle
     *
     * @param array $coins
     * @param int $x
     * @return int
     */
    private function countAtMost(array $coins, int $x): int
    {
        $n = count($coins);
        $total = 0;

        // Iterate over all subsets (1 to 2^n - 1)
        $subsets = 1 << $n;
        for ($mask = 1; $mask < $subsets; $mask++) {
            $lcm = 1;
            $bits = 0;

            // Compute LCM of selected coins
            for ($i = 0; $i < $n; $i++) {
                if ($mask & (1 << $i)) {
                    $bits++;
                    $lcm = $this->lcm($lcm, $coins[$i]);
                    if ($lcm > $x) break; // No need to go further
                }
            }

            if ($lcm > $x) continue;

            $count = intdiv($x, $lcm);
            // Inclusion-Exclusion: add for odd, subtract for even
            if ($bits % 2 == 1) {
                $total += $count;
            } else {
                $total -= $count;
            }
        }

        return $total;
    }

    /**
     * Greatest Common Divisor (Euclidean algorithm)
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    private function gcd(int $a, int $b): int
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    /**
     * Least Common Multiple
     *
     * @param int $a
     * @param int $b
     * @return float|int
     */
    private function lcm(int $a, int $b): float|int
    {
        if ($a == 0 || $b == 0) return 0;
        return intdiv($a, $this->gcd($a, $b)) * $b;
    }
}