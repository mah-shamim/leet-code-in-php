3651\. Minimum Cost Path with Teleportations

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Matrix`, `Biweekly Contest 163`

You are given a `m x n` 2D integer array `grid` and an integer `k`. You start at the top-left cell `(0, 0)` and your goal is to reach the bottom‐right cell `(m - 1, n - 1)`.

There are two types of moves available:
- **Normal move**: You can move right or down from your current cell `(i, j)`, i.e. you can move to `(i, j + 1)` (right) or `(i + 1, j)` (down). The cost is the value of the destination cell.
- **Teleportation**: You can teleport from any cell `(i, j)`, to any cell `(x, y)` such that `grid[x][y] <= grid[i][j]`; the cost of this move is 0. You may teleport at most `k` times.

Return the **minimum** total cost to reach cell `(m - 1, n - 1)` from `(0, 0)`.

**Example 1:**

- **Input:** grid = [[1,3,3],[2,5,4],[4,3,5]], k = 2
- **Output:** 2
- **Explanation:**
  - Initially we are at (0, 0) and cost is 0.
  
  | Current Position	 | Move	               | New Position	 | Total Cost |
  |-------------------|---------------------|---------------|------------|
  | (0, 0)	           | Move Down	          | (1, 0)	       | 0 + 2 = 2  |
  | (1, 0)	           | Move Right	         | (1, 1)	       | 2 + 5 = 7  |
  | (1, 1)	           | Teleport to (2, 2)	 | (2, 2)	       | 7 + 0 = 7  |
   - The minimum cost to reach bottom-right cell is 7.

**Example 2:**

- **Input:** grid = [[1,2],[2,3],[3,4]], k = 1
- **Output:** 9
- **Explanation:**
  - Initially we are at (0, 0) and cost is 0.
  
  | Current Position	 | Move	       | New Position	 | Total Cost |
  |-------------------|-------------|---------------|------------|
  | (0, 0)	           | Move Down	  | (1, 0)	       | 0 + 2 = 2  |
  | (1, 0)	           | Move Right	 | (1, 1)	       | 2 + 3 = 5  |
  | (1, 1)	           | Move Down	  | (2, 1)	       | 5 + 4 = 9  |
  - The minimum cost to reach bottom-right cell is 9.

**Constraints:**

- `2 <= m, n <= 80`
- `m == grid.length`
- `n == grid[i].length`
- `0 <= grid[i][j] <= 10⁴`
- `0 <= k <= 10`



**Hint:**
1. Use dynamic programming to solve the problem efficiently.
2. Think of the solution in terms of up to `k` teleportation steps. At each step, compute the minimum cost to reach each cell, either through a normal move or a teleportation from the previous step.






**Solution:**

We solve this problem using dynamic programming with state `dp[t][i][j]` representing the minimum cost to reach cell `(i, j)` using exactly `t` teleportations. The solution proceeds in the following steps:

### Approach:

1. **Base case (no teleportation)**: Compute `dp[0][i][j]` using only normal moves (right and down), adding the cost of the destination cell.
2. **For each teleportation count from 1 to k**:
   - Preprocess the minimum `dp[t-1][i][j]` for each grid value.
   - For each cell `(i, j)`, compute the minimum cost to reach it via teleportation from any cell `(x, y)` with `grid[x][y] >= grid[i][j]` (since we can teleport to `(i, j)` if its value is ≤ the source's value).
   - Combine this with the cost of normal moves (using the same teleportation count `t`).
3. **Final answer**: Minimum of `dp[t][m-1][n-1]` over all `t` from 0 to k.

Let's implement this solution in PHP: **[3651. Minimum Cost Path with Teleportations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003651-minimum-cost-path-with-teleportations/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer
 */
function minCost(array $grid, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minCost([[1,3,3],[2,5,4],[4,3,5]], 2) . "\n";      // Output: 7
echo minCost([[1,2],[2,3],[3,4]], 1) . "\n";            // Output: 9
?>
```

### Explanation:

- **Normal moves** only allow moving right or down, and the cost is the value of the destination cell. This is handled by a standard grid DP for `t = 0`.
- **Teleportation** allows jumping from any cell `(x, y)` to any cell `(i, j)` if `grid[i][j] ≤ grid[x][y]`, with zero cost. To compute the best teleportation cost for a cell `(i, j)` at step `t`, we need the minimum `dp[t-1][x][y]` over all cells `(x, y)` with `grid[x][y] ≥ grid[i][j]`. We can precompute this efficiently using prefix minima over grid values.
- **Efficiency**: We iterate over teleportation counts (up to k=10), and for each we process the grid (max 80×80) and grid values (up to 10⁴). The overall complexity is acceptable.

### Complexity
- **Time Complexity**: O(k × (m × n + V)) where V ≤ 10⁴ (max grid value)
- **Space Complexity**: O(k × m × n) for DP table

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
- 