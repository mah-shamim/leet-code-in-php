<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations(array $nums): int
    {
        $n = count($nums);
        if ($n <= 1) return 0;

        // A target state is (type, shift):
        // type 0: rotation of nums
        // type 1: rotation of reverse(nums)
        $targets = [];

        $shift0 = $this->getTargetShift($nums, 0);
        if ($shift0 !== -1) {
            $targets[] = $shift0; // type 0
        }

        $shift1 = $this->getTargetShift($nums, 1);
        if ($shift1 !== -1) {
            $targets[] = $n + $shift1; // type 1
        }

        if (empty($targets)) {
            return -1;
        }

        $isTarget = [];
        foreach ($targets as $id) {
            $isTarget[$id] = true;
        }

        $totalStates = 2 * $n;
        $dist = array_fill(0, $totalStates, -1);
        $queue = array_fill(0, $totalStates, 0);

        $head = 0;
        $tail = 0;

        // Initial state: type 0, shift 0 -> nums
        $dist[0] = 0;
        $queue[$tail++] = 0;

        while ($head < $tail) {
            $id = $queue[$head++];
            $d = $dist[$id];

            if (isset($isTarget[$id])) {
                return $d;
            }

            $type = intdiv($id, $n);
            $shift = $id % $n;

            // Operation 1: reverse whole array.
            // (type, shift) -> (1 - type, (n - shift) % n)
            $newShift = ($n - $shift) % $n;
            $newId = (1 - $type) * $n + $newShift;

            if ($dist[$newId] === -1) {
                $dist[$newId] = $d + 1;
                $queue[$tail++] = $newId;
            }

            // Operation 2: rotate left by one.
            // (type, shift) -> (type, (shift + 1) % n)
            $newShift = ($shift + 1) % $n;
            $newId = $type * $n + $newShift;

            if ($dist[$newId] === -1) {
                $dist[$newId] = $d + 1;
                $queue[$tail++] = $newId;
            }
        }

        return -1;
    }

    /**
     * Alias in case the judge expects this method name.
     *
     * @param array $nums
     * @return int
     */
    public function sortPermutation(array $nums): int {
        return $this->minOperations($nums);
    }

    /**
     * Returns the shift needed to make B_t sorted, or -1 if impossible.
     * B_0 = nums
     * B_1 = reverse(nums)
     *
     * @param array $nums
     * @param int $type
     * @return int
     */
    private function getTargetShift(array $nums, int $type): int {
        $n = count($nums);
        $zeroPos = -1;

        for ($i = 0; $i < $n; $i++) {
            $v = ($type === 0) ? $nums[$i] : $nums[$n - 1 - $i];

            if ($v === 0) {
                $zeroPos = $i;
                break;
            }
        }

        if ($zeroPos === -1) {
            return -1;
        }

        // Check whether B_t is cyclic increasing:
        // B_t[(zeroPos + j) % n] must equal j.
        for ($j = 0; $j < $n; $j++) {
            $pos = ($zeroPos + $j) % $n;
            $v = ($type === 0) ? $nums[$pos] : $nums[$n - 1 - $pos];

            if ($v !== $j) {
                return -1;
            }
        }

        return $zeroPos;
    }
}