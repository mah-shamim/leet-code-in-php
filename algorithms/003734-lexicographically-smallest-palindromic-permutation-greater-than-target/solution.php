<?php

class Solution {

    /**
     * @param String $s
     * @param String $target
     * @return String
     */
    function lexPalindromicPermutation(string $s, string $target): string
    {
        $n = strlen($s);
        $counts = array_fill(0, 26, 0);
        for ($i = 0; $i < $n; $i++) {
            $counts[ord($s[$i]) - 97]++;
        }

        $oddCount = 0;
        $midChar = '#';
        for ($i = 0; $i < 26; $i++) {
            if ($counts[$i] % 2 !== 0) {
                $oddCount++;
                $midChar = chr(97 + $i);
            }
        }

        // A valid palindrome cannot have more than one odd-frequency character
        if ($oddCount > 1) {
            return "";
        }

        // Build the available pool for the first half
        $pool = array_fill(0, 26, 0);
        for ($i = 0; $i < 26; $i++) {
            $pool[$i] = (int)($counts[$i] / 2);
        }

        $halfLen = (int)($n / 2);
        $halfRes = [];
        $ans = "";

        // Backtracking function
        $backtrack = function($idx, $isGreater) use (&$backtrack, &$pool, &$halfRes, &$ans, $halfLen, $n, $midChar, $target) {
            if ($idx === $halfLen) {
                // Reconstruct full string from the first half
                $left = implode('', $halfRes);
                $full = $left;
                if ($n % 2 !== 0) {
                    $full .= $midChar;
                }
                $full .= strrev($left);

                // Verify the result is strictly greater than target
                if ($full > $target) {
                    $ans = $full;
                    return true;
                }
                return false;
            }

            if ($isGreater) {
                // Since the prefix is already strictly greater, pick the smallest available char
                for ($c = 0; $c < 26; $c++) {
                    if ($pool[$c] > 0) {
                        $pool[$c]--;
                        $halfRes[] = chr(97 + $c);
                        if ($backtrack($idx + 1, true)) return true;
                        array_pop($halfRes);
                        $pool[$c]++;
                    }
                }
            } else {
                $targetCharIdx = ord($target[$idx]) - 97;

                // Case 1: Try matching the target character exactly
                if ($pool[$targetCharIdx] > 0) {
                    $pool[$targetCharIdx]--;
                    $halfRes[] = $target[$idx];
                    if ($backtrack($idx + 1, false)) return true;
                    array_pop($halfRes);
                    $pool[$targetCharIdx]++;
                }

                // Case 2: Try picking a character strictly greater than target[idx]
                for ($c = $targetCharIdx + 1; $c < 26; $c++) {
                    if ($pool[$c] > 0) {
                        $pool[$c]--;
                        $halfRes[] = chr(97 + $c);
                        if ($backtrack($idx + 1, true)) return true;
                        array_pop($halfRes);
                        $pool[$c]++;
                    }
                }
            }

            return false;
        };

        if ($backtrack(0, false)) {
            return $ans;
        }

        return "";
    }
}