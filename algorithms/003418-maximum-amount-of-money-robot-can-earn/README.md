3418\. Maximum Amount of Money Robot Can Earn

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Matrix`, `Weekly Contest 432`

You are given an `m x n` grid. A robot starts at the top-left corner of the grid `(0, 0)` and wants to reach the bottom-right corner `(m - 1, n - 1)`. The robot can move either right or down at any point in time.

The grid contains a value `coins[i][j]` in each cell:

- If `coins[i][j] >= 0`, the robot gains that many coins.
- If `coins[i][j] < 0`, the robot encounters a robber, and the robber steals the **absolute** value of` coins[i][j]` coins.

The robot has a special ability to **neutralize robbers** in at most **2 cells** on its path, preventing them from stealing coins in those cells.

**Note:** The robot's total coins can be negative.

Return _the **maximum** profit the robot can gain on the route_.

**Example 1:**

- **Input:** coins = [[0,1,-1],[1,-2,3],[2,-3,4]]
- **Output:** 8
- **Explanation:** An optimal path for maximum coins is:
   1. Start at `(0, 0)` with `0` coins (total coins = `0`).
   2. Move to `(0, 1)`, gaining `1` coin (total coins = `0 + 1 = 1`).
   3. Move to `(1, 1)`, where there's a robber stealing `2` coins. The robot uses one neutralization here, avoiding the robbery (total coins = `1`).
   4. Move to `(1, 2)`, gaining `3` coins (total coins = `1 + 3 = 4`).
   5. Move to `(2, 2)`, gaining `4` coins (total coins = `4 + 4 = 8`).


**Example 2:**

- **Input:** coins = [[10,10,10],[10,10,10]]
- **Output:** 40
- **Explanation:** An optimal path for maximum coins is:
  1. Start at `(0, 0)` with `10` coins (total coins = `10`).
  2. Move to `(0, 1)`, gaining `10` coins (total coins = `10 + 10 = 20`).
  3. Move to `(0, 2)`, gaining another `10` coins (total coins = `20 + 10 = 30`).
  4. Move to `(1, 2)`, gaining the final `10` coins (total coins = `30 + 10 = 40`).


**Constraints:**

- `m == coins.length`
- `n == coins[i].length`
- `1 <= m, n <= 500`
- `-1000 <= coins[i][j] <= 1000`



**Hint:**
1. Use Dynamic Programming.
2. Let `dp[i][j][k]` denote the maximum amount of money a robot can earn by starting at cell `(i,j)` and having neutralized `k` robbers.






**Solution:**

The problem asks for the maximum coins a robot can collect while moving from the top‑left to the bottom‑right of an `m x n` grid, moving only right or down. Each cell contains a coin value (positive = gain, negative = robbery). The robot can **neutralise at most 2 robberies** (i.e., treat the cell’s value as `0` instead of its negative amount). The solution uses **3D dynamic programming** where `dp[i][j][k]` stores the best total coins reachable at cell `(i,j)` after using exactly `k` neutralisations (`k = 0,1,2`). The answer is the maximum of the three states at the destination. The provided PHP implementation uses space‑optimised 1D arrays for each `k` and processes the grid row by row.

### Approach:

- **DP state definition:** `dp[i][j][k]` = maximum coins earned when reaching cell `(i,j)` with **exactly** `k` neutralisations already used (`k = 0,1,2`).
- **Base case:** At `(0,0)`, the robot starts with the cell’s value:
   - `k = 0`: `dp[0][0][0] = coins[0][0]`
   - `k = 1`: `dp[0][0][1] = 0` if `coins[0][0] < 0` (neutralise the starting cell), otherwise impossible (`-∞`).
   - `k = 2`: impossible (`-∞`).
- **Transitions:** For each cell `(i,j)`, the robot can come from **top** `(i-1,j)` or **left** `(i,j-1)`. For each `k`:
   1. **Do not neutralise current cell** – add `coins[i][j]` to the best of the two predecessors that used exactly `k` neutralisations.
   2. **Neutralise current cell** (only if `coins[i][j] < 0` and `k ≥ 1`) – add `0` instead of the negative value, using exactly `k-1` neutralisations from the predecessor.
- **Implementation optimisation:** Because only the previous row and current row are needed, the DP is stored in three 1D arrays (`prev0, prev1, prev2` for the previous row, and `cur0, cur1, cur2` for the current row). After processing each row, the current arrays become the previous ones for the next row.
- **Final answer:** `max(dp[m-1][n-1][0], dp[m-1][n-1][1], dp[m-1][n-1][2])`

Let's implement this solution in PHP: **[3418. Maximum Amount of Money Robot Can Earn](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003418-maximum-amount-of-money-robot-can-earn/solution.php)**

```php
<?php
/**
 * @param Integer[][] $coins
 * @return Integer
 */
function maximumAmount(array $coins): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumAmount([[0,1,-1],[1,-2,3],[2,-3,4]]) . "\n";        // Output: 8
echo maximumAmount([[10,10,10],[10,10,10]]) . "\n";             // Output: 40
?>
```

### Explanation:

- **Why three states?** The robot can neutralise at most 2 robbers. Keeping track of exactly how many neutralisations have been used allows us to correctly decide whether neutralising the current cell is allowed and what the resulting state should be.
- **Handling negative values:** If a cell contains a negative number, the robot can either:
   - Accept the loss (add the negative value) – this does not increase the neutralisation count.
   - Use one of its remaining neutralisations (if any) – treat the value as `0` and increase the neutralisation count by 1.
- **Avoiding invalid states:** States that are unreachable are initialised to a very small number (`-INF`). For example, `dp[0][0][1]` is possible only if the starting cell is negative; otherwise it stays `-INF`. The same logic applies when moving from a predecessor that itself is unreachable.
- **Space efficiency:** The full 3D table would be `O(m * n * 3)` memory, which for `m,n ≤ 500` is about 750,000 entries – acceptable. However, the provided implementation reduces memory to `O(n * 3)` by only keeping two rows at a time, which is more efficient and still straightforward.
- **Correctness:** The DP explores every possible path (right/down moves) and every possible way of choosing up to 2 neutralisations. Because the robot cannot go back, the principle of optimality holds – the best way to reach `(i,j)` with a given number of neutralisations depends only on the best ways to reach its predecessors.

### Complexity
- **Time Complexity**: _**O(m * n * 3) = O(m * n)**_, Each cell processes three states, each requiring a constant number of operations (comparing two incoming directions and possibly a neutralisation option).
- **Space Complexity**: _**O(n * 3) = O(n)**_, Only three arrays for the previous row and three for the current row are stored, each of length `n`. This is significantly better than a full 3D table.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**