3882\. Minimum XOR Path in a Grid

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Bit Manipulation`, `Matrix`, `Biweekly Contest 179`

You are given a 2D integer array `grid` of size `m * n`.

You start at the **top-left** cell `(0, 0)` and want to reach the **bottom-right** cell `(m - 1, n - 1)`.

At each step, you **may** move either **right or down**.

The **cost** of a path is defined as the **bitwise XOR** of all the values in the cells along that path, **including** the start and end cells.

Return the **minimum** possible XOR value among all valid paths from `(0, 0)` to `(m - 1, n - 1)`.

**Example 1:**

- **Input:** grid = [[1,2],[3,4]]
- **Output:** 6
- **Explanation:**
    - There are two valid paths:
       - `(0, 0) → (0, 1) → (1, 1)` with XOR: `1 XOR 2 XOR 4 = 7`
       - `(0, 0) → (1, 0) → (1, 1)` with XOR: `1 XOR 3 XOR 4 = 6`
    - The minimum XOR value among all valid paths is 6.

**Example 2:**

- **Input:** grid = [[6,7],[5,8]]
- **Output:** 9
- **Explanation:**
    - There are two valid paths:
       - `(0, 0) → (0, 1) → (1, 1)` with XOR: `6 XOR 7 XOR 8 = 9`
       - `(0, 0) → (1, 0) → (1, 1)` with XOR: `6 XOR 5 XOR 8 = 11`
    - The minimum XOR value among all valid paths is 9.

**Example 3:**

- **Input:** grid = [[2,7,5]]
- **Output:** 0
- **Explanation:**
    - There is only one valid path:
       - `(0, 0) → (0, 1) → (0, 2)` with XOR: `2 XOR 7 XOR 5 = 0`
    - The minimum XOR value among all valid paths is 0.

**Example 4:**

- **Input:** grid = [[0]]
- **Output:** 0
- **Explanation:**
    - There is only one valid path:
       - `(0, 0)` with XOR: `0`
    - The minimum XOR value among all valid paths is 0.

**Example 5:**

- **Input:** grid = [[5]]
- **Output:** 5
- **Explanation:**
    - There is only one valid path:
       - `(0, 0)` with XOR: `5`
    - The minimum XOR value among all valid paths is 5.

**Example 6:**

- **Input:** grid = [[1,1],[1,1]]
- **Output:** 1
- **Explanation:**
    - There are two valid paths:
       - `(0, 0) → (0, 1) → (1, 1)` with XOR: `1 XOR 1 XOR 1 = 1`
       - `(0, 0) → (1, 0) → (1, 1)` with XOR: `1 XOR 1 XOR 1 = 1`
    - The minimum XOR value among all valid paths is 1.

**Example 7:**

- **Input:** grid = [[1,2,3],[4,5,6],[7,8,9]]
- **Output:** 1
- **Explanation:**
    - There are six valid paths:
       - `(0,0)→(0,1)→(0,2)→(1,2)→(2,2)` with XOR: `1 XOR 2 XOR 3 XOR 6 XOR 9 = 15`
       - `(0,0)→(0,1)→(1,1)→(1,2)→(2,2)` with XOR: `1 XOR 2 XOR 5 XOR 6 XOR 9 = 9`
       - `(0,0)→(0,1)→(1,1)→(2,1)→(2,2)` with XOR: `1 XOR 2 XOR 5 XOR 8 XOR 9 = 7`
       - `(0,0)→(1,0)→(1,1)→(1,2)→(2,2)` with XOR: `1 XOR 4 XOR 5 XOR 6 XOR 9 = 15`
       - `(0,0)→(1,0)→(1,1)→(2,1)→(2,2)` with XOR: `1 XOR 4 XOR 5 XOR 8 XOR 9 = 1`
       - `(0,0)→(1,0)→(2,0)→(2,1)→(2,2)` with XOR: `1 XOR 4 XOR 7 XOR 8 XOR 9 = 3`
    - The minimum XOR value among all valid paths is 1.

**Example 8:**

- **Input:** grid = [[1023,1023],[1023,1023]]
- **Output:** 1023
- **Explanation:**
    - There are two valid paths:
       - `(0, 0) → (0, 1) → (1, 1)` with XOR: `1023 XOR 1023 XOR 1023 = 1023`
       - `(0, 0) → (1, 0) → (1, 1)` with XOR: `1023 XOR 1023 XOR 1023 = 1023`
    - The minimum XOR value among all valid paths is 1023.

**Example 9:**

- **Input:** grid = [[0,1],[1,0]]
- **Output:** 1
- **Explanation:**
    - There are two valid paths:
       - `(0, 0) → (0, 1) → (1, 1)` with XOR: `0 XOR 1 XOR 0 = 1`
       - `(0, 0) → (1, 0) → (1, 1)` with XOR: `0 XOR 1 XOR 0 = 1`
    - The minimum XOR value among all valid paths is 1.

**Example 10:**

- **Input:** grid = [[1,0],[0,1]]
- **Output:** 0
- **Explanation:**
    - There are two valid paths:
       - `(0, 0) → (0, 1) → (1, 1)` with XOR: `1 XOR 0 XOR 1 = 0`
       - `(0, 0) → (1, 0) → (1, 1)` with XOR: `1 XOR 0 XOR 1 = 0`
    - The minimum XOR value among all valid paths is 0.

**Example 11:**

- **Input:** grid = [[2,3,1,4]]
- **Output:** 4
- **Explanation:**
    - There is only one valid path:
       - `(0, 0) → (0, 1) → (0, 2) → (0, 3)` with XOR: `2 XOR 3 XOR 1 XOR 4 = 4`
    - The minimum XOR value among all valid paths is 4.

**Example 12:**

- **Input:** grid = [[1],[2],[3]]
- **Output:** 0
- **Explanation:**
    - There is only one valid path:
       - `(0, 0) → (1, 0) → (2, 0)` with XOR: `1 XOR 2 XOR 3 = 0`
    - The minimum XOR value among all valid paths is 0.

**Constraints:**

- `1 <= m == grid.length <= 1000`
- `1 <= n == grid[i].length <= 1000`
- `m * n <= 1000`
- `0 <= grid[i][j] <= 1023`


**Hint:**

1. Use dynamic programming with state `dp[i][j][x]`, where `x` is a possible XOR value.
2. `dp[i][j][x]` indicates whether it is possible to reach cell `(i, j)` with XOR equal to `x`.
3. Transition from the top left cell by updating `x ^ grid[i][j]`, and track all reachable XOR values to find the minimum at the end cell.


**Solution:**

We implement a dynamic programming solution that tracks all possible XOR values reachable at each cell in the grid. Since the values are bounded by `1023` (10 bits), we can represent the set of reachable XOR values as a **bitset of 1024 bits (32 integer words)**, which makes the union and XOR-shift operations extremely fast. We process the grid row by row using a rolling array of size `n`, combining reachable XOR sets from the **top** and **left** neighbors, then XOR-ing each reachable value with the current cell's value. At the end, we scan the final bitset in increasing order to find the **minimum** reachable XOR value.

## Approach

- **Represent XOR states as bitsets**: Each cell stores a 1024-bit bitset (32 × 32-bit ints). Bit `x` set means XOR value `x` is reachable at that cell.
- **Rolling row DP**: Use `dp[j]` to store the bitset of the cell directly above the current cell `(i-1, j)`, and `left` to store the bitset of the cell to the left `(i, j-1)`.
- **Merge top and left**: For each cell (except start), OR together the bitsets from `top` and `left` into a `pre` set.
- **XOR transition**: For every set bit `x` in `pre`, set bit `(x ^ grid[i][j])` in the resulting bitset `res`.
- **Base case**: At `(0, 0)`, only the value `grid[0][0]` is reachable.
- **Answer extraction**: After processing the last cell, scan bits `0..1023` in order and return the first one that is set — that is the minimum reachable XOR.

Let's implement this solution in PHP: **[3882. Minimum XOR Path in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003882-minimum-xor-path-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minCost(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minCost([[1,2],[3,4]]) . "\n";                   // Output: 6
echo minCost([[6,7],[5,8]]) . "\n";                   // Output: 9
echo minCost([[2,7,5]]) . "\n";                       // Output: 0
echo minCost([[0]]) . "\n";                           // Output: 0
echo minCost([[5]]) . "\n";                           // Output: 5
echo minCost([[1,1],[1,1]]) . "\n";                   // Output: 1
echo minCost([[1,2,3],[4,5,6],[7,8,9]]) . "\n";       // Output: 2
echo minCost([[1023,1023],[1023,1023]]) . "\n";       // Output: 1023
echo minCost([[0,1],[1,0]]) . "\n";                   // Output: 1
echo minCost([[1,0],[0,1]]) . "\n";                   // Output: 0
echo minCost([[2,3,1,4]]) . "\n";                     // Output: 4
echo minCost([[1],[2],[3]]) . "\n";                   // Output: 0
?>
```

