<?php
/**
 * Problem: Minimum Number of Flips to Make the Binary String Alternating
 *
 * We can rotate the string arbitrarily (type-1 operations) for free.
 * After a rotation, we may flip characters (type-2) to obtain an alternating string.
 * The goal is to minimise the number of flips.
 *
 * An alternating string has one of two patterns:
 *   - Pattern 0: starts with '0', then alternates: 0,1,0,1,...
 *   - Pattern 1: starts with '1', then alternates: 1,0,1,0,...
 *
 * For a rotation starting at index i (0 <= i < n), the substring s[i..i+n-1] (cyclic)
 * must be compared to both patterns. The number of mismatches is the number of flips
 * required for that rotation.
 *
 * To compute this efficiently for all i, we duplicate the string (s + s) and pre‑compute
 * prefix sums of mismatches with the two patterns on the doubled string.
 * Then for each i, the flips for pattern p = prefix_p[i+n] - prefix_p[i].
 * The answer is the minimum over all i of min(flips0[i], flips1[i]).
 *
 * Time complexity: O(n)  (n = length of s)
 * Space complexity: O(n)  (two prefix arrays of size 2n+1)
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minFlips(string $s): int
    {
        $n = strlen($s);
        $len = 2 * $n;          // length of doubled string

        // prefix sums for mismatches with pattern 0 and pattern 1
        $prefix0 = array_fill(0, $len + 1, 0);
        $prefix1 = array_fill(0, $len + 1, 0);

        for ($j = 0; $j < $len; $j++) {
            $ch = $s[$j % $n];   // character in the doubled string

            // target for pattern 0 at position j
            $target0 = ($j % 2 == 0) ? '0' : '1';
            // target for pattern 1 is the opposite
            $target1 = ($j % 2 == 0) ? '1' : '0';

            $prefix0[$j + 1] = $prefix0[$j] + ($ch != $target0 ? 1 : 0);
            $prefix1[$j + 1] = $prefix1[$j] + ($ch != $target1 ? 1 : 0);
        }

        $ans = $n;   // worst case: flip all characters
        for ($i = 0; $i < $n; $i++) {
            $flips0 = $prefix0[$i + $n] - $prefix0[$i];
            $flips1 = $prefix1[$i + $n] - $prefix1[$i];
            $ans = min($ans, $flips0, $flips1);
        }

        return $ans;
    }
}