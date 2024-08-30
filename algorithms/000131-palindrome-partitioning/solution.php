<?php

class Solution {

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        $result = [];
        $current = [];
        $this->backtrack($s, 0, $current, $result);
        return $result;
    }

    /**
     * @param $s
     * @param $start
     * @param $current
     * @param $result
     * @return void
     */
    function backtrack($s, $start, &$current, &$result) {
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
     * @param $s
     * @return bool
     */
    function isPalindrome($s) {
        $n = strlen($s);
        for ($i = 0; $i < $n / 2; $i++) {
            if ($s[$i] !== $s[$n - $i - 1]) {
                return false;
            }
        }
        return true;
    }

}