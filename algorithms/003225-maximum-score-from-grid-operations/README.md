3225\. Maximum Score From Grid Operations

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Dynamic Programming`, `Matrix`, `Prefix Sum`, `Biweekly Contest 135`

You are given a 2D matrix `grid` of size `n x n`. Initially, all cells of the grid are colored white. In one operation, you can select any cell of indices `(i, j)`, and color black all the cells of the `jᵗʰ` column starting from the top row down to the `iᵗʰ` row.

The grid score is the sum of all `grid[i][j]` such that cell `(i, j)` is white, and it has a horizontally adjacent black cell.

Return _the **maximum** score that can be achieved after some number of operations_.

**Example 1:**

- **Input:** grid = [[0,0,0,0,0],[0,0,3,0,0],[0,1,0,0,0],[5,0,0,3,0],[0,0,0,0,2]]
- **Output:** 11
- **Explanation:**
   ![one](https://assets.leetcode.com/uploads/2024/05/11/one.png)
   In the first operation, we color all cells in column 1 down to row 3, and in the second operation, we color all cells in column 4 down to the last row. The score of the resulting grid is `grid[3][0] + grid[1][2] + grid[3][3]` which is equal to 11.

**Example 2:**

- **Input:** grid = [[10,9,0,0,15],[7,1,0,8,0],[5,20,0,11,0],[0,0,0,1,2],[8,12,1,10,3]]
- **Output:** 94
- **Explanation:**
   ![two-1](https://assets.leetcode.com/uploads/2024/05/11/two-1.png)
   We perform operations on 1, 2, and 3 down to rows 1, 4, and 0, respectively. The score of the resulting grid is `grid[0][0] + grid[1][0] + grid[2][1] + grid[4][1] + grid[1][3] + grid[2][3] + grid[3][3] + grid[4][3] + grid[0][4]` which is equal to 94.

**Constraints:**

- `1 <= n == grid.length <= 100`
- `n == grid[i].length`
- `0 <= grid[i][j] <= 10⁹`



**Hint:**
1. Use dynamic programming.
2. Solve the problem in `O(N⁴)` using a 3-states dp.
3. Let `dp[i][lastHeight][beforeLastHeight]` denote the maximum score if the grid was limited to column `i`, and the height of column `i - 1` is `lastHeight` and the height of column `i - 2` is `beforeLastHeight`.
4. The third state, `beforeLastHeight`, is used to determine which values of column `i - 1` will be added to the score. We can replace this state with another state that only takes two values 0 or 1.
5. Let `dp[i][lastHeight][isBigger]` denote the maximum score if the grid was limited to column `i`, and where the height of column `i - 1` is `lastHeight`. Additionally, if `isBigger == 1`, the number of black cells in column `i` is assumed to be larger than the number of black cells in column `i - 2`, and vice versa. Note that if our assumption is wrong, it would lead to a suboptimal score and, therefore, it would not be considered as the final answer.



**Similar Questions:**
1. [3148. Maximum Difference Score in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003148-maximum-difference-score-in-a-grid)






**Solution:**

The problem involves coloring cells in columns from top to a chosen row, and the score is the sum of white cells that have a black horizontally adjacent cell.  
The solution uses **Dynamic Programming** with two states per column, tracking whether the current column’s black height is greater than the previous one or not.  
It runs in **O(n³)** and handles up to `n = 100` efficiently.

### Approach:

- **Prefix sums per column** are precomputed to quickly get sums of ranges.
- **DP states**:
   - `dpPick[h]`: max score if current column's black height is exactly `h` and the previous column's black height is **less** (so we count some cells in the previous column).
   - `dpSkip[h]`: same but the previous column's black height is **greater** (so we don’t count those cells in the previous column).
- Transition between columns considers two cases:
   1. Current height > previous height: add cells from previous column between `prev` and `curr`.
   2. Current height ≤ previous height: add cells from current column between `curr` and `prev`.
- The “skip” state is used to handle the case where no horizontal adjacency is possible from the previous column.

Let's implement this solution in PHP: **[3225. Maximum Score From Grid Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003225-maximum-score-from-grid-operations/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function maximumScore(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumScore([[0,0,0,0,0],[0,0,3,0,0],[0,1,0,0,0],[5,0,0,3,0],[0,0,0,0,2]]) . "\n";                // Output: 11
echo maximumScore([[10,9,0,0,15],[7,1,0,8,0],[5,20,0,11,0],[0,0,0,1,2],[8,12,1,10,3]]) . "\n";          // Output: 94
?>
```

### Explanation:

- **Step 1 — Prefix sums**:  
  - `prefix[j][i]` = sum of first `i` cells in column `j` (0-based rows).  
  - `prefix[j][curr] - prefix[j][prev]` = sum of rows from `prev` to `curr-1` in column `j`.
- **Step 2 — DP initialization**: For the first column, `dpPick` and `dpSkip` are just zero because no previous column exists yet.
- **Step 3 — Transition for column `j`**:  
  - For each possible current black height `curr` and previous height `prev`:
    - If `curr > prev`:
       - We must add the segment `[prev, curr)` from previous column (because cells in previous column from `prev` to `curr-1` are white and have black in current column).
       - Update `dpPick[curr]` and `dpSkip[curr]` from previous `dpSkip[prev]` (since prev's height was ≤ prev's prev height, so we use dpSkip).
    - If `curr ≤ prev`:
       - We must add the segment `[curr, prev)` from current column (because cells in current column from `curr` to `prev-1` are white and have black in previous column).
       - Update `dpPick[curr]` from previous `dpPick[prev]`.
       - Update `dpSkip[curr]` from previous `dpPick[prev]` (since prev's height > prev's prev height, so we use dpPick but without adding score here — wait, this is subtle but correct because in `dpSkip` we don't count the current column’s segment).
- **Step 4 — Result**: After processing all columns, the answer is `max(dpPick)` because the last column can end with any height and its pick state is valid.

### Complexity
- **Time Complexity**: _**O(n³)**_, We have `O(n)` columns, `O(n²)` height pairs, and `O(n)` for inner loops — actually careful: For each `j`, we loop `curr` `(0..n)` and `prev` `(0..n) → O(n²)`. Inside we do `O(1)` work. So total `O(n³)`.
- **Space Complexity**: _**O(n)**_, We only store two arrays of size `n+1` for `dpPick` and `dpSkip` per column.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**