<?php

class Solution {
    private array $allowedMap;
    private array $memo;

    /**
     * @param String $bottom
     * @param String[] $allowed
     * @return Boolean
     */
    function pyramidTransition($bottom, $allowed) {
        // Build a map of allowed patterns: key = base pair, value = array of possible tops
        $this->allowedMap = [];
        foreach ($allowed as $pattern) {
            $base = substr($pattern, 0, 2);
            $top = $pattern[2];
            $this->allowedMap[$base][$top] = true;
        }

        $this->memo = [];
        return $this->dfs($bottom);
    }

    /**
     * @param $row
     * @return bool|mixed
     */
    private function dfs($row) {
        $len = strlen($row);
        if ($len == 1) {
            return true; // Reached the top
        }

        // Check memoization
        if (isset($this->memo[$row])) {
            return $this->memo[$row];
        }

        // Generate all possible next rows
        $nextRows = [];
        $this->generateNextRows($row, 0, '', $nextRows);

        // Try each possible next row
        foreach ($nextRows as $nextRow) {
            if ($this->dfs($nextRow)) {
                $this->memo[$row] = true;
                return true;
            }
        }

        $this->memo[$row] = false;
        return false;
    }

    /**
     * @param $current
     * @param $index
     * @param $path
     * @param $result
     * @return void
     */
    private function generateNextRows($current, $index, $path, &$result) {
        if ($index == strlen($current) - 1) {
            $result[] = $path;
            return;
        }

        $pair = substr($current, $index, 2);

        // If no pattern allows this pair, stop
        if (!isset($this->allowedMap[$pair])) {
            return;
        }

        // Try all possible tops for this pair
        foreach (array_keys($this->allowedMap[$pair]) as $top) {
            $this->generateNextRows($current, $index + 1, $path . $top, $result);
        }
    }
}