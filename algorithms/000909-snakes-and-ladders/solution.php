<?php

class Solution {

    /**
     * @param Integer[][] $board
     * @return Integer
     */
    function snakesAndLadders($board) {
        $n = count($board);
        $total = $n * $n;
        $visited = array_fill(1, $total, false);
        $queue = new SplQueue();
        $queue->enqueue([1, 0]);
        $visited[1] = true;

        while (!$queue->isEmpty()) {
            list($curr, $moves) = $queue->dequeue();
            if ($curr == $total) {
                return $moves;
            }

            for ($i = 1; $i <= 6; $i++) {
                $next = $curr + $i;
                if ($next > $total) {
                    break;
                }

                $q = intval(($next - 1) / $n);
                $r = $n - 1 - $q;
                $rem = ($next - 1) % $n;
                if ($q % 2 == 0) {
                    $c = $rem;
                } else {
                    $c = $n - 1 - $rem;
                }

                if ($board[$r][$c] != -1) {
                    $next = $board[$r][$c];
                }

                if (!$visited[$next]) {
                    $visited[$next] = true;
                    $queue->enqueue([$next, $moves + 1]);
                }
            }
        }

        return -1;
    }
}