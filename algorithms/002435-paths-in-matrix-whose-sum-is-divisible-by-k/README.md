2435\. Paths in Matrix Whose Sum Is Divisible by K

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Matrix`, `Weekly Contest 314`

You are given a **0-indexed** `m x n` integer matrix `grid` and an integer `k`. You are currently at position `(0, 0)` and you want to reach position `(m - 1, n - 1)` moving only **down** or **right**.

Return _the number of paths where the sum of the elements on the path is divisible by `k`_. Since the answer may be very large, return it **modulo** `10⁹ + 7`.

**Example 1:**

![image-20220813183124-1](https://assets.leetcode.com/uploads/2022/08/13/image-20220813183124-1.png)

- **Input:** grid = [[5,2,4],[3,0,5],[0,7,2]], k = 3
- **Output:** 2
- **Explanation:** There are two paths where the sum of the elements on the path is divisible by k.
  The first path highlighted in red has a sum of 5 + 2 + 4 + 5 + 2 = 18 which is divisible by 3.
  The second path highlighted in blue has a sum of 5 + 3 + 0 + 5 + 2 = 15 which is divisible by 3.

**Example 2:**

![image-20220817112930-3](https://assets.leetcode.com/uploads/2022/08/17/image-20220817112930-3.png)

- **Input:** grid = [[0,0]], k = 5
- **Output:** 1
- **Explanation:** The path highlighted in red has a sum of 0 + 0 = 0 which is divisible by 5.

**Example 3:**

![image-20220812224605-3](https://assets.leetcode.com/uploads/2022/08/12/image-20220812224605-3.png)

- **Input:** grid = [[7,3,4,9],[2,3,6,2],[2,3,7,0]], k = 1
- **Output:** 10
- **Explanation:** Every integer is divisible by 1 so the sum of the elements on every possible path is divisible by k.

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 5 * 10⁴`
- `1 <= m * n <= 5 * 10⁴`
- `0 <= grid[i][j] <= 100`
- `1 <= k <= 50`



**Hint:**
1. The actual numbers in grid do not matter. What matters are the remainders you get when you divide the numbers by `k`.
2. We can use dynamic programming to solve this problem. What can we use as states?
3. Let `dp[i][j][value]` represent the number of paths where the sum of the elements on the path has a remainder of value when divided by `k`.



**Similar Questions:**
1. [62. Unique Paths](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000062-unique-paths)
2. [63. Unique Paths II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000063-unique-paths-ii)
3. [64. Minimum Path Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000064-minimum-path-sum)
4. [174. Dungeon Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000174-dungeon-game)
5. [741. Cherry Pickup](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000741-cherry-pickup)
6. [1091. Shortest Path in Binary Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001091-shortest-path-in-binary-matrix)
7. [2087. Minimum Cost Homecoming of a Robot in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002087-minimum-cost-homecoming-of-a-robot-in-a-grid)
8. [2510. Check if There is a Path With Equal Number of 0's And 1's](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002510-check-if-there-is-a-path-with-equal-number-of-0s-and-1s)







**Solution:**

We need to find the number of paths from top-left to bottom-right in a matrix where the sum of elements along the path is divisible by k, moving only right or down.

### Approach:

## Problem Analysis
- We can only move **right** or **down**
- We need to track the **sum modulo k** for each path
- The constraints are large (up to 50,000 cells) but k is small (≤ 50)

## Dynamic Programming Approach
I'll use a 2D DP array where `dp[j][r]` represents the number of paths to current column j with remainder r.

Since we process row by row, I can optimize space by only storing the current and previous row information.

Let's implement this solution in PHP: **[2435. Paths in Matrix Whose Sum Is Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002435-paths-in-matrix-whose-sum-is-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer
 */
function numberOfPaths($grid, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfPaths([[5,2,4],[3,0,5],[0,7,2]], 3) . "\n";        // Output: 2
echo numberOfPaths([[0,0]], 5) . "\n";                          // Output: 1
echo numberOfPaths([[7,3,4,9],[2,3,6,2],[2,3,7,0]], 1) . "\n";  // Output: 10
?>
```

### Explanation:

1. **State Definition**: `dp[i][j][r]` = number of paths to cell `(i,j)` where the sum of elements has remainder `r` when divided by `k`

2. **Transition**:
   - From top: `dp[i][j][(r + grid[i][j]) % k] += dp[i-1][j][r]`
   - From left: `dp[i][j][(r + grid[i][j]) % k] += dp[i][j-1][r]`

3. **Initialization**: Start at `(0,0)` with remainder `grid[0][0] % k`

4. **Answer**: `dp[m-1][n-1][0]` (paths to bottom-right with remainder 0)

## Complexity Analysis
- **Time Complexity**: O(m × n × k)
- **Space Complexity**: O(n × k) for optimized version, O(m × n × k) for readable version

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**