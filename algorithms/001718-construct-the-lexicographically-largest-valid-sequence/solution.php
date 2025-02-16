<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function constructDistancedSequence($n) {
        $length = 2 * $n - 1;
        $sequence = array_fill(0, $length, 0);
        $used = array_fill(0, $n + 1, 0); // used[0] unused
        $reserved = array_fill(0, $length, null);

        $success = $this->backtrack(0, $sequence, $used, $reserved, $n);

        return $success ? $sequence : [];
    }

    /**
     * @param $current_pos
     * @param $sequence
     * @param $used
     * @param $reserved
     * @param $n
     * @return bool
     */
    function backtrack($current_pos, &$sequence, &$used, &$reserved, $n) {
        $length = 2 * $n - 1;
        if ($current_pos >= $length) {
            return true;
        }

        if ($sequence[$current_pos] != 0) {
            return $this->backtrack($current_pos + 1, $sequence, $used, $reserved, $n);
        }

        if ($reserved[$current_pos] !== null) {
            $num = $reserved[$current_pos];
            if ($used[$num] != 1) {
                return false;
            }
            // Place the second occurrence
            $sequence[$current_pos] = $num;
            $used[$num] = 2;
            $success = $this->backtrack($current_pos + 1, $sequence, $used, $reserved, $n);
            if ($success) {
                return true;
            } else {
                $sequence[$current_pos] = 0;
                $used[$num] = 1;
                return false;
            }
        } else {
            // Try placing numbers from n down to 1
            for ($num = $n; $num >= 1; $num--) {
                if ($num == 1) {
                    if ($used[1] == 0) {
                        $sequence[$current_pos] = 1;
                        $used[1] = 1;
                        $success = $this->backtrack($current_pos + 1, $sequence, $used, $reserved, $n);
                        if ($success) {
                            return true;
                        }
                        $sequence[$current_pos] = 0;
                        $used[1] = 0;
                    }
                } else {
                    if ($used[$num] == 0) {
                        $next_pos = $current_pos + $num;
                        if ($next_pos < $length && $sequence[$next_pos] == 0 && $reserved[$next_pos] === null) {
                            $sequence[$current_pos] = $num;
                            $used[$num] = 1;
                            $reserved[$next_pos] = $num;
                            $success = $this->backtrack($current_pos + 1, $sequence, $used, $reserved, $n);
                            if ($success) {
                                return true;
                            }
                            $sequence[$current_pos] = 0;
                            $used[$num] = 0;
                            $reserved[$next_pos] = null;
                        }
                    }
                }
            }
            return false;
        }
    }
}