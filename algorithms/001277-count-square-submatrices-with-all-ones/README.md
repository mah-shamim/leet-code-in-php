1277\. Count Square Submatrices with All Ones

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Matrix`

Given a `m * n` matrix of ones and zeros, return _how many **square** submatrices have all ones_.

**Example 1:**

- **Input:** matrix = [[0,1,1,1], [1,1,1,1], [0,1,1,1]]
- **Output:** 15
- **Explanation:**
  - There are **10** squares of side 1.
  - There are **4** squares of side 2.
  - There is  **1** square of side 3.
  - Total number of squares = 10 + 4 + 1 = **15**.

**Example 2:**

- **Input:** matrix = [[1,0,1], [1,1,0], [1,1,0]]
- **Output:** 7
- **Explanation:**
  - There are 6 squares of side 1.  
  - There is 1 square of side 2.
  - Total number of squares = 6 + 1 = 7.


**Constraints:**

- `1 <= arr.length <= 300`
- `1 <= arr[0].length <= 300`
- `0 <= arr[i][j] <= 1`


**Hint:**
1. Create an additive table that counts the sum of elements of **submatrix** with the superior corner at `(0,0)`.
2. Loop over all **subsquares** in <code>O(n<sup>3</sup>)</code> and check if the sum make the whole array to be ones, if it checks then add `1` to the answer.



**Solution:**

We can use **Dynamic Programming (DP)** to keep track of the number of square submatrices with all ones that can end at each cell in the matrix. Here's the approach to achieve this:

1. **DP Matrix Definition**:
   - Define a DP matrix `dp` where `dp[i][j]` represents the size of the largest square submatrix with all ones that has its bottom-right corner at cell `(i, j)`.

2. **Transition Formula**:
   - For each cell `(i, j)` in the matrix:
      - If `matrix[i][j]` is 1, the value of `dp[i][j]` depends on the minimum of the squares that can be formed by extending from `(i-1, j)`, `(i, j-1)`, and `(i-1, j-1)`. The transition formula is:
        ```
        dp[i][j] = min(dp[i-1][j], dp[i][j-1], dp[i-1][j-1]) + 1
        ```
      - If `matrix[i][j]` is 0, `dp[i][j]` will be 0 because a square of ones cannot end at a cell with a zero.

3. **Count All Squares**:
   - Accumulate the values of `dp[i][j]` for all `(i, j)` to get the total number of squares of all sizes.

4. **Time Complexity**:
   - The solution works in _**O(m X n)**_, where _**m**_ and _**n**_ are the dimensions of the matrix.

Let's implement this solution in PHP: **[1277. Count Square Submatrices with All Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001277-count-square-submatrices-with-all-ones/solution.php)**

```php
<?php
/**
 * @param Integer[][] $matrix
 * @return Integer
 */
function countSquares($matrix) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test the function with example inputs
$matrix1 = [[0, 1, 1, 1], [1, 1, 1, 1], [0, 1, 1, 1]];
$matrix2 = [[1, 0, 1], [1, 1, 0], [1, 1, 0]];

echo "Output for matrix1: " . countSquares($matrix1) . "\n"; // Expected: 15
echo "Output for matrix2: " . countSquares($matrix2) . "\n"; // Expected: 7
?>
```

### Explanation:

1. We initialize a 2D array `dp` to keep track of the size of the largest square submatrix ending at each position `(i, j)`.
2. For each cell in the matrix:
   - If the cell has a 1, we compute `dp[i][j]` based on neighboring cells and add its value to `totalSquares`.
3. Finally, `totalSquares` contains the count of all square submatrices with all ones.

This solution is efficient and meets the constraints provided in the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
