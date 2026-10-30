<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param String $labels
     * @param Integer $k
     * @return Integer
     */
    function shortestPath(int $n, array $edges, string $labels, int $k): int
    {
        $adj = array_fill(0, $n, []);
        foreach ($edges as $e) {
            $adj[$e[0]][] = [$e[1], $e[2]];
        }

        // State encoding:
        // state = node * k + (consecutiveCount - 1)
        $totalStates = $n * $k;
        $INF = PHP_INT_MAX;

        $dist = new SplFixedArray($totalStates);
        for ($i = 0; $i < $totalStates; ++$i) {
            $dist[$i] = $INF;
        }

        // Custom min-heap, preallocated.
        // At most one insertion per processed edge-state transition.
        $maxHeapSize = $k * count($edges) + 2;
        $heapState = new SplFixedArray($maxHeapSize);
        $heapDist = new SplFixedArray($maxHeapSize);
        $heapSize = 0;

        // Start at node 0, consecutive label count is 1.
        $start = 0;
        $dist[$start] = 0;

        $heapState[0] = $start;
        $heapDist[0] = 0;
        $heapSize = 1;

        while ($heapSize > 0) {
            $state = $heapState[0];
            $d = $heapDist[0];

            // Pop min from heap.
            --$heapSize;
            if ($heapSize > 0) {
                $lastState = $heapState[$heapSize];
                $lastDist = $heapDist[$heapSize];

                $i = 0;
                while (true) {
                    $left = ($i << 1) + 1;
                    if ($left >= $heapSize) {
                        break;
                    }

                    $right = $left + 1;
                    $child = $left;

                    if ($right < $heapSize && $heapDist[$right] < $heapDist[$left]) {
                        $child = $right;
                    }

                    if ($heapDist[$child] >= $lastDist) {
                        break;
                    }

                    $heapState[$i] = $heapState[$child];
                    $heapDist[$i] = $heapDist[$child];
                    $i = $child;
                }

                $heapState[$i] = $lastState;
                $heapDist[$i] = $lastDist;
            }

            // Skip stale heap entries.
            if ($d !== $dist[$state]) {
                continue;
            }

            $u = intdiv($state, $k);
            if ($u === $n - 1) {
                return $d;
            }

            $cnt = $state - $u * $k + 1;
            $currentLabel = $labels[$u];

            foreach ($adj[$u] as $edge) {
                $v = $edge[0];
                $w = $edge[1];

                if ($labels[$v] === $currentLabel) {
                    $nextCnt = $cnt + 1;
                    if ($nextCnt > $k) {
                        continue;
                    }
                } else {
                    $nextCnt = 1;
                }

                $nextState = $v * $k + ($nextCnt - 1);
                $nextDist = $d + $w;

                if ($nextDist < $dist[$nextState]) {
                    $dist[$nextState] = $nextDist;

                    // Push into min-heap.
                    $i = $heapSize;
                    while ($i > 0) {
                        $parent = ($i - 1) >> 1;
                        if ($heapDist[$parent] <= $nextDist) {
                            break;
                        }

                        $heapState[$i] = $heapState[$parent];
                        $heapDist[$i] = $heapDist[$parent];
                        $i = $parent;
                    }

                    $heapState[$i] = $nextState;
                    $heapDist[$i] = $nextDist;
                    ++$heapSize;
                }
            }
        }

        return -1;
    }
}