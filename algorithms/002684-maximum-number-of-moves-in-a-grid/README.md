2684\. Maximum Number of Moves in a Grid

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Matrix`

You are given a **0-indexed** `m x n` matrix `grid` consisting of **positive** integers.

You can start at **any** cell in the first column of the matrix, and traverse the grid in the following way:

- From a cell `(row, col)`, you can move to any of the cells: `(row - 1, col + 1)`, `(row, col + 1)` and `(row + 1, col + 1)` such that the value of the cell you move to, should be **strictly** bigger than the value of the current cell.

Return _the **maximum** number of **moves** that you can perform_.

**Example 1:**

![yetgriddrawio-10](https://assets.leetcode.com/uploads/2023/04/11/yetgriddrawio-10.png)

- **Input:** grid = [[2,4,3,5],[5,4,9,3],[3,4,2,11],[10,9,13,15]]
- **Output:** 3
- **Explanation:** We can start at the cell (0, 0) and make the following moves:
  - (0, 0) -> (0, 1).
  - (0, 1) -> (1, 2).
  - (1, 2) -> (2, 3).
    It can be shown that it is the maximum number of moves that can be made.

**Example 2:**

![yetgrid4drawio](https://assets.leetcode.com/uploads/2023/04/12/yetgrid4drawio.png)

- **Input:** grid = [[3,2,4],[2,1,9],[1,1,7]]
- **Output:** 0
- **Explanation:** Starting from any cell in the first column we cannot perform any moves.



**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `2 <= m, n <= 1000`
- <code>4 <= m * n <= 10<sup>5</sup></code>
- <code>1 <= grid[i][j] <= 10<sup>6</sup></code>


**Hint:**
1. Consider using dynamic programming to find the maximum number of moves that can be made from each cell.
2. The final answer will be the maximum value in cells of the first column.



**Solution:**

We can use **Dynamic Programming** (DP) to keep track of the maximum number of moves from each cell, starting from any cell in the first column. Here’s the step-by-step approach:

### Approach:

1. **Define DP Array**: Let `dp[row][col]` represent the maximum number of moves possible starting from `grid[row][col]`. Initialize this with `0` for all cells.

2. **Traverse the Grid**:
   - Start from the last column and move backward to the first column. For each cell in column `col`, calculate possible moves for `col-1`.
   - Update `dp[row][col]` based on possible moves `(row - 1, col + 1)`, `(row, col + 1)`, and `(row + 1, col + 1)`, only if the value of the destination cell is **strictly greater** than the current cell.

3. **Calculate the Maximum Moves**:
   - After filling out the `dp` table, the result will be the maximum value in the first column of `dp`, as it represents the maximum moves starting from any cell in the first column.

4. **Edge Cases**:
   - Handle cases where no moves are possible (e.g., when all paths are blocked by lower or equal values in neighboring cells).

Let's implement this solution in PHP: **[2684. Maximum Number of Moves in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002684-maximum-number-of-moves-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function maxMoves($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$grid1 = [[2,4,3,5],[5,4,9,3],[3,4,2,11],[10,9,13,15]];
$grid2 = [[3,2,4],[2,1,9],[1,1,7]];

echo maxMoves($grid1); // Output: 3
echo "\n";
echo maxMoves($grid2); // Output: 0
?>
```

### Explanation:

1. **`dp` Initialization**: We create a 2D array `dp` to store the maximum moves from each cell.
2. **Loop through Columns**: We iterate from the second-last column to the first, updating `dp[row][col]` based on possible moves to neighboring cells in the next column.
3. **Maximum Moves Calculation**: Finally, the maximum value in the first column of `dp` gives the result.

### Complexity Analysis:
- **Time Complexity**: _**O(m x n)**_ since we process each cell once.
- **Space Complexity**: _**O(m x n)**_ for the `dp` array.

This solution is efficient given the constraints and will work within the provided limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
