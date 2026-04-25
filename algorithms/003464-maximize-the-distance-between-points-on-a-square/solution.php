<?php

class Solution {

    /**
     * @param Integer $side
     * @param Integer[][] $points
     * @param Integer $k
     * @return Integer
     */
    function maxDistance(int $side, array $points, int $k): int
    {
        $ordered = $this->getOrderedPoints($side, $points);
        $left = 0;
        $right = $side;

        while ($left < $right) {
            $mid = (int)(($left + $right + 1) / 2);
            if ($this->isValidDistance($ordered, $k, $mid)) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }

        return $left;
    }

    /**
     * Returns true if we can select k points such that the minimum Manhattan
     * distance between any two consecutive chosen points is at least d.
     *
     * @param array $ordered
     * @param int $k
     * @param int $d
     * @return bool
     */
    private function isValidDistance(array $ordered, int $k, int $d): bool {
        $sequences = [];
        $firstPoint = $ordered[0];
        $sequences[] = [
            'startX' => $firstPoint[0],
            'startY' => $firstPoint[1],
            'endX' => $firstPoint[0],
            'endY' => $firstPoint[1],
            'length' => 1
        ];
        $maxLength = 1;

        for ($i = 1; $i < count($ordered); $i++) {
            $x = $ordered[$i][0];
            $y = $ordered[$i][1];
            $startX = $x;
            $startY = $y;
            $length = 1;

            while (!empty($sequences)) {
                $front = $sequences[0];
                $distEnd = abs($x - $front['endX']) + abs($y - $front['endY']);

                if ($distEnd >= $d) {
                    $distStart = abs($x - $front['startX']) + abs($y - $front['startY']);
                    if ($distStart >= $d && $front['length'] + 1 >= $length) {
                        $startX = $front['startX'];
                        $startY = $front['startY'];
                        $length = $front['length'] + 1;
                        $maxLength = max($maxLength, $length);
                    }
                    array_shift($sequences);
                } else {
                    break;
                }
            }

            $sequences[] = [
                'startX' => $startX,
                'startY' => $startY,
                'endX' => $x,
                'endY' => $y,
                'length' => $length
            ];
        }

        return $maxLength >= $k;
    }

    /**
     * Returns the ordered points on the perimeter of a square of side length side,
     * starting from left, top, right, and bottom boundaries.
     *
     * @param int $side
     * @param array $points
     * @return array
     */
    private function getOrderedPoints(int $side, array $points): array {
        $left = [];
        $top = [];
        $right = [];
        $bottom = [];

        foreach ($points as $point) {
            $x = $point[0];
            $y = $point[1];

            if ($x == 0 && $y > 0 && $y < $side) {
                $left[] = [$x, $y];
            } elseif ($y == $side && $x > 0 && $x < $side) {
                $top[] = [$x, $y];
            } elseif ($x == $side && $y < $side && $y > 0) {
                $right[] = [$x, $y];
            } elseif ($y == 0 && $x > 0 && $x < $side) {
                $bottom[] = [$x, $y];
            } elseif ($x == 0 && $y == 0) {
                // corner (0,0) - treat as left boundary start
                $left[] = [$x, $y];
            } elseif ($x == 0 && $y == $side) {
                // corner (0,side) - treat as top boundary
                $top[] = [$x, $y];
            } elseif ($x == $side && $y == $side) {
                // corner (side,side) - treat as right boundary
                $right[] = [$x, $y];
            } elseif ($x == $side && $y == 0) {
                // corner (side,0) - treat as bottom boundary
                $bottom[] = [$x, $y];
            }
        }

        // Sort each boundary in order around the square
        usort($left, function($a, $b) { return $a[1] <=> $b[1]; });
        usort($top, function($a, $b) { return $a[0] <=> $b[0]; });
        usort($right, function($a, $b) { return $b[1] <=> $a[1]; });
        usort($bottom, function($a, $b) { return $b[0] <=> $a[0]; });

        // Combine all boundaries in clockwise order
        $result = array_merge($left, $top, $right, $bottom);

        // Remove any duplicate corners that might have been added twice
        $unique = [];
        $seen = [];
        foreach ($result as $point) {
            $key = $point[0] . ',' . $point[1];
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $unique[] = $point;
            }
        }

        return $unique;
    }
}