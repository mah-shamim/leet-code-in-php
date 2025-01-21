1289\. Minimum Falling Path Sum II

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Matrix`

Given an `n x n` integer matrix `grid`, return _the minimum sum of a **falling path with non-zero shifts**_.

A **falling path with non-zero shifts** is a choice of exactly one element from each row of `grid` such that no two elements chosen in adjacent rows are in the same column.

**Example 1:**

![falling-grid](https://assets.leetcode.com/uploads/2021/08/10/falling-grid.jpg)


- **Input:** `grid = [[1,2,3],[4,5,6],[7,8,9]]`
- **Output:** `13`
- **Explanation:** 
```
The possible falling paths are:
[1,5,9], [1,5,7], [1,6,7], [1,6,8],
[2,4,8], [2,4,9], [2,6,7], [2,6,8],
[3,4,8], [3,4,9], [3,5,7], [3,5,9]
The falling path with the smallest sum is [1,5,7], so the answer is 13.
```
**Example 2:**

- **Input:** grid = [[7]]
- **Output:** 7


**Constraints:**

- `n == grid.length == grid[i].length`
- `1 <= n <= 200`
- `-99 <= grid[i][j] <= 99`


**Hint:**
1. Use dynamic programming.
2. Let `dp[i][j]` be the answer for the first `i` rows such that column `j` is chosen from row `i`.
3. Use the concept of cumulative array to optimize the complexity of the solution.



**Solution:**

The problem is based on finding the **minimum falling path sum** in a matrix where we can choose exactly one element from each row, but the element from two adjacent rows cannot come from the same column. This requires a dynamic programming approach, along with optimization strategies to reduce the time complexity.

### Key Points:
- **Matrix Dimensions:** The matrix is `n x n` (i.e., `n` rows and `n` columns).
- **Falling Path:** A falling path is a sequence where we start from any element in the first row, and at each step, we move down to an element in the next row that is in a different column.
- **Non-zero Shifts:** Adjacent elements in the path must not be in the same column.
- **Dynamic Programming Approach:** We'll use a dynamic programming table to store intermediate results and avoid redundant calculations.

### Approach:
The problem can be solved using dynamic programming (DP) where we maintain two important variables:
1. **`minFirstPathSum`:** The minimum sum of a falling path at the current row.
2. **`minSecondPathSum`:** The second minimum sum to handle scenarios where the column of the minimum value is reused.

### Plan:
1. Initialize `minFirstPathSum`, `minSecondPathSum`, and `prevMinPathCol` to track the minimum values from previous rows.
2. Traverse the matrix row by row, calculating the minimum and second minimum path sums for each row.
3. For each row, calculate the falling path sum for each element:
    - If the column of the element is different from the column of the minimum value of the previous row, use `minFirstPathSum`.
    - Otherwise, use `minSecondPathSum` to avoid the same column.
4. Update the values of `minFirstPathSum`, `minSecondPathSum`, and `prevMinPathCol` after each row iteration.
5. The result is stored in `minFirstPathSum` after processing all rows.

Let's implement this solution in PHP: **[1289. Minimum Falling Path Sum II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001289-minimum-falling-path-sum-ii/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minFallingPathSum(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$grid1 = [[1,2,3],[4,5,6],[7,8,9]];
$grid2 = [[7]];

echo minFallingPathSum($grid1) . "\n"; // Output: 13
echo minFallingPathSum($grid2) . "\n"; // Output: 7
?>
```

### Explanation:

- **Row Traversal:** For each row, we calculate the possible falling path sums by adding the element in the current row to the minimum or second minimum sum of the previous row, ensuring no two elements come from the same column.
- **Optimization:** Instead of recalculating the minimum for each element in the row, we keep track of the two smallest sums in the previous row and use them accordingly.
- **Efficiency:** This solution only requires a single pass through the matrix, making it efficient for large grids.

### Example Walkthrough:
Consider the matrix:

```
grid = [[1, 2, 3], 
        [4, 5, 6], 
        [7, 8, 9]]
```

- **Step 1 (First row):**
    - The first row does not have previous rows to compare to, so the minimum path sum for each column is the value itself.
    - `minFirstPathSum = 1`, `minSecondPathSum = 2` (since 1 is the smallest and 2 is the second smallest in the first row).

- **Step 2 (Second row):**
    - For the second row, we cannot choose elements from the same column as the first row:
        - For column 0: The falling sum is `1 (from row 1, column 0) + 4 (from row 2, column 0) = 5`.
        - For column 1: The falling sum is `2 (from row 1, column 1) + 5 (from row 2, column 1) = 7`.
        - For column 2: The falling sum is `1 (from row 1, column 0) + 6 (from row 2, column 2) = 7`.
    - After the second row, `minFirstPathSum = 5` and `minSecondPathSum = 6`.

- **Step 3 (Third row):**
    - For the third row, we choose the best path that doesn't repeat columns from the second row:
        - For column 0: The falling sum is `5 (from row 2, column 0) + 7 (from row 3, column 0) = 12`.
        - For column 1: The falling sum is `5 (from row 2, column 0) + 8 (from row 3, column 1) = 13`.
        - For column 2: The falling sum is `6 (from row 2, column 1) + 9 (from row 3, column 2) = 15`.
    - After the third row, `minFirstPathSum = 13` and `minSecondPathSum = 15`.

### Output for Example:
For the matrix:
```
grid = [[1, 2, 3], 
        [4, 5, 6], 
        [7, 8, 9]]
```
The minimum falling path sum is `13`, which corresponds to the path `[1, 5, 7]`.

### Time Complexity:
- **Time Complexity:** O(n²), where `n` is the number of rows (or columns) in the matrix. We process each element of the matrix once.
- **Space Complexity:** O(n), as we only need a few variables to store the minimum and second minimum sums for each row, and we don’t require a full DP table.

This approach efficiently computes the minimum falling path sum using dynamic programming with optimization through the tracking of the two smallest values from the previous row. This solution scales well for larger matrices and avoids redundant recalculations, providing an optimal solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
