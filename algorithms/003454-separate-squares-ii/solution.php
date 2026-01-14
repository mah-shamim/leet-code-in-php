<?php

class Solution {

    /**
     * @param Integer[][] $squares
     * @return Float
     */
    function separateSquares(array $squares): float
    {
        $events = []; // (y, delta, xl, xr)
        $xsSet = [];

        foreach ($squares as $square) {
            $x = $square[0];
            $y = $square[1];
            $l = $square[2];

            $events[] = [$y, 1, $x, $x + $l];
            $events[] = [$y + $l, -1, $x, $x + $l];

            $xsSet[$x] = true;
            $xsSet[$x + $l] = true;
        }

        // Sort events by y
        usort($events, function($a, $b) {
            return $a[0] <=> $b[0];
        });

        $xs = array_keys($xsSet);
        sort($xs);

        $totalArea = $this->getArea($events, $xs);
        $halfArea = $totalArea / 2.0;

        $area = 0;
        $prevY = 0;
        $tree = new SegmentTree($xs);

        foreach ($events as $event) {
            [$y, $delta, $xl, $xr] = $event;

            $coveredWidth = $tree->getCoveredWidth();
            $areaGain = $coveredWidth * ($y - $prevY);

            if ($area + $areaGain >= $halfArea) {
                return $prevY + ($halfArea - $area) / $coveredWidth;
            }

            $area += $areaGain;
            $tree->add($xl, $xr, $delta);
            $prevY = $y;
        }

        return $prevY;
    }

    /**
     * @param array $events
     * @param array $xs
     * @return float
     */
    private function getArea(array $events, array $xs): float {
        $totalArea = 0;
        $prevY = 0;
        $tree = new SegmentTree($xs);

        foreach ($events as $event) {
            [$y, $delta, $xl, $xr] = $event;

            $totalArea += $tree->getCoveredWidth() * ($y - $prevY);
            $tree->add($xl, $xr, $delta);
            $prevY = $y;
        }

        return $totalArea;
    }
}


class SegmentTree {
    private array $xs;
    private int $n;
    private array $coverCount;
    private array $coverWidth;

    /**
     * @param array $xs
     */
    public function __construct(array $xs) {
        $this->xs = $xs;
        $this->n = count($xs) - 1;
        $this->coverCount = array_fill(0, 4 * $this->n, 0);
        $this->coverWidth = array_fill(0, 4 * $this->n, 0);
    }

    /**
     * @param int $i
     * @param int $j
     * @param int $val
     * @return void
     */
    public function add(int $i, int $j, int $val): void {
        $this->addHelper(0, 0, $this->n - 1, $i, $j, $val);
    }

    /**
     * @return int
     */
    public function getCoveredWidth(): int {
        return $this->coverWidth[0];
    }

    /**
     * @param int $treeIndex
     * @param int $lo
     * @param int $hi
     * @param int $i
     * @param int $j
     * @param int $val
     * @return void
     */
    private function addHelper(int $treeIndex, int $lo, int $hi, int $i, int $j, int $val): void {
        if ($j <= $this->xs[$lo] || $this->xs[$hi + 1] <= $i) {
            return;
        }

        if ($i <= $this->xs[$lo] && $this->xs[$hi + 1] <= $j) {
            $this->coverCount[$treeIndex] += $val;
        } else {
            $mid = (int)(($lo + $hi) / 2);
            $this->addHelper(2 * $treeIndex + 1, $lo, $mid, $i, $j, $val);
            $this->addHelper(2 * $treeIndex + 2, $mid + 1, $hi, $i, $j, $val);
        }

        if ($this->coverCount[$treeIndex] > 0) {
            $this->coverWidth[$treeIndex] = $this->xs[$hi + 1] - $this->xs[$lo];
        } else if ($lo == $hi) {
            $this->coverWidth[$treeIndex] = 0;
        } else {
            $this->coverWidth[$treeIndex] =
                $this->coverWidth[2 * $treeIndex + 1] +
                $this->coverWidth[2 * $treeIndex + 2];
        }
    }
}


$separateSquares = new Solution();
print_r($separateSquares->separateSquares([[0,0,2],[1,1,2]])); // 2.0
print_r($separateSquares->separateSquares([[0,0,1],[2,2,1]])); // 1.0
print_r($separateSquares->separateSquares([[0,0,3],[1,1,1],[2,2,1]])); // 2.5
print_r($separateSquares->separateSquares([[0,0,4],[1,1,2],[2,2,2],[3,3,2]])); // 3.0