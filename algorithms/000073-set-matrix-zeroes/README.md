73\. Set Matrix Zeroes

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Matrix`

Given an `m x n` integer matrix `matrix`, if an element is `0`, set its entire row and column to `0`'s.

You must do it [in place](https://en.wikipedia.org/wiki/In-place_algorithm).

**Example 1:**

![mat1](https://assets.leetcode.com/uploads/2020/08/17/mat1.jpg)

- **Input:** matrix = [[1,1,1],[1,0,1],[1,1,1]]
- **Output:** [[1,0,1],[0,0,0],[1,0,1]]

**Example 2:**

![mat2](https://assets.leetcode.com/uploads/2020/08/17/mat2.jpg)

- **Input:** matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]
- **Output:** [[0,0,0,0],[0,4,5,0],[0,3,1,0]]



**Constraints:**

- `m == matrix.length`
- `n == matrix[0].length`
- `1 <= m, n <= 200`
- <code>-2<sup>31</sup> <= matrix[i][j] <= 2<sup>31</sup> - 1</code>

**Follow up**:

- A straightforward solution using `O(mn)` space is probably a bad idea.
- A simple improvement uses `O(m + n)` space, but still not the best solution.
- Could you devise a constant space solution?


**Hint:**
1. If any cell of the matrix has a zero we can record its row and column number using additional memory. But if you don't want to use extra memory then you can manipulate the array instead. i.e. simulating exactly what the question says.
2. Setting cell values to zero on the fly while iterating might lead to discrepancies. What if you use some other integer value as your marker? There is still a better approach for this problem with `0(1)` space.
3. We could have used 2 sets to keep a record of rows/columns which need to be set to zero. But for an `O(1)` space solution, you can use one of the rows and and one of the columns to keep track of this information.
4. We can use the first cell of every row and column as a flag. This flag would determine whether a row or column has been set to zero.



**Solution:**

We need to set the entire row and column of any element in a matrix to zero if that element is zero. The challenge is to achieve this in-place with constant space complexity.

### Approach
The key idea is to use the first row and first column of the matrix to keep track of which rows and columns need to be zeroed. This allows us to avoid using additional space for storing this information. Here's the step-by-step approach:

1. **Check First Row and Column for Zeros**: Determine if the first row or column originally contains any zeros. This information is stored in boolean variables (`firstRowZero` and `firstColZero`).

2. **Mark Rows and Columns**: Iterate through the matrix starting from the second row and second column. For each element that is zero, mark its corresponding row and column in the first row and first column.

3. **Zero Out Rows and Columns**: Use the marks in the first row and column to set the appropriate rows and columns to zero, starting from the second row and column.

4. **Handle First Row and Column**: Finally, zero out the first row and/or column if they were marked to be zeroed based on the initial check.

Let's implement this solution in PHP: **[73. Set Matrix Zeroes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000073-set-matrix-zeroes/solution.php)**

```php
<?php
/**
 * @param Integer[][] $matrix
 * @return NULL
 */
function setZeroes(&$matrix) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

print_r setZeroes([[1,1,1],[1,0,1],[1,1,1]]) . "\n"; // Output: [[1,0,1],[0,0,0],[1,0,1]]
print_r setZeroes([[0,1,2,0],[3,4,5,2],[1,3,1,5]]) . "\n"; // Output: [[0,0,0,0],[0,4,5,0],[0,3,1,0]]
?>
```

### Explanation:

1. **Initial Checks**: We first determine if the first row or column contains any zeros. This is necessary because we will use these to mark other rows and columns, and we need to handle them separately at the end.

2. **Marking Zeros**: As we iterate through the matrix, any zero found in a cell (from the second row and column onwards) will mark the corresponding cell in the first row and first column. This helps us track which rows and columns need to be zeroed without using extra space.

3. **Zeroing Rows and Columns**: Using the marks set in the first row and column, we iterate through these markers and set the entire corresponding rows and columns to zero.

4. **Handling First Row and Column**: Finally, we check if the first row or column needed to be zeroed based on the initial checks and set them to zero if required.

This approach efficiently uses the matrix itself to track necessary information, achieving the goal with constant space complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**