778\. Swim in Rising Water

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Heap (Priority Queue)`, `Matrix`, `Weekly Contest 70`

You are given an `n x n` integer matrix `grid` where each value `grid[i][j]` represents the elevation at that point `(i, j)`.

It starts raining, and water gradually rises over time. At time `t`, the water level is `t`, meaning **any** cell with elevation less than equal to `t` is submerged or reachable.

You can swim from a square to another 4-directionally adjacent square if and only if the elevation of both squares individually are at most `t`. You can swim infinite distances in zero time. Of course, you must stay within the boundaries of the grid during your swim.

Return _the minimum time until you can reach the bottom right square `(n - 1, n - 1)` if you start at the top left square `(0, 0)`_.

**Example 1:**

![swim1-grid](https://assets.leetcode.com/uploads/2021/06/29/swim1-grid.jpg)

- **Input:** grid = [[0,2],[1,3]]
- **Output:** 3
- **Explanation:**
  At time 0, you are in grid location (0, 0).
  You cannot go anywhere else because 4-directionally adjacent neighbors have a higher elevation than t = 0.
  You cannot reach point (1, 1) until time 3.
  When the depth of water is 3, we can swim anywhere inside the grid.

**Example 2:**

![swim2-grid-1](https://assets.leetcode.com/uploads/2021/06/29/swim2-grid-1.jpg)

- **Input:** grid = [[0,1,2,3,4],[24,23,22,21,5],[12,13,14,15,16],[11,17,18,19,20],[10,9,8,7,6]]
- **Output:** 16
- **Explanation:**
  The final route is shown.
  We need to wait until time 16 so that (0, 0) and (4, 4) are connected.

**Constraints:**

- `n == grid.length`
- `n == grid[i].length`
- `1 <= n <= 50`
- `0 <= grid[i][j] < n²`
- Each value `grid[i][j]` is **unique**.



**Hint:**
1. Use either Dijkstra's, or binary search for the best time T for which you can reach the end if you only step on squares at most T.


**Similar Questions:**
1. [1631. Path With Minimum Effort](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001631-path-with-minimum-effort)






**Solution:**

We need to determine the minimum time required to swim from the top-left corner (0, 0) to the bottom-right corner (n-1, n-1) of an n x n grid, where each cell has a unique elevation. The water level rises over time, and at time `t`, any cell with an elevation ≤ `t` is reachable. We can move to adjacent cells (up, down, left, right) only if both the current and target cells have elevations ≤ `t`.

### Approach
1. **Binary Search on Time**: We perform a binary search on the possible time values (from 0 to the maximum elevation in the grid) to find the minimum time `t` such that there exists a path from (0, 0) to (n-1, n-1) where all cells in the path have elevations ≤ `t`.
2. **Breadth-First Search (BFS) for Path Checking**: For each candidate time `t` during the binary search, we use BFS to check if a path exists from the start to the end where all cells in the path have elevations ≤ `t`. We mark visited cells to avoid cycles.

Let's implement this solution in PHP: **[778. Swim in Rising Water](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000778-swim-in-rising-water/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function swimInWater($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $grid
 * @param $time
 * @param $n
 * @return bool
 */
function canReach($grid, $time, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$grid1 = [[0,2],[1,3]];
echo swimInWater($grid1) . PHP_EOL; // 3

$grid2 = [
    [0,1,2,3,4],
    [24,23,22,21,5],
    [12,13,14,15,16],
    [11,17,18,19,20],
    [10,9,8,7,6]
];
echo swimInWater($grid2) . PHP_EOL; // 16
?>
```

### Explanation:

1. **Binary Search Setup**: We initialize `left` to 0 and `right` to the maximum possible elevation (n² - 1). This range covers all possible time values from the start to the maximum elevation in the grid.
2. **Path Existence Check**: For each midpoint `mid` in the binary search, we check if a path exists from (0, 0) to (n-1, n-1) using BFS, considering only cells with elevations ≤ `mid`.
3. **BFS Implementation**: The BFS starts from (0, 0) and explores all reachable cells. If the destination (n-1, n-1) is reached, the candidate time `mid` is feasible, and we adjust the binary search range accordingly.
4. **Result**: The binary search converges to the minimum time `t` such that there exists a valid path from the start to the end under the water level `t`.

This approach efficiently narrows down the possible time values using binary search and checks path feasibility using BFS, ensuring optimal performance even for the upper constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**