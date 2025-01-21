2257\. Count Unguarded Cells in the Grid

**Difficulty:** Medium

**Topics:** `Array`, `Matrix`, `Simulation`

You are given two integers `m` and `n` representing a **0-indexed** `m x n` grid. You are also given two 2D integer arrays `guards` and `walls` where <code>guards[i] = [row<sub>i</sub>, col<sub>i</sub>]</code> and <code>walls[j] = [row<sub>j</sub>, col<sub>j</sub>]</code> represent the positions of the <code>i<sup>th</sup></code> guard and <code>j<sup>th</sup></code> wall respectively.

A guard can see **every** cell in the four cardinal directions (north, east, south, or west) starting from their position unless **obstructed** by a wall or another guard. A cell is **guarded** if there is **at least** one guard that can see it.

Return _the number of unoccupied cells that are **not guarded**_.

**Example 1:**

![example1drawio2](https://assets.leetcode.com/uploads/2022/03/10/example1drawio2.png)

- **Input:** m = 4, n = 6, guards = [[0,0],[1,1],[2,3]], walls = [[0,1],[2,2],[1,4]]
- **Output:** 7
- **Explanation:** The guarded and unguarded cells are shown in red and green respectively in the above diagram.
  There are a total of 7 unguarded cells, so we return 7.

**Example 2:**

![example2drawio](https://assets.leetcode.com/uploads/2022/03/10/example2drawio.png)

- **Input:** m = 3, n = 3, guards = [[1,1]], walls = [[0,1],[1,0],[2,1],[1,2]]
- **Output:** 4
- **Explanation:** The unguarded cells are shown in green in the above diagram.
  There are a total of 4 unguarded cells, so we return 4.



**Constraints:**

- <code>1 <= m, n <= 10<sup>5</sup></code>
- <code>2 <= m * n <= 10<sup>5</sup></code>
- <code>1 <= guards.length, walls.length <= 5 * 10<sup>4</sup></code>
- `2 <= guards.length + walls.length <= m * n`
- `guards[i].length == walls[j].length == 2`
- <code>0 <= row<sub>i</sub>, row<sub>j</sub> < m</code>
- <code>0 <= col<sub>i</sub>, col<sub>j</sub> < n</code>
- All the positions in `guards` and `walls` are **unique**.


**Hint:**
1. Create a 2D array to represent the grid. Can you mark the tiles that can be seen by a guard?
2. Iterate over the guards, and for each of the 4 directions, advance the current tile and mark the tile. When should you stop advancing?



**Solution:**

We need to mark the cells that are guarded by at least one guard. The guards can see in four cardinal directions (north, south, east, and west), but their vision is blocked by walls. We can simulate this process and count the number of cells that are unguarded.

### Approach:
1. **Create a grid**: We can represent the grid as a 2D array where each cell can either be a wall, a guard, or empty.
2. **Mark guarded cells**: For each guard, iterate in the four directions (north, south, east, west) and mark all the cells it can see, stopping when we encounter a wall or another guard.
3. **Count unguarded cells**: After marking the guarded cells, count how many cells are not guarded and are not walls.

### Steps:
1. **Grid Initialization**: Create a 2D array to represent the grid. Mark cells with walls, guards, and guarded areas as we iterate.

2. **Simulating Guard Coverage**:
   - Guards can see in four directions (north, south, east, west).
   - Mark cells guarded by each guard until encountering a wall or another guard.

3. **Counting Unguarded Cells**: After processing all guards, count cells that are neither walls, guards, nor guarded.

Let's implement this solution in PHP: **[2257. Count Unguarded Cells in the Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002257-count-unguarded-cells-in-the-grid/solution.php)**

```php
<?php
/**
 * @param Integer $m
 * @param Integer $n
 * @param Integer[][] $guards
 * @param Integer[][] $walls
 * @return Integer
 */
function countUnguarded($m, $n, $guards, $walls) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$m = 4;
$n = 6;
$guards = [[0, 0], [1, 1], [2, 3]];
$walls = [[0, 1], [2, 2], [1, 4]];
echo countUnguarded($m, $n, $guards, $walls); // Output: 7

// Example 2
$m = 3;
$n = 3;
$guards = [[1, 1]];
$walls = [[0, 1], [1, 0], [2, 1], [1, 2]];
echo countUnguarded($m, $n, $guards, $walls); // Output: 4
?>
```

### Explanation:

1. **Initialization**:
   - The grid is initialized with `0` for empty cells. Walls and guards are marked with unique constants.

2. **Guard Simulation**:
   - For each guard, simulate movement in all four directions, marking cells as guarded until hitting a wall or another guard.

3. **Counting Unguarded Cells**:
   - After processing all guards, iterate through the grid and count cells still marked as `0`.

### Performance:
- Time complexity: _**O(m x n + g x d)**_, where _**g**_ is the number of guards and _**d**_ is the number of cells in the direction each guard can travel.
- Space complexity: _**O(m x n)**_ for the grid.

### Time Complexity:
- **Grid initialization**: **_O(m * n)**_, where _**m**_ and _**n**_ are the dimensions of the grid.
- **Marking guard vision**: Each guard checks at most the length of the row or column in the four directions. So, for each guard, it's _**O(m + n)**_.
- **Counting unguarded cells**: _**O(m * n)**_.

Thus, the overall complexity is _**O(m * n)**_, which is efficient given the problem constraints.

### Edge Cases:
- If no `guards` or `walls` exist, the entire grid will be unguarded.
- If all cells are either guarded or walls, the result will be `0` unguarded cells.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
