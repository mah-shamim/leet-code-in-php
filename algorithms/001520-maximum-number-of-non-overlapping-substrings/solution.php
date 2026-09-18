<?php

class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function maxNumOfSubstrings(string $s): array
    {
        $n = strlen($s);

        $first = array_fill(0, 26, $n);
        $last  = array_fill(0, 26, -1);
        $positions = array_fill(0, 26, []);

        for ($i = 0; $i < $n; $i++) {
            $c = ord($s[$i]) - 97;
            if ($first[$c] === $n) {
                $first[$c] = $i;
            }
            $last[$c] = $i;
            $positions[$c][] = $i;
        }

        $cntPos = array_map('count', $positions);
        $intervals = [];

        // Build the minimal valid interval for every possible starting character.
        for ($c = 0; $c < 26; $c++) {
            if ($first[$c] === $n) {
                continue;
            }

            $l = $first[$c];
            $r = $last[$c];

            // Expand until no new character is forced into the interval.
            do {
                $changed = false;

                for ($k = 0; $k < 26; $k++) {
                    if ($first[$k] === $n) {
                        continue;
                    }

                    $pos = $positions[$k];
                    $cnt = $cntPos[$k];

                    // Binary search for the first occurrence of $k >= $l.
                    $lo = 0;
                    $hi = $cnt - 1;
                    $idx = $cnt;

                    while ($lo <= $hi) {
                        $mid = ($lo + $hi) >> 1;
                        if ($pos[$mid] >= $l) {
                            $idx = $mid;
                            $hi = $mid - 1;
                        } else {
                            $lo = $mid + 1;
                        }
                    }

                    // If character $k appears inside [$l, $r], include all its occurrences.
                    if ($idx < $cnt && $pos[$idx] <= $r) {
                        if ($first[$k] < $l) {
                            $l = $first[$k];
                            $changed = true;
                        }
                        if ($last[$k] > $r) {
                            $r = $last[$k];
                            $changed = true;
                        }
                    }
                }
            } while ($changed);

            // Only keep intervals that really start at the first occurrence of $c.
            if ($l === $first[$c]) {
                $intervals[] = [$l, $r];
            }
        }

        // Greedy interval scheduling: earliest ending first.
        // For equal ending, shorter interval first.
        usort($intervals, function ($a, $b) {
            if ($a[1] === $b[1]) {
                return $b[0] <=> $a[0];
            }
            return $a[1] <=> $b[1];
        });

        $result = [];
        $lastEnd = -1;

        foreach ($intervals as $iv) {
            if ($iv[0] > $lastEnd) {
                $result[] = substr($s, $iv[0], $iv[1] - $iv[0] + 1);
                $lastEnd = $iv[1];
            }
        }

        return $result;
    }
}