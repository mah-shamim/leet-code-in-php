<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function resultArray(array $nums, int $k, array $queries): array
    {
        $n = count($nums);
        $size = 1;
        while ($size < $n) {
            $size <<= 1;
        }

        // prod[i] = product modulo k of segment i
        $prod = array_fill(0, 2 * $size, 1);

        // cnt[i][x] = number of non-empty prefixes of segment i
        // whose product modulo k equals x
        $cnt = [];
        for ($i = 0; $i < 2 * $size; $i++) {
            $cnt[$i] = array_fill(0, $k, 0);
        }

        for ($i = 0; $i < $n; $i++) {
            $p = $nums[$i] % $k;
            $idx = $size + $i;
            $prod[$idx] = $p;
            $cnt[$idx][$p] = 1;
        }

        for ($i = $size - 1; $i >= 1; $i--) {
            $this->pull($prod, $cnt, $i, $k);
        }

        $answer = [];

        foreach ($queries as $q) {
            [$index, $value, $start, $x] = $q;

            // Point update
            $p = $value % $k;
            $idx = $size + $index;
            $prod[$idx] = $p;
            $cnt[$idx] = array_fill(0, $k, 0);
            $cnt[$idx][$p] = 1;

            $idx >>= 1;
            while ($idx >= 1) {
                $this->pull($prod, $cnt, $idx, $k);
                $idx >>= 1;
            }

            // Query range [start, n - 1]
            $l = $size + $start;
            $r = $size + $n - 1;

            $leftProd = 1;
            $leftCnt = array_fill(0, $k, 0);
            $rightProd = 1;
            $rightCnt = array_fill(0, $k, 0);

            while ($l <= $r) {
                if ($l & 1) {
                    $this->mergeLeft($leftProd, $leftCnt, $prod[$l], $cnt[$l], $k);
                    $l++;
                }

                if (!($r & 1)) {
                    $this->mergeRight($prod[$r], $cnt[$r], $rightProd, $rightCnt, $k);
                    $r--;
                }

                $l >>= 1;
                $r >>= 1;
            }

            // Merge left accumulator and right accumulator
            $resultCnt = $leftCnt;
            for ($y = 0; $y < $k; $y++) {
                $c = $rightCnt[$y];
                if ($c > 0) {
                    $z = ($leftProd * $y) % $k;
                    $resultCnt[$z] += $c;
                }
            }

            $answer[] = $resultCnt[$x];
        }

        return $answer;
    }

    /**
     * @param $prod
     * @param $cnt
     * @param $i
     * @param $k
     * @return void
     */
    private function pull(&$prod, &$cnt, $i, $k): void
    {
        $l = $i << 1;
        $r = $l | 1;

        $prodL = $prod[$l];
        $node = $cnt[$l];

        for ($y = 0; $y < $k; $y++) {
            $c = $cnt[$r][$y];
            if ($c > 0) {
                $z = ($prodL * $y) % $k;
                $node[$z] += $c;
            }
        }

        $cnt[$i] = $node;
        $prod[$i] = ($prodL * $prod[$r]) % $k;
    }

    /**
     * @param $leftProd
     * @param $leftCnt
     * @param $rightProd
     * @param $rightCnt
     * @param $k
     * @return void
     */
    private function mergeLeft(&$leftProd, &$leftCnt, $rightProd, $rightCnt, $k): void
    {
        $lp = $leftProd;

        for ($y = 0; $y < $k; $y++) {
            $c = $rightCnt[$y];
            if ($c > 0) {
                $z = ($lp * $y) % $k;
                $leftCnt[$z] += $c;
            }
        }

        $leftProd = ($lp * $rightProd) % $k;
    }

    /**
     * @param $nodeProd
     * @param $nodeCnt
     * @param $rightProd
     * @param $rightCnt
     * @param $k
     * @return void
     */
    private function mergeRight($nodeProd, $nodeCnt, &$rightProd, &$rightCnt, $k): void
    {
        $newCnt = $nodeCnt;

        for ($y = 0; $y < $k; $y++) {
            $c = $rightCnt[$y];
            if ($c > 0) {
                $z = ($nodeProd * $y) % $k;
                $newCnt[$z] += $c;
            }
        }

        $rightCnt = $newCnt;
        $rightProd = ($nodeProd * $rightProd) % $k;
    }
}