### Explanation:

- **Why bitsets?** XOR values are limited to `[0, 1023]` (since `grid[i][j] ≤ 1023`, XOR of any number of such values stays under `1024`). A boolean array of size 1024 would work, but bitsets reduce memory by ~32× and allow fast OR/iteration.
- **State definition**: `dp[j]` (before overwrite) = set of XOR values reachable at cell `(i-1, j)`. After processing cell `(i, j)`, `dp[j]` = set of XOR values reachable at `(i, j)`.
- **Why `left` variable?** It holds the just-computed result for the previous column in the current row — i.e., reachable XOR values at `(i, j-1)`.
- **Merge step (`pre`)**: A path can arrive at `(i, j)` from above `(i-1, j)` or from the left `(i, j-1)`. So the union of their reachable sets gives all pre-XOR values.
- **Transition step (`res`)**: Every pre-value `x` combined with `grid[i][j]` via XOR produces the new value `x ^ grid[i][j]`.
- **Bounds safety**: The grid can be `1000 × 1000` cells, but total cells `m*n ≤ 1000`, so `O(m·n·1024/32)` work is cheap.

## Complexity Analysis

- **Time Complexity**: `O(m · n · (1024/32 + 1024))`  
  - For each cell, we OR two 32-int arrays: `O(1024/32) = O(32)`.  
  - Then we iterate over all 1024 possible XOR values to perform transitions.  
  - Total: `O(m · n · 1024)` ≈ `O(10^6)` operations for `m*n = 1000`.
- **Space Complexity**: `O(n · 1024/32)` = `O(n · 32)` for the rolling DP row, plus `O(32)` for the `left` and `pre`/`res` buffers. Under constraints (`n ≤ 1000`), that is about **128 KB**.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**