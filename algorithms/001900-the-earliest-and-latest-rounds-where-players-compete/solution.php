<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $firstPlayer
     * @param Integer $secondPlayer
     * @return Integer[]
     */
    function earliestAndLatest($n, $firstPlayer, $secondPlayer) {
        $max_round = 6;
        $total_masks = 1 << $n;
        $int_len = (int)ceil($total_masks / 32);
        $visited = [];
        for ($r = 1; $r <= $max_round; $r++) {
            $visited[$r] = array_fill(0, $int_len, 0);
        }

        $ans_earliest = PHP_INT_MAX;
        $ans_latest = -1;

        $current_states = [(1 << $n) - 1];
        $this->setVisited(1, (1 << $n) - 1, $visited, $int_len);

        for ($round = 1; $round <= $max_round; $round++) {
            $next_states = [];
            foreach ($current_states as $mask) {
                $players = [];
                for ($i = 0; $i < $n; $i++) {
                    if ($mask & (1 << $i)) {
                        $players[] = $i + 1;
                    }
                }
                sort($players);
                $m = count($players);

                $idx1 = array_search($firstPlayer, $players);
                $idx2 = array_search($secondPlayer, $players);
                if ($idx1 === false || $idx2 === false) {
                    continue;
                }
                if ($idx1 > $idx2) {
                    list($idx1, $idx2) = [$idx2, $idx1];
                }

                if ($idx2 == $m - 1 - $idx1) {
                    if ($round < $ans_earliest) {
                        $ans_earliest = $round;
                    }
                    if ($round > $ans_latest) {
                        $ans_latest = $round;
                    }
                    continue;
                }

                $next_mask_base = 0;
                if ($m % 2 == 1) {
                    $mid_index = ($m - 1) >> 1;
                    $mid_player = $players[$mid_index];
                    $next_mask_base = 1 << ($mid_player - 1);
                }

                $matches = [];
                for ($i = 0; $i < intval($m / 2); $i++) {
                    $a = $players[$i];
                    $b = $players[$m - 1 - $i];
                    $matches[] = [$a, $b];
                }

                $next_masks = [$next_mask_base];
                foreach ($matches as $match) {
                    list($a, $b) = $match;
                    if ($a == $firstPlayer || $a == $secondPlayer) {
                        $winner = $a;
                        $bit_winner = 1 << ($winner - 1);
                        foreach ($next_masks as $j => $nm) {
                            $next_masks[$j] |= $bit_winner;
                        }
                    } elseif ($b == $firstPlayer || $b == $secondPlayer) {
                        $winner = $b;
                        $bit_winner = 1 << ($winner - 1);
                        foreach ($next_masks as $j => $nm) {
                            $next_masks[$j] |= $bit_winner;
                        }
                    } else {
                        $new_next_masks = [];
                        $bit_a = 1 << ($a - 1);
                        $bit_b = 1 << ($b - 1);
                        foreach ($next_masks as $nm) {
                            $new_next_masks[] = $nm | $bit_a;
                            $new_next_masks[] = $nm | $bit_b;
                        }
                        $next_masks = $new_next_masks;
                    }
                }

                if ($round < $max_round) {
                    foreach ($next_masks as $nm) {
                        if (!$this->isVisited($round + 1, $nm, $visited, $int_len)) {
                            $this->setVisited($round + 1, $nm, $visited, $int_len);
                            $next_states[] = $nm;
                        }
                    }
                }
            }
            $current_states = $next_states;
        }

        return [$ans_earliest, $ans_latest];
    }

    /**
     * @param $round
     * @param $mask
     * @param $visited
     * @param $int_len
     * @return false|int
     */
    private function isVisited($round, $mask, &$visited, $int_len) {
        $idx = $mask >> 5;
        $bit = $mask & 31;
        if ($idx < $int_len) {
            return ($visited[$round][$idx] >> $bit) & 1;
        }
        return false;
    }

    /**
     * @param $round
     * @param $mask
     * @param $visited
     * @param $int_len
     * @return void
     */
    private function setVisited($round, $mask, &$visited, $int_len) {
        $idx = $mask >> 5;
        $bit = $mask & 31;
        if ($idx < $int_len) {
            $visited[$round][$idx] |= (1 << $bit);
        }
    }
}