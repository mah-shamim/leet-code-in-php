<?php

class Solution
{

    /**
     * @param Integer[][] $land
     * @return Integer[][]
     */
    function findFarmland(array $land): array
    {
        $row = count($land);
        $col = count($land[0]);
        $ans = [];
        for ($y = 0; $y < $row; ++$y) {
            for ($x = 0; $x < $col; ++$x) {
                if (!$land[$y][$x])
                    continue;
                $pos = array_fill(0, 4, 0);
                $pos[0] = $y;
                $pos[1] = $x;
                $q = new SplQueue();
                $q->enqueue([$y, $x]);
                while (!$q->isEmpty()) {
                    list($y1, $x1) = $q->dequeue();
                    if ($y1 == -1 or $y1 == $row or $x1 == -1 or $x1 == $col or !$land[$y1][$x1])
                        continue;
                    $land[$y1][$x1] = 0;
                    $pos[2] = $y1;
                    $pos[3] = $x1;
                    $q->enqueue([$y1, $x1 + 1]);
                    $q->enqueue([$y1 + 1, $x1]);
                }
                $ans[] = $pos;
            }
        }
        return $ans;
    }
}