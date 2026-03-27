2946\. Matrix Similarity After Cyclic Shifts

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Matrix`, `Simulation`, `Weekly Contest 373`

You are given an `m x n` integer matrix `mat` and an integer `k`. The matrix rows are 0-indexed.

The following process happens `k` times:

- **Even-indexed** rows (0, 2, 4, ...) are cyclically shifted to the left.
   ![lshift](https://assets.leetcode.com/uploads/2024/05/19/lshift.jpg)
- **Odd-indexed** rows (1, 3, 5, ...) are cyclically shifted to the right.
   ![rshift-stlone](https://assets.leetcode.com/uploads/2024/05/19/rshift-stlone.jpg)

Return `true` if the final modified matrix after `k` steps is identical to the original matrix, and `false` otherwise.


**Example 1:**

- **Input:** mat = [[1,2,3],[4,5,6],[7,8,9]], k = 4
- **Output:** false
- **Explanation:** In each step left shift is applied to rows 0 and 2 (even indices), and right shift to row 1 (odd index).
![t1-2](https://assets.leetcode.com/uploads/2024/05/19/t1-2.jpg)

**Example 2:**

- **Input:** mat = [[1,2,1,2],[5,5,5,5],[6,3,6,3]], k = 2
- **Output:** true
- **Explanation:**
![t1-3](https://assets.leetcode.com/uploads/2024/05/19/t1-3.jpg)

**Example 3:**

- **Input:** mat = [[2,2],[2,2]], k = 3
- **Output:** true
- **Explanation:** As all the values are equal in the matrix, even after performing cyclic shifts the matrix will remain the same.

**Example 4:**

- **Input:** mat = [[1,2],[3,4]], k = 0
- **Output:** true

**Example 4:**

- **Input:** mat = [[5],[7]], k = 5
- **Output:** true

**Constraints:**

- `1 <= mat.length <= 25`
- `1 <= mat[i].length <= 25`
- `1 <= mat[i][j] <= 25`
- `1 <= k <= 50`



**Hint:**
1. You can reduce `k` shifts to `(k % n)` shifts as after `n` shifts the matrix will become similar to the initial matrix.






**Solution:**

The problem asks whether after performing `k` cyclic shifts on a matrix—even-indexed rows shifted left, odd-indexed rows shifted right—the matrix becomes identical to the original.  
The solution reduces `k` modulo the number of columns (`n`) because a full cycle of `n` shifts brings any row back to its starting arrangement. It then checks that for every row and every column `j`, the element at `j` equals the element at `(j + k) % n`. This condition is necessary and sufficient for both left and right shifts to leave the row unchanged, and therefore for the whole matrix to be unchanged after `k` steps.

### Approach:

- **Reduce k modulo n** – Since shifting a row by `n` positions (left or right) returns it to the original order, we can replace `k` with `k % n`. If the result is `0`, the matrix is already unchanged, so we return `true`.
- **Unified invariance check** – For any row, being invariant under `k` left shifts is equivalent to being invariant under `k` right shifts. This reduces to verifying that for every column `j`, the element `row[j]` equals `row[(j + k) % n]`.
- **Iterate over rows and columns** – For each row, loop through all columns and test the condition. If any element fails, return `false`.
- **Return true** – If all rows satisfy the condition, the matrix after `k` steps is identical to the original.

Let's implement this solution in PHP: **[2946. Matrix Similarity After Cyclic Shifts](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002946-matrix-similarity-after-cyclic-shifts/solution.php)**

```php
<?php
/**
 * @param Integer[][] $mat
 * @param Integer $k
 * @return Boolean
 */
function areSimilar(array $mat, int $k): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo areSimilar([[1,2,3],[4,5,6],[7,8,9]], 4) . "\n";               // Output: false
echo areSimilar([[1,2,1,2],[5,5,5,5],[6,3,6,3]], 2) . "\n";         // Output: true
echo areSimilar([[2,2],[2,2]], 3) . "\n";                           // Output: true
echo areSimilar([[1,2],[3,4]], 0) . "\n";                           // Output: true
echo areSimilar([[5],[7]], 5) . "\n";                               // Output: true
?>
```

### Explanation:

- **Why reduce k modulo n?**  
  A cyclic shift by `n` positions (left or right) restores the original order of a row. Therefore, performing `k` shifts is equivalent to performing `k % n` shifts. This simplification avoids unnecessary work and handles large `k` efficiently.

- **Why is the same condition used for both even and odd rows?**
   - For an **even** row (left shift): after `k` left shifts, the element originally at index `j` moves to index `(j - k) mod n`. For the row to be unchanged, we need `mat[i][j] == mat[i][(j + k) mod n]` (substituting `j` with `(j + k) mod n`).
   - For an **odd** row (right shift): after `k` right shifts, the element originally at index `j` moves to index `(j + k) mod n`. For the row to be unchanged, we need `mat[i][j] == mat[i][(j - k) mod n]`.
   - The two conditions are equivalent because `mat[i][j] == mat[i][(j + k) mod n]` for all `j` implies `mat[i][(j - k) mod n] == mat[i][j]`. Thus, checking `row[j] == row[(j + k) % n]` works for both shift directions.

- **When is the matrix unchanged?**  
  The matrix is unchanged exactly when every row is unchanged after its respective shifts. The condition tested ensures that for each row, a shift by `k` positions (left or right) leaves the row identical. Because `k` is already reduced modulo `n`, this is sufficient.

### Complexity
- **Time Complexity**: _**O(m × n)**_ – We examine each element of the matrix once.
- **Space Complexity**: _**O(1)**_ – Only a few integer variables are used, regardless of input size.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
