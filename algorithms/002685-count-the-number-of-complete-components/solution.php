<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countCompleteComponents($n, $edges) {
        $adj = array_fill(0, $n, array());
        $edgeSet = array();

        foreach ($edges as $e) {
            $a = $e[0];
            $b = $e[1];
            $adj[$a][] = $b;
            $adj[$b][] = $a;
            $sorted = [min($a, $b), max($a, $b)];
            $edgeSet[implode(',', $sorted)] = true;
        }

        $visited = array_fill(0, $n, false);
        $result = 0;

        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $component = array();
                $queue = array();
                array_push($queue, $i);
                $visited[$i] = true;
                $component[] = $i;

                while (!empty($queue)) {
                    $node = array_shift($queue);
                    foreach ($adj[$node] as $neighbor) {
                        if (!$visited[$neighbor]) {
                            $visited[$neighbor] = true;
                            array_push($queue, $neighbor);
                            $component[] = $neighbor;
                        }
                    }
                }

                $m = count($component);
                if ($m == 1) {
                    $result++;
                    continue;
                }

                $required = $m * ($m - 1) / 2;
                $actual = 0;

                for ($j = 0; $j < $m; $j++) {
                    for ($k = $j + 1; $k < $m; $k++) {
                        $u = $component[$j];
                        $v = $component[$k];
                        $key = min($u, $v) . ',' . max($u, $v);
                        if (isset($edgeSet[$key])) {
                            $actual++;
                        }
                    }
                }

                if ($actual == $required) {
                    $result++;
                }
            }
        }

        return $result;
    }
}