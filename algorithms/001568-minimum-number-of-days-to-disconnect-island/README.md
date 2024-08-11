1568\. Minimum Number of Days to Disconnect Island


**Difficulty:** Hard

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Matrix`, `Strongly Connected Component`

You are given an `m x n` binary grid `grid` where `1` represents land and `0` represents water. An **island** is a maximal **4-directionally** (horizontal or vertical) connected group of `1`'s.

The grid is said to be **connected** if we have **exactly one island**, otherwise is said **disconnected**.

In one day, we are allowed to change a****ny single land cell `(1)` into a water cell `(0)`.

Return _the minimum number of days to disconnect the grid_.

**Example 1:**

![land1](https://assets.leetcode.com/uploads/2021/12/24/land1.jpg)

- **Input:** grid = [[0,1,1,0],[0,1,1,0],[0,0,0,0]]
- **Output:** 2
- **Explanation:** We need at least 2 days to get a disconnected grid.\
  Change land `grid[1][1]` and `grid[0][2]` to water and get 2 disconnected island.

**Example 2:**

![land2](https://assets.leetcode.com/uploads/2021/12/24/land2.jpg)

- **Input:** grid = [[1,1]]
- **Output:** 2
- **Explanation:** Grid of full water is also disconnected `([[1,1]] -> [[0,0]])`, `0` islands.

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 30`
- `grid[i][j]` is either `0` or `1`.

**Hint:**
1. Return 0 if the grid is already disconnected.
2. Return 1 if changing a single land to water disconnect the island.
3. Otherwise return 2.
4. We can disconnect the grid within at most 2 days.


**Solution:**

We need to consider the following steps:

### Steps to Solve the Problem:
1. **Check Initial Connectivity**: First, check if the grid is already disconnected by determining if there is more than one island in the grid. If it's already disconnected, return `0`.

2. **Check If Single Removal Disconnects the Island**: Iterate through each cell of the grid. Temporarily convert the cell from `1` to `0` (if it's `1`) and check if the grid becomes disconnected by counting the number of islands. If converting a single cell disconnects the island, return `1`.

3. **Two Day Disconnection**: If no single cell conversion disconnects the island, then the grid can be disconnected by converting any two adjacent land cells. Therefore, return `2`.

### Key Functions:
- **DFS (Depth-First Search)** to find and count islands.
- **isConnected** to check if the grid is connected.

Let's implement this solution in PHP: **[1568. Minimum Number of Days to Disconnect Island](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001568-minimum-number-of-days-to-disconnect-island/solution.php)**

```php
<?php
// Example usage:
$grid1 = [
    [0, 1, 1, 0],
    [0, 1, 1, 0],
    [0, 0, 0, 0]
];
echo minDays($grid1); // Output: 2

$grid2 = [
    [1, 1]
];
echo minDays($grid2); // Output: 2
?>
```

### Explanation:

- **`minDays()`** function handles the main logic.
- **`countIslands()`** counts how many islands are present using DFS.
- **`dfs()`** is the recursive function to explore the grid and mark visited land cells.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
