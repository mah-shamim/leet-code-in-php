<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function countTrapezoids($points) {
        $n = count($points);
        if ($n < 4) return 0;

        // slope → (lineSignature → count)
        $cnt1 = [];
        // midpointSignature → (slopeSignature → count)
        $cnt2 = [];

        for ($i = 0; $i < $n; $i++) {
            [$x1, $y1] = $points[$i];
            for ($j = 0; $j < $i; $j++) {
                [$x2, $y2] = $points[$j];

                $dx = $x2 - $x1;
                $dy = $y2 - $y1;

                // ---- Normalize slope (dy, dx) ----
                if ($dx == 0) {
                    $slope = "V,1"; // vertical
                } else {
                    $g = $this->gcd(abs($dx), abs($dy));
                    $dy2 = intdiv($dy, $g);
                    $dx2 = intdiv($dx, $g);
                    // Fix sign: dx must be positive for uniqueness
                    if ($dx2 < 0) {
                        $dx2 = -$dx2;
                        $dy2 = -$dy2;
                    }
                    $slope = $dy2 . "," . $dx2;
                }

                // ---- Normalize line (A,B,C): Ax+By+C=0 ----
                // For slope (dy,dx): line perpendicular has A = dy, B = -dx
                if ($dx == 0) {
                    // vertical x = x1 → 1*x + 0*y - x1 = 0
                    $A = 1; $B = 0; $C = -$x1;
                } else {
                    // slope dy/dx → line eq: dy*x - dx*y + C = 0
                    $A = $dy;
                    $B = -$dx;
                    // solve for C: A*x + B*y + C = 0 → C = -(Ax + By)
                    $C = -($A * $x1 + $B * $y1);
                }

                $g = $this->gcd($this->gcd(abs($A), abs($B)), abs($C));
                if ($g != 0) {
                    $A = intdiv($A, $g);
                    $B = intdiv($B, $g);
                    $C = intdiv($C, $g);
                }
                // Fix sign for uniqueness
                if ($A < 0 || ($A == 0 && $B < 0)) {
                    $A = -$A; $B = -$B; $C = -$C;
                }

                $lineKey = "$A,$B,$C";

                // ---- Update cnt1: slope → lines ----
                if (!isset($cnt1[$slope][$lineKey])) {
                    $cnt1[$slope][$lineKey] = 0;
                }
                $cnt1[$slope][$lineKey]++;

                // ---- Update cnt2: midpoint+ slope = parallelogram detection ----
                $mx = $x1 + $x2;  // midpoint numerator only is enough
                $my = $y1 + $y2;

                $midKey = "$mx,$my";

                if (!isset($cnt2[$midKey][$slope])) {
                    $cnt2[$midKey][$slope] = 0;
                }
                $cnt2[$midKey][$slope]++;
            }
        }

        $ans = 0;

        // ---- Count trapezoids: sum over slope-buckets ----
        foreach ($cnt1 as $slope => $lineMap) {
            $sum = 0;
            foreach ($lineMap as $cnt) {
                $ans += $sum * $cnt;
                $sum += $cnt;
            }
        }

        // ---- Subtract parallelograms: they were counted twice ----
        foreach ($cnt2 as $midKey => $slopes) {
            $sum = 0;
            foreach ($slopes as $cnt) {
                $ans -= $sum * $cnt;
                $sum += $cnt;
            }
        }

        return $ans;
    }

    // gcd
    private function gcd(int $a, int $b): int
    {
        while ($b != 0) {
            [$a, $b] = [$b, $a % $b];
        }
        return $a;
    }
}