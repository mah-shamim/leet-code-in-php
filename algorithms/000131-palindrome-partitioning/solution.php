<?php

class Solution {

    /**
     * @param String $s
     * @return String[][]
     */
    function partition(string $s): array
    {
        $result = [];
        $current = [];
        $this->backtrack($s, 0, $current, $result);
        return $result;
    }

    /**
     * @param string $s
     * @param int $start
     * @param array $current
     * @param array $result
     * @return void
     */
    function backtrack(string $s, int $start, array &$current, array &$result): void
    {
        if ($start >= strlen($s)) {
            $result[] = $current;
            return;
        }

        for ($end = $start; $end < strlen($s); $end++) {
            if ($this->isPalindrome(substr($s, $start, $end - $start + 1))) {
                $current[] = substr($s, $start, $end - $start + 1);
                self::backtrack($s, $end + 1, $current, $result);
                array_pop($current);
            }
        }
    }

    /**
     * @param string $s
     * @return bool
     */
    function isPalindrome(string $s): bool
    {
        $n = strlen($s);
        for ($i = 0; $i < $n / 2; $i++) {
            if ($s[$i] !== $s[$n - $i - 1]) {
                return false;
            }
        }
        return true;
    }
}