<?php

class Solution {

    /**
     * @param String[] $classroom
     * @param Integer $energy
     * @return Integer
     */
    function minMoves(array $classroom, int $energy): int
    {
        $m = count($classroom);
        $n = strlen($classroom[0]);

        // Locate start and all litter positions
        $startX = $startY = -1;
        $litterPos = [];
        $litterId = [];

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $ch = $classroom[$i][$j];
                if ($ch === 'S') {
                    $startX = $i;
                    $startY = $j;
                } elseif ($ch === 'L') {
                    $litterPos[] = [$i, $j];
                    $litterId["$i,$j"] = count($litterPos) - 1;
                }
            }
        }

        $totalLitter = count($litterPos);
        $fullMask = (1 << $totalLitter) - 1;

        // BFS Queue: [x, y, mask, energy, steps]
        $queue = [];
        $queue[] = [$startX, $startY, 0, $energy, 0];

        // bestEnergy[x][y][mask] = max energy seen for this state
        $bestEnergy = array_fill(0, $m, array_fill(0, $n, array_fill(0, 1 << $totalLitter, -1)));

        $directions = [[-1,0],[1,0],[0,-1],[0,1]];

        while (!empty($queue)) {
            $state = array_shift($queue);
            [$x, $y, $mask, $e, $steps] = $state;

            if ($mask === $fullMask) {
                return $steps;
            }

            foreach ($directions as $dir) {
                $nx = $x + $dir[0];
                $ny = $y + $dir[1];

                if ($nx < 0 || $nx >= $m || $ny < 0 || $ny >= $n) continue;
                if ($classroom[$nx][$ny] === 'X') continue;

                $ne = $e - 1;
                $newMask = $mask;

                // If energy is 0 and we're not on R, can't move
                if ($ne < 0) {
                    // Only allowed to continue if current cell is 'R' or we are moving into 'R'?
                    // The problem says: If energy reaches 0, student can only continue if they are on reset area 'R',
                    // which resets energy to maximum. So the reset happens when standing ON 'R' at start of move.
                    // In the move sequence above, we deduct energy before moving.
                    // According to problem: If energy reaches 0, can only continue if they are on reset area.
                    // That means after moving, if energy is 0, we check if current cell is R -> reset.
                    // We will handle this below.
                    // But careful: Energy becomes 0 after move, then if new cell is R, reset.
                    // If energy is already 0 before moving, can only move if we are on R (reset before moving)
                    // Actually easier: Let's allow move if we have at least 1 energy or we are on R (reset before moving)
                    if ($e == 0) {
                        // Can we reset before moving?
                        // If current cell is R, we can reset energy to full.
                        if ($classroom[$x][$y] === 'R') {
                            $ne = $energy - 1; // reset and then move
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }

                // If new cell is L and not collected yet
                if ($classroom[$nx][$ny] === 'L') {
                    $id = $litterId["$nx,$ny"];
                    if (!($mask & (1 << $id))) {
                        $newMask = $mask | (1 << $id);
                    }
                }

                // If new cell is R, reset energy to full after move
                if ($classroom[$nx][$ny] === 'R') {
                    $ne = $energy;
                }

                // If we land on L, we also reset? No, L doesn't reset.
                // But if energy becomes 0 on L, it's fine, we already collected.
                // Actually no rule about L resetting.

                if ($ne > $bestEnergy[$nx][$ny][$newMask]) {
                    $bestEnergy[$nx][$ny][$newMask] = $ne;
                    $queue[] = [$nx, $ny, $newMask, $ne, $steps + 1];
                }
            }
        }

        return -1;
    }
}