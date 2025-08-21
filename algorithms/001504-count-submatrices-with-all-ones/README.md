1504\. Count Submatrices With All Ones

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Stack`, `Matrix`, `Monotonic Stack`, `Weekly Contest 196`

Given an `m x n` binary matrix `mat`, return _the number of **submatrices** that have all ones_.

**Example 1:**

![ones1-grid](https://assets.leetcode.com/uploads/2021/10/27/ones1-grid.jpg)

- **Input:** mat = [[1,0,1],[1,1,0],[1,1,0]]
- **Output:** 13
- **Explanation:**
  There are 6 rectangles of side 1x1.
  There are 2 rectangles of side 1x2.
  There are 3 rectangles of side 2x1.
  There is 1 rectangle of side 2x2.
  There is 1 rectangle of side 3x1.
  Total number of rectangles = 6 + 2 + 3 + 1 + 1 = 13.

**Example 2:**

![ones2-grid](https://assets.leetcode.com/uploads/2021/10/27/ones2-grid.jpg)

- **Input:** mat = [[0,1,1,0],[0,1,1,1],[1,1,1,0]]
- **Output:** 24
- **Explanation:**
  There are 8 rectangles of side 1x1.
  There are 5 rectangles of side 1x2.
  There are 2 rectangles of side 1x3.
  There are 4 rectangles of side 2x1.
  There are 2 rectangles of side 2x2.
  There are 2 rectangles of side 3x1.
  There is 1 rectangle of side 3x2.
  Total number of rectangles = 8 + 5 + 2 + 4 + 2 + 2 + 1 = 24.

**Constraints:**

- `1 <= m, n <= 150`
- `mat[i][j]` is either `0` or `1`.



**Hint:**
1. For each row `i`, create an array nums where: `if mat[i][j] == 0 then nums[j] = 0 else nums[j] = nums[j-1] +1`.
2. In the row `i`, number of rectangles between column `j` and `k`(**inclusive**) and ends in row `i`, is equal to `SUM(min(nums[j, .. idx]))` where `idx` go from `j` to `k`. Expected solution is <code>O(n<sup>3</sup>)</code>.


**Similar Questions:**
1. [3212. Count Submatrices With Equal Frequency of X and Y](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003212-count-submatrices-with-equal-frequency-of-x-and-y)






**Solution:**

We need to count the number of submatrices in a given binary matrix that consist entirely of ones. The approach involves dynamically updating the height of consecutive ones in each column for every row and then calculating the number of valid submatrices that end at each row.

### Approach
1. **Initialization**: Initialize an array `h` to keep track of the number of consecutive ones ending at each column for the current row. This array is updated for each row in the matrix.
2. **Update Heights**: For each row, update the `h` array. If the current element is `1`, increment the height of the corresponding column; otherwise, reset it to `0`.
3. **Count Submatrices**: For each row, after updating the `h` array, iterate through each column. For each column, consider it as the rightmost column of a submatrix. Then, traverse leftwards to compute the minimum height encountered so far. The number of valid submatrices ending at the current row and column is the sum of these minimum heights. Accumulate this count to get the total number of submatrices.

Let's implement this solution in PHP: **[1504. Count Submatrices With All Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001504-count-submatrices-with-all-ones/solution.php)**

```php
<?php
/**
 * @param Integer[][] $mat
 * @return Integer
 */
function numSubmat($mat) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$mat1 = [[1,0,1],[1,1,0],[1,1,0]];
echo numSubmat($mat1) . "\n"; // Output: 13

// Example 2
$mat2 = [[0,1,1,0],[0,1,1,1],[1,1,1,0]];
echo numSubmat($mat2) . "\n"; // Output: 24
?>
```

### Explanation:

1. **Initialization**: The code initializes an array `h` to store the height of consecutive ones for each column. The variable `total` keeps track of the total number of submatrices.
2. **Row Processing**: For each row, the code updates the `h` array. If the current element is `1`, the height of the corresponding column is incremented; otherwise, it is reset to `0`.
3. **Submatrix Counting**: For each column in the updated `h` array, the code calculates the number of submatrices that end at the current row and column. This is done by traversing leftwards from the current column, keeping track of the minimum height encountered. The sum of these minimum heights gives the count of valid submatrices for the current row and column, which is added to `total`.
4. **Result**: After processing all rows, `total` contains the number of all possible submatrices consisting of ones, which is returned as the result.

This approach efficiently counts all valid submatrices by leveraging dynamic programming and iterative height updates, ensuring optimal performance even for the upper constraint limits. The complexity is O(m*n<sup>2</sup>), which is feasible given the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**