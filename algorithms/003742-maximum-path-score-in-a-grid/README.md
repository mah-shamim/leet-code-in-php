3742\. Maximum Path Score in a Grid

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Matrix`, `Weekly Contest 475`

You are given an `m x n` grid where each cell contains one of the values 0, 1, or 2. You are also given an integer `k`.

You start from the top-left corner `(0, 0)` and want to reach the bottom-right corner `(m - 1, n - 1)` by moving only **right** or **down**.

Each cell contributes a specific score and incurs an associated cost, according to their cell values:

- 0: adds 0 to your score and costs 0.
- 1: adds 1 to your score and costs 1.
- 2: adds 2 to your score and costs 1.

Return the **maximum** score achievable without exceeding a total cost of `k`, or -1 if no valid path exists.

**Note:** If you reach the last cell but the total cost exceeds `k`, the path is invalid.

**Example 1:**

- **Input:** grid = [[0, 1],[2, 0]], k = 1
- **Output:** 2
- **Explanation:** The optimal path is:

| Cell  | `grid[i][j]` | Score | Total Score | Cost | Total Cost |
|-------|--------------|-------|-------------|------|------------|
| (0,0) | 0            | 0     | 0           | 0    | 0          |
| (0,1) | 2            | 2     | 2           | 1    | 1          |
| (1,1) | 0            | 0     | 2           | 0    | 1          |

Thus, the maximum possible score is `2`.

**Example 2:**

- **Input:** grid = [[0, 1],[1, 2]], k = 1
- **Output:** -1
- **Explanation:** There is no path that reaches cell `(1, 1)` without exceeding cost k. Thus, the answer is `-1`.

**Constraints:**

- `1 <= m, n <= 200`
- `0 <= k <= 10³`
- `grid[0][0] == 0`
- `0 <= grid[i][j] <= 2`



**Hint:**
1. Use dynamic programming.
2. Let `dp[i][j][c]` = max score at cell `(i,j)` with total cost exactly `c` (0 <= `c` <= `k`).
3. Update `dp[i][j][c]` from `(i-1,j)` and `(i,j-1)` using `cost = (grid[i][j] == 0 ? 0 : 1)` and `score = grid[i][j]`.
4. Answer = `max(dp[m-1][n-1][c])` for `c=0..k`, or `-1` if none.






**Solution:**

This problem asks for the maximum score from **_(0,0)_** to **_(m-1,n-1)_** moving only right or down, where each cell contributes a score and a cost based on its value (0→score 0, cost 0; 1→score 1, cost 1; 2→score 2, cost 1), with a total cost limit **_k_**. The solution uses dynamic programming where `dp[i][j][c]` is the maximum score at cell `(i,j)` with **exactly** cost `c`, and transitions come from left or above. To save memory, we only keep two rows of `dp` states.

### Approach:

- **DP definition** `dp[i][j][c]` = maximum score achievable at cell `(i,j)` with total cost **exactly** `c`.
- **Transitions** From `(i-1,j)` (above) or `(i,j-1)` (left), add the current cell’s score and cost.
- **Memory optimization**  
  - Since **_m, n ≤ 200_** and **_k ≤ 10³_**, a full 3D array would be large (~ **_200 × 200 × 1001_** ints).  
  - We use two 2D arrays `prev` (for previous row) and `curr` (for current row), each of size `n × (k+1)`.
- **Initialization** `(0,0)` starts with its own cost and score.
- **Processing**  
  - First row: fill left to right.  
  - Then for each next row, process first column using `prev`, then remaining columns using both `prev` and `curr`.
- **Answer** Max of `dp[m-1][n-1][c]` for all `c ≤ k`. If all -1, return -1.

Let's implement this solution in PHP: **[3742. Maximum Path Score in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003742-maximum-path-score-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer
 */
function maxPathScore(array $grid, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$grid1 = [[0, 1], [2, 0]];
$k1 = 1;
echo maxPathScore($grid1, $k1) . "\n";              // Output: 2

$grid2 = [[0, 1], [1, 2]];
$k2 = 1;
echo maxPathScore($grid2, $k2) . "\n";              // Output: -1
?>
```

### Explanation:

- **Step 1: Start at (0,0)** Only one path starts here. Add its cost and score to `dp[0][0][cost]`.
- **Step 2: Fill first row** Each cell only has a path from left. For each previous cost `c` that’s reachable, create new cost = `c + cell_cost`, new score = `prev_score + cell_score`.
- **Step 3: Fill first column of next rows** Each cell only has a path from above. Same transition logic.
- **Step 4: Fill remaining cells** Each cell can come from left (already in `curr`) or above (in `prev`). Take max of both transitions.
- **Step 5: Answer retrieval** After processing all rows, last cell’s DP array contains max scores for each exact cost. We want max score for cost ≤ k, so loop over all costs up to `k`.

### Complexity
- **Time Complexity**: _**O(m × n × k)**_ — For each cell, we loop over all costs `c` from `0..k` to update from two possible previous cells.
- **Space Complexity**: _**O(n × k)**_ — Only two rows of `n × (k+1)` DP tables are kept at any time.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**