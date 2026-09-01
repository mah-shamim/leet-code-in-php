3568\. Minimum Moves to Clean the Classroom

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Bit Manipulation`, `Breadth-First Search`, `Matrix`, `Weekly Contest 452`

You are given an `m x n` grid `classroom` where a student volunteer is tasked with cleaning up litter scattered around the room. Each cell in the grid is one of the following:

- `'S'`: Starting position of the student
- `'L'`: Litter that must be collected (once collected, the cell becomes empty)
- `'R'`: Reset area that restores the student's energy to full capacity, regardless of their current energy level (can be used multiple times)
- `'X'`: Obstacle the student cannot pass through
- `'.'`: Empty space

You are also given an integer `energy`, representing the student's maximum energy capacity. The student starts with this energy from the starting position `'S'`.

Each move to an adjacent cell (up, down, left, or right) costs 1 unit of energy. If the energy reaches 0, the student can only continue if they are on a reset area `'R'`, which resets the energy to its **maximum** capacity `energy`.

Return _the **minimum** number of moves required to collect all litter items, or `-1` if it's impossible_.

**Example 1:**

- **Input:** classroom = ["S.", "XL"], energy = 2
- **Output:** 2
- **Explanation:**
  - The student starts at cell `(0, 0)` with 2 units of energy.
  - Since cell `(1, 0)` contains an obstacle `'X'`, the student cannot move directly downward.
  - A valid sequence of moves to collect all litter is as follows:
    - Move 1: From `(0, 0)` → `(0, 1)` with 1 unit of energy and 1 unit remaining.
    - Move 2: From `(0, 1) `→ `(1, 1)` to collect the litter `'L'`.
  - The student collects all the litter using 2 moves. Thus, the output is 2.


**Example 2:**

- **Input:** classroom = ["LS", "RL"], energy = 4
- **Output:** 3
- **Explanation:**
  - The student starts at cell `(0, 1)` with 4 units of energy.
  - A valid sequence of moves to collect all litter is as follows:
    - Move 1: From `(0, 1)` → `(0, 0)` to collect the first litter `'L'` with 1 unit of energy used and 3 units remaining.
    - Move 2: From `(0, 0)` → `(1, 0)` to `'R'` to reset and restore energy back to 4.
    - Move 3: From `(1, 0)` → `(1, 1)` to collect the second litter `'L'`.
  - The student collects all the litter using 3 moves. Thus, the output is 3.


**Example 3:**

- **Input:** classroom = ["L.S", "RXL"], energy = 3
- **Output:** -1
- **Explanation:** No valid path collects all `'L'`.


**Example 4:**

- **Input:** classroom = ["L", "R", ".", "S", "."], energy = 1
- **Output:** -1


**Example 5:**

- **Input:** classroom = ["S...................", "....................", "....................", "....................", ".....RL........RR...", "....................", "......L....R..L.....", ".....L..............", ".........L........LL", "....................", "....................", "....................", "........L...........", "....................", "....................", "....................", "....L...............", "....................", ".....R..............", "..............L....."], energy = 20
- **Output:** 71


**Example 6:**

- **Input:** classroom = ["SL"], energy = 1
- **Output:** 1


**Example 7:**

- **Input:** classroom = ["S.L", "..R"], energy = 2
- **Output:** 5


**Example 8:**

- **Input:** classroom = ["SX", "XL"], energy = 5
- **Output:** -1


**Example 9:**

- **Input:** classroom = ["SRL"], energy = 1
- **Output:** 2

**Constraints:**

- `1 <= m == classroom.length <= 20`
- `1 <= n == classroom[i].length <= 20`
- `classroom[i][j]` is one of `'S'`, `'L'`, `'R'`, `'X'`, or `'.'`
- `1 <= energy <= 50`
- There is exactly **one** `'S'` in the grid.
- There are **at most** 10 `'L'` cells in the grid.


**Hint:**
1. Use BFS with states `(x, y, mask, e, steps)`, initializing with `(sx, sy, 0, energy, 0)`, and for each move update `e` (–1 per step), update `mask` on `'L'`, reset `e=energy` on `'R'`, and return `steps` when `mask == fullMask`.
2. Maintain a 3D array `bestEnergy[x][y][mask]` storing the maximum `e` seen for each `(x,y,mask)` and skip any new state with `e <= bestEnergy[x][y][mask]` to prune.


**Solution:**

We implement a **state‑space BFS** over `(x, y, mask, energy)`, where `mask` tracks which litter cells (`L`) have been collected. The search respects energy constraints, resets on `R`, and prunes dominated states to keep the problem feasible (≤10 litter, 20×20 grid, energy≤50). The BFS guarantees the first time we visit `fullMask` yields the minimum number of moves.

## Approach

- **State definition** – `(x, y, mask, e)`: position, collected‑litter bitmask, current energy.
- **Initialisation** – start at `S` with `mask=0`, `e=energy`, `steps=0`.
- **Transition** – for each neighbor not `X`:
   - Compute `ne = e - 1`. If `e == 0`, we **can only move** if currently on `R` (reset to `energy` before moving → `ne = energy - 1`).
   - After moving, if the new cell is `R`, set `ne = energy` (reset).
   - If the new cell is `L` and not yet in `mask`, add its bit.
- **Pruning** – maintain `bestEnergy[x][y][mask]` = maximum energy seen for that state; skip if `ne <= bestEnergy[...]`.
- **Termination** – return `steps + 1` when `mask == fullMask`; if queue empties, return `-1`.


Let's implement this solution in PHP: **[3568. Minimum Moves to Clean the Classroom](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003568-minimum-moves-to-clean-the-classroom/solution.php)**

```php
<?php
/**
 * @param String[] $classroom
 * @param Integer $energy
 * @return Integer
 */
function minMoves(array $classroom, int $energy): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minMoves(["S.", "XL"], 2) .  "\n";                         // Output: 2
echo minMoves(["LS", "RL"], 4) .  "\n";                         // Output: 3
echo minMoves(["L.S", "RXL"], 3) .  "\n";                       // Output: -1
echo minMoves(["L", "R", ".", "S", "."], 1) .  "\n";            // Output: -1

$classroom = ["S...................", "....................", "....................", "....................", ".....RL........RR...", "....................", "......L....R..L.....", ".....L..............", ".........L........LL", "....................", "....................", "....................", "........L...........", "....................", "....................", "....................", "....L...............", "....................", ".....R..............", "..............L....."];
$energy = 20;
echo minMoves($classroom, $energy) .  "\n";                     // Output: 71
echo minMoves(["SL"], 1) .  "\n";                               // Output: 1
echo minMoves(["S.L", "..R"], 2) .  "\n";                       // Output: 5
echo minMoves(["SX", "XL"], 5) .  "\n";                         // Output: -1
echo minMoves(["SRL"], 1) .  "\n";                              // Output: 2
?>
```

### Explanation:

- **BFS overstates, not just cells** – because energy and collected litter matter, a simple grid BFS is insufficient.
- **Handling energy zero** – the student may only **leave** an `R` cell with zero energy; we implement this by checking `e == 0` before moving and resetting if standing on `R`.
- **Reset on arrival** – after moving into `R`, we immediately refill energy to `energy`.
- **Mask for litter** – up to 10 litter cells → bitmask fits in 1024 states; efficient memory with `bestEnergy[20][20][1024]`.
- **Pruning with max energy** – if we reach the same `(x, y, mask)` with lower or equal energy, it is never better than a previous visit with higher energy, so we discard it.
- **Correctness** – BFS explores states in non‑decreasing move count, so the first full‑mask state is optimal. Obstacles and resets are correctly modeled, and all moves are reversible.

## Complexity Analysis

- **Time** – `O(m * n * 2ᴸ * energy)` in worst case, but pruning keeps it near `O(m * n * 2ᴸ)` because `energy` is bounded by 50 and dominated states are skipped.
- **Space** – `O(m * n * 2ᴸ)` for `bestEnergy`, plus queue overhead.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**