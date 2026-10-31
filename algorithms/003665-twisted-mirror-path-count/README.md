3665\. Twisted Mirror Path Count

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Matrix`, `Biweekly Contest 164`

Given an `m x n` binary grid `grid` where:

- `grid[i][j] == 0` represents an empty cell, and
- `grid[i][j] == 1` represents a mirror.

A robot starts at the top-left corner of the grid `(0, 0)` and wants to reach the bottom-right corner `(m - 1, n - 1)`. It can move only **right** or **down**. If the robot attempts to move into a mirror cell, it is **reflected** before entering that cell:

- If it tries to move **right** into a mirror, it is turned **down** and moved into the cell directly below the mirror.
- If it tries to move **down** into a mirror, it is turned **right** and moved into the cell directly to the right of the mirror.

If this reflection would cause the robot to move outside the `grid` boundaries, the path is considered invalid and should not be counted.

Return the number of unique valid paths from `(0, 0)` to `(m - 1, n - 1)`.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

**Note:** If a reflection moves the robot into a mirror cell, the robot is immediately reflected again based on the direction it used to enter that mirror: if it entered while moving right, it will be turned down; if it entered while moving down, it will be turned right. This process will continue until either the last cell is reached, the robot moves out of bounds or the robot moves to a non-mirror cell.

**Example 1:**

- **Input:** grid = [[0,1,0],[0,0,1],[1,0,0]]
- **Output:** 5
- **Explanation:**
  |Number	|Full Path|
  |---------|--------------------------------------------------|
  |1	|(0, 0) → (0, 1) [M] → (1, 1) → (1, 2) [M] → (2, 2)|
  |2	|(0, 0) → (0, 1) [M] → (1, 1) → (2, 1) → (2, 2)|
  |3	|(0, 0) → (1, 0) → (1, 1) → (1, 2) [M] → (2, 2)|
  |4	|(0, 0) → (1, 0) → (1, 1) → (2, 1) → (2, 2)|
  |5	|(0, 0) → (1, 0) → (2, 0) [M] → (2, 1) → (2, 2)|

  - `[M]` indicates the robot attempted to enter a mirror cell and instead reflected.


**Example 2:**

- **Input:** grid = [[0,0],[0,0]]
- **Output:** 2
- **Explanation:**
  |Number	|Full Path|
  |---------|------------------------------|
  |1	|(0, 0) → (0, 1) → (1, 1)|
  |2	|(0, 0) → (1, 0) → (1, 1)|

**Example 3:**

- **Input:** grid = [[0,1,1],[1,1,0]]
- **Output:** 1
- **Explanation:**
  |Number	|Full Path|
  |---------|------------------------------|
  |1	|(0, 0) → (0, 1) [M] → (1, 1) [M] → (1, 2)|
  - `(0, 0) → (1, 0) [M] → (1, 1) [M] → (2, 1)` goes out of bounds, so it is invalid.


**Example 3:**

- **Input:** grid = [[0,1,1],[1,1,0]]
- **Output:** 1


**Example 4:**

- **Input:** grid = [[0,0],[0,0]]
- **Output:** 2


**Example 5:**

- **Input:** grid = [[0,0,0],[0,0,0]]
- **Output:** 3


**Example 6:**

- **Input:** grid = [[0,0,0],[0,0,0],[0,0,0]]
- **Output:** 6


**Example 7:**

- **Input:** grid = [[0,1],[0,0]]
- **Output:** 2


**Example 8:**

- **Input:** grid = [[0,0],[1,0]]
- **Output:** 1

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `2 <= m, n <= 500`
- `grid[i][j]` is either `0` or `1`.
- `grid[0][0] == grid[m - 1][n - 1] == 0`


**Hint:**

1. Precompute, for each cell and each move (right/down), where you actually land if there’s a mirror next—store these "jump" targets in a `go[i][j][0/1]` table.
2. Let `dp[i][j]` = number of ways to reach (i,j); set `dp[0][0] = 1`, then scan cells in row‑major order and for each `dp[i][j] > 0` add `dp[i][j]` into `dp[x][y]` for both precomputed moves.
3. Always take additions modulo `10⁹+7`, and skip any jump target that falls outside the grid.


**Solution:**

We precompute, for every mirror cell, where the robot finally lands when entering that mirror from the right/down direction. Then we scan the grid in row-major order and propagate path counts from each reachable empty cell using the precomputed jump targets. All additions are taken modulo `10⁹ + 7`.

## Approach

- Flatten the `m x n` grid into an array of size `m * n` for faster indexing.
- Precompute two tables:
  - `rightEnter[idx]`: final landing cell if the robot enters mirror `idx` while moving right.
  - `downEnter[idx]`: final landing cell if the robot enters mirror `idx` while moving down.
- Process mirrors from bottom-right to top-left because each mirror’s landing depends only on the cell below it or to its right.
- Use `-1` to represent an invalid landing that goes outside the grid.
- Run DP in row-major order:
  - `dp[0] = 1`.
  - For each reachable empty cell, try moving right and down.
  - If the next cell is empty, land there directly.
  - If the next cell is a mirror, use the corresponding precomputed landing table.
  - Skip invalid `-1` targets.
- Return `dp[m*n - 1] % MOD`.

Let's implement this solution in PHP: **[3665. Twisted Mirror Path Count](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003665-twisted-mirror-path-count/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function uniquePaths(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo uniquePaths([[0,1,0],[0,0,1],[1,0,0]]) . "\n";     // Output: 5
echo uniquePaths([[0,0],[0,0]]) . "\n";                 // Output: 2
echo uniquePaths([[0,1,1],[1,1,0]]) . "\n";             // Output: 1
echo uniquePaths([[0,0],[0,0]]) . "\n";                 // Output: 2
echo uniquePaths([[0,0,0],[0,0,0]]) . "\n";             // Output: 3
echo uniquePaths([[0,0,0],[0,0,0],[0,0,0]]) . "\n";     // Output: 6
echo uniquePaths([[0,1],[0,0]]) . "\n";                 // Output: 2
echo uniquePaths([[0,0],[1,0]]) . "\n";                 // Output: 2 (corrected from table's 1)
?>
```

## Explanation

- A mirror never appears as a normal DP state because the robot is reflected before entering it; mirror cells are only used during jump precomputation.
- For a mirror at `(i, j)`:
  - Entering from the left while moving right sends the robot down to `(i+1, j)`.
  - If `(i+1, j)` is also a mirror, the robot immediately reflects again using `downEnter[(i+1, j)]`.
  - Entering from above while moving down sends the robot right to `(i, j+1)`.
  - If `(i, j+1)` is also a mirror, the robot immediately reflects again using `rightEnter[(i, j+1)]`.
- DP transitions:
  - Move right from `(i, j)`:
    - If `(i, j+1)` is empty, target is `(i, j+1)`.
    - If `(i, j+1)` is a mirror, target is `rightEnter[(i, j+1)]`.
  - Move down from `(i, j)`:
    - If `(i+1, j)` is empty, target is `(i+1, j)`.
    - If `(i+1, j)` is a mirror, target is `downEnter[(i+1, j)]`.
- Row-major order is valid because every move or reflection chain ultimately moves to a later row or later column, never to an earlier cell.
- Modulo addition is safe because both `dp[target]` and `ways` are less than `MOD`, so one subtraction is enough after addition.

## Complexity Analysis

- **Time Complexity:** `O(m * n)`
  - Precomputation visits each cell once.
  - DP visits each cell once and performs constant work per direction.
- **Space Complexity:** `O(m * n)`
  - `dp` array of size `m * n`.
  - `rightEnter` and `downEnter` arrays each of size `m * n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**