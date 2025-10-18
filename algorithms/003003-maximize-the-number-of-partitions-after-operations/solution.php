<?php

class Solution {
    /**
     * Main function to find maximum partitions
     * @param String $s - input string
     * @param Integer $k - max distinct characters per partition
     * @return Integer - maximum number of partitions
     */
    function maxPartitionsAfterOperations($s, $k) {
        $n = strlen($s);
        $memo = [];

        // Start DFS from index 0, can change one char, empty mask
        // Add 1 because we count partition boundaries, need to add final partition
        $result = $this->dfs(0, true, 0, $s, $k, $memo) + 1;
        return $result;
    }

    /**
     * DFS to explore all possibilities
     * @param int $i - current index
     * @param bool $canChange - can we still change a character?
     * @param int $mask - bitmask of current partition's characters
     * @return int - number of partition boundaries from this state
     */
    private function dfs($i, $canChange, $mask, $s, $k, &$memo) {
        $n = strlen($s);

        // Base case: reached end of string
        if ($i === $n) {
            return 0;
        }

        // Memoization key: combine all state variables
        $key = $i . '|' . ($canChange ? '1' : '0') . '|' . $mask;
        if (isset($memo[$key])) {
            return $memo[$key];
        }

        $res = 0;
        $currentChar = $s[$i];
        // Convert character to bit position (a=0, b=1, ..., z=25)
        $currentBit = 1 << (ord($currentChar) - ord('a'));

        // **Option 1: Keep current character unchanged**
        $newMask = $mask | $currentBit;

        if ($this->popcount($newMask) > $k) {
            // Too many distinct chars - must start new partition
            // Add 1 for partition boundary, continue with new partition
            $res = max($res, 1 + $this->dfs($i + 1, $canChange, $currentBit, $s, $k, $memo));
        } else {
            // Can continue current partition
            $res = max($res, $this->dfs($i + 1, $canChange, $newMask, $s, $k, $memo));
        }

        // **Option 2: Change current character (if allowed)**
        if ($canChange) {
            // Try all 26 possible characters
            for ($c = 0; $c < 26; $c++) {
                $newBit = 1 << $c;

                // Skip if it's the same character
                if ($newBit === $currentBit) continue;

                $newMask = $mask | $newBit;

                if ($this->popcount($newMask) > $k) {
                    // New char causes overflow - start new partition
                    // Note: canChange becomes false after using it
                    $res = max($res, 1 + $this->dfs($i + 1, false, $newBit, $s, $k, $memo));
                } else {
                    // Can continue with changed character
                    $res = max($res, $this->dfs($i + 1, false, $newMask, $s, $k, $memo));
                }
            }
        }

        // Store result in memo
        $memo[$key] = $res;
        return $res;
    }

    /**
     * Count number of set bits in bitmask (distinct characters)
     * @param int $x - bitmask
     * @return int - count of 1 bits
     */
    private function popcount($x) {
        $count = 0;
        while ($x) {
            $count += $x & 1;  // Add 1 if last bit is set
            $x >>= 1;           // Right shift to check next bit
        }
        return $count;
    }
}