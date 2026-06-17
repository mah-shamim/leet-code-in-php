<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function processStr(string $s, int $k): string
    {
        $n = strlen($s);
        $lengths = [];
        $currentLength = 0;

        // First pass: compute lengths
        for ($i = 0; $i < $n; $i++) {
            $ch = $s[$i];
            if ($ch >= 'a' && $ch <= 'z') {
                $currentLength++;
            } elseif ($ch === '*') {
                if ($currentLength > 0) $currentLength--;
            } elseif ($ch === '#') {
                $currentLength *= 2;
            } elseif ($ch === '%') {
                // length unchanged
            }
            $lengths[] = $currentLength;
        }

        // If k is out of bounds
        if ($k >= $currentLength) {
            return '.';
        }

        // Walk backwards
        for ($i = $n - 1; $i >= 0; $i--) {
            $ch = $s[$i];
            $prevLength = ($i > 0) ? $lengths[$i - 1] : 0;
            $currLength = $lengths[$i];

            if ($ch >= 'a' && $ch <= 'z') {
                // This letter was appended, if k matches last position
                if ($k === $currLength - 1) {
                    return $ch;
                }
                // Otherwise it's before this letter, keep going
            } elseif ($ch === '*') {
                // The deletion means: before this operation, length was prevLength
                // We don't change k, just continue
            } elseif ($ch === '#') {
                // currLength = prevLength * 2
                if ($k >= $prevLength) {
                    $k = $k - $prevLength;
                }
                // else k stays same
            } elseif ($ch === '%') {
                // reverse: k becomes prevLength - 1 - k
                if ($prevLength > 0) {
                    $k = $prevLength - 1 - $k;
                }
            }
        }

        // Should never reach here if k was valid
        return '.';
    }
}