<?php

class Solution {

    /**
     * @param String $s
     * @param String $target
     * @return String
     */
    function lexGreaterPermutation(string $s, string $target): string
    {
        $n = strlen($s);

        // Step 1: Count character frequencies of $s
        $cnt = array_fill(0, 26, 0);
        for ($i = 0; $i < $n; $i++) {
            $cnt[ord($s[$i]) - 97]++;
        }

        // Step 2: Greedily try to match the target string as long as possible
        $match_len = 0;
        for ($i = 0; $i < $n; $i++) {
            $char_idx = ord($target[$i]) - 97;
            if ($cnt[$char_idx] > 0) {
                $cnt[$char_idx]--;
                $match_len++;
            } else {
                break;
            }
        }

        // Step 3: Backtrack from the maximum match length to find a divergence point
        for ($i = $match_len; $i >= 0; $i--) {
            // Put the previously consumed character back into the pool
            if ($i < $match_len) {
                $cnt[ord($target[$i]) - 97]++;
            }

            // Out of bounds safety check
            if ($i == $n) {
                continue;
            }

            $target_char_idx = ord($target[$i]) - 97;

            // Search for the smallest character strictly greater than target[$i]
            for ($c_idx = $target_char_idx + 1; $c_idx < 26; $c_idx++) {
                if ($cnt[$c_idx] > 0) {
                    // Consume this character
                    $cnt[$c_idx]--;

                    // Build the prefix up to i - 1
                    $prefix = substr($target, 0, $i);

                    // Add the divergence character
                    $divergence = chr($c_idx + 97);

                    // Build the rest of the string with remaining characters sorted ascending
                    $suffix = '';
                    for ($k = 0; $k < 26; $k++) {
                        if ($cnt[$k] > 0) {
                            $suffix .= str_repeat(chr($k + 97), $cnt[$k]);
                        }
                    }

                    return $prefix . $divergence . $suffix;
                }
            }
        }

        return "";
    }
}