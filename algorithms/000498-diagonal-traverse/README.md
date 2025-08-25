498\. Diagonal Traverse

**Difficulty:** Medium

**Topics:** `Array`, `Matrix`, `Simulation`

Given an `m x n` matrix `mat`, return _an array of all the elements of the array in a diagonal order_.

**Example 1:**

![diag1-grid](https://assets.leetcode.com/uploads/2021/04/10/diag1-grid.jpg)

- **Input:** mat = [[1,2,3],[4,5,6],[7,8,9]]
- **Output:** [1,2,4,7,5,3,6,8,9]

**Example 2:**

- **Input:** mat = [[1,2],[3,4]]
- **Output:** [1,2,3,4]

**Constraints:**

- `m == mat.length`
- `n == mat[i].length`
- <code>1 <= m, n <= 10<sup>4</sup></code>
- <code>1 <= m * n <= 10<sup>4</sup></code>
- <code>-10<sup>5</sup> <= mat[i][j] <= 10<sup>5</sup></code>



**Similar Questions:**
1. [2075. Decode the Slanted Ciphertext](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002075-decode-the-slanted-ciphertext)






**Solution:**

We need to traverse a given matrix in a diagonal order, alternating the direction of traversal for each diagonal. The key observation is that the sum of the indices (i + j) for each element in a diagonal is constant. For even-indexed diagonals (by sum), we traverse from the bottom to the top, and for odd-indexed diagonals, we traverse from the top to the bottom.

### Approach
1. **Problem Analysis**: The problem requires traversing a matrix diagonally, changing direction after each diagonal. The challenge is to handle the boundaries of the matrix correctly while alternating the traversal direction.
2. **Key Insight**: For each diagonal sum `s` (from 0 to `m + n - 2`), if `s` is even, we start from the bottom-most valid row and move upwards. If `s` is odd, we start from the right-most valid column and move leftwards and downwards.
3. **Algorithm**:
    - Iterate over each possible diagonal sum `s`.
    - For even `s`, start with the highest possible row index within bounds and move up, collecting elements until we go out of bounds.
    - For odd `s`, start with the highest possible column index within bounds and move down and left, collecting elements until we go out of bounds.
4. **Complexity Analysis**: The algorithm visits each element exactly once, resulting in a time complexity of O(m * n), which is optimal. The space complexity is O(1) excluding the output array.

Let's implement this solution in PHP: **[498. Diagonal Traverse](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000498-diagonal-traverse/solution.php)**

```php
<?php
/**
 * @param Integer[][] $mat
 * @return Integer[]
 */
function findDiagonalOrder($mat) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1:
$mat1 = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
print_r(findDiagonalOrder($mat1));
// Expected: [1,2,4,7,5,3,6,8,9]

// Example 2:
$mat2 = [
    [1, 2],
    [3, 4]
];
print_r(findDiagonalOrder($mat2));
// Expected: [1,2,3,4]
?>
```

### Explanation:

1. **Initialization**: We determine the dimensions of the matrix `m` (number of rows) and `n` (number of columns).
2. **Diagonal Sum Iteration**: For each diagonal sum `s` from 0 to `m + n - 2`:
    - **Even `s`**: We start from the bottom-most valid row (minimizing `s` and `m-1`) and move upwards, collecting elements until we exceed the matrix boundaries.
    - **Odd `s`**: We start from the right-most valid column (minimizing `s` and `n-1`) and move downwards and leftwards, collecting elements until we exceed the matrix boundaries.
3. **Result Construction**: The collected elements are stored in the result array, which is returned after processing all diagonals.

This approach efficiently collects all elements in the required diagonal order by leveraging the constant sum of indices for each diagonal and alternating traversal directions. The solution handles all edge cases, including non-square matrices, seamlessly.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**