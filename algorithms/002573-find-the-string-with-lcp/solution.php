<?php

class Solution {

    /**
     * @param Integer[][] $lcp
     * @return String
     */
    function findTheString(array $lcp): string
    {
        $n = count($lcp);

        // 1. Diagonal check
        for ($i = 0; $i < $n; $i++) {
            if ($lcp[$i][$i] != $n - $i) {
                return "";
            }
        }

        // 2. Symmetry and bound check
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($lcp[$i][$j] != $lcp[$j][$i]) {
                    return "";
                }
                if ($lcp[$i][$j] > min($n - $i, $n - $j)) {
                    return "";
                }
            }
        }

        // 3. Recursive condition: lcp[i][j] > 0  => lcp[i+1][j+1] = lcp[i][j] - 1
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - 1; $j++) {
                if ($lcp[$i][$j] > 0 && $lcp[$i + 1][$j + 1] != $lcp[$i][$j] - 1) {
                    return "";
                }
            }
        }

        // Union-Find
        $parent = range(0, $n - 1);
        $rank = array_fill(0, $n, 0);

        $find = function($x) use (&$parent, &$find) {
            if ($parent[$x] != $x) {
                $parent[$x] = $find($parent[$x]);
            }
            return $parent[$x];
        };

        $union = function($x, $y) use (&$parent, &$rank, $find) {
            $rx = $find($x);
            $ry = $find($y);
            if ($rx == $ry) return;
            if ($rank[$rx] < $rank[$ry]) {
                $parent[$rx] = $ry;
            } elseif ($rank[$rx] > $rank[$ry]) {
                $parent[$ry] = $rx;
            } else {
                $parent[$ry] = $rx;
                $rank[$rx]++;
            }
        };

        // Union all positions that must be equal (lcp > 0)
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($lcp[$i][$j] > 0) {
                    $union($i, $j);
                }
            }
        }

        // Check that positions with lcp == 0 are in different groups
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($lcp[$i][$j] == 0 && $find($i) == $find($j)) {
                    return "";
                }
            }
        }

        // Check that for lcp[i][j] = k > 0, the groups of i+k and j+k are different
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $k = $lcp[$i][$j];
                if ($k > 0 && $i + $k < $n && $j + $k < $n) {
                    if ($find($i + $k) == $find($j + $k)) {
                        return "";
                    }
                }
            }
        }

        // Map each index to its compressed group id
        $group = array();
        for ($i = 0; $i < $n; $i++) {
            $group[$i] = $find($i);
        }
        $uniqueGroups = array_unique($group);
        $groupId = array();
        foreach ($uniqueGroups as $g) {
            $groupId[$g] = count($groupId);
        }
        $m = count($groupId); // number of groups
        $firstIdx = array_fill(0, $m, $n);
        for ($i = 0; $i < $n; $i++) {
            $g = $groupId[$group[$i]];
            if ($i < $firstIdx[$g]) $firstIdx[$g] = $i;
        }

        // Build adjacency list of groups that must be different
        $adj = array_fill(0, $m, []);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) continue;
                $gi = $groupId[$group[$i]];
                $gj = $groupId[$group[$j]];
                if ($gi == $gj) continue;
                $needDiff = false;
                if ($lcp[$i][$j] == 0) {
                    $needDiff = true;
                } else {
                    $k = $lcp[$i][$j];
                    if ($i + $k < $n && $j + $k < $n) {
                        $needDiff = true;
                    }
                }
                if ($needDiff) {
                    $adj[$gi][$gj] = true;
                    $adj[$gj][$gi] = true;
                }
            }
        }
        // Convert to list of neighbors
        $neighbors = array_fill(0, $m, []);
        for ($i = 0; $i < $m; $i++) {
            $neighbors[$i] = array_keys($adj[$i]);
        }

        // Assign letters to groups in order of first occurrence
        $order = range(0, $m - 1);
        usort($order, function($a, $b) use ($firstIdx) {
            return $firstIdx[$a] - $firstIdx[$b];
        });
        $letter = array_fill(0, $m, -1); // -1 = not assigned, otherwise 0..25
        foreach ($order as $g) {
            $used = array_fill(0, 26, false);
            foreach ($neighbors[$g] as $nb) {
                if ($letter[$nb] != -1) {
                    $used[$letter[$nb]] = true;
                }
            }
            $assigned = -1;
            for ($c = 0; $c < 26; $c++) {
                if (!$used[$c]) {
                    $assigned = $c;
                    break;
                }
            }
            if ($assigned == -1) return "";
            $letter[$g] = $assigned;
        }

        // Build the string
        $word = str_repeat(' ', $n);
        for ($i = 0; $i < $n; $i++) {
            $g = $groupId[$group[$i]];
            $word[$i] = chr(ord('a') + $letter[$g]);
        }

        // Verify the constructed string produces the given LCP matrix
        $computed = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $n - 1; $j >= 0; $j--) {
                if ($word[$i] == $word[$j]) {
                    if ($i + 1 < $n && $j + 1 < $n) {
                        $computed[$i][$j] = 1 + $computed[$i + 1][$j + 1];
                    } else {
                        $computed[$i][$j] = 1;
                    }
                } else {
                    $computed[$i][$j] = 0;
                }
            }
        }
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($computed[$i][$j] != $lcp[$i][$j]) {
                    return "";
                }
            }
        }

        return $word;
    }
}