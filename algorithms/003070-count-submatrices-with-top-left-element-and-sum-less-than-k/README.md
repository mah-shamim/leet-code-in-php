3070\. Count Submatrices with Top-Left Element and Sum Less Than k

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Matrix`, `Prefix Sum`, `Weekly Contest 387`

You are given a **0-indexed** integer matrix `grid` and an integer `k`.

Return _the **number** of submatrices[^1] that contain the top-left element of the `grid`, and have a sum less than or equal to `k`_.

**Example 1:**

![example1](https://assets.leetcode.com/uploads/2024/01/01/example1.png)

- **Input:** grid = [[7,6,3],[6,6,1]], k = 18
- **Output:** 4
- **Explanation:** There are only 4 submatrices, shown in the image above, that contain the top-left element of grid, and have a sum less than or equal to 18.

**Example 2:**

![example21](https://assets.leetcode.com/uploads/2024/01/01/example21.png)

- **Input:** grid = [[7,2,9],[1,5,0],[2,6,6]], k = 20
- **Output:** 6
- **Explanation:** There are only 6 submatrices, shown in the image above, that contain the top-left element of grid, and have a sum less than or equal to 20.

**Constraints:**

- `m == grid.length` 
- `n == grid[i].length`
- `1 <= n, m <= 1000` 
- `0 <= grid[i][j] <= 1000`
- `1 <= k <= 10⁹`







**Solution:**

The problem asks to count all submatrices that include the top‑left cell `(0,0)` and whose sum is less than or equal to a given integer `k`. The provided solution uses an efficient prefix‑sum technique: it iterates over the matrix row by row, maintaining a running column‑wise prefix that represents the sum of the submatrix from `(0,0)` to the current cell `(i,j)`. For each such cell, if its corresponding sum is ≤ `k`, the counter is incremented. This yields the total number of valid submatrices in **O(m·n)** time and **O(n)** extra space.

### Approach:

- Initialize an array `colPrefix` of size `n` (number of columns) with zeros.
- Set a counter `count = 0`.
- Loop over each row `i` from `0` to `m-1`:
   - Initialize a variable `rowSum = 0`.
   - Loop over each column `j` from `0` to `n-1`:
      - Add `grid[i][j]` to `rowSum` → this gives the sum of the current row from column `0` to `j`.
      - Add `rowSum` to `colPrefix[j]`. After this addition, `colPrefix[j]` holds the sum of the rectangle whose top‑left is `(0,0)` and bottom‑right is `(i,j)`.
      - If `colPrefix[j] <= k`, increment `count`.
- Return `count`.

Let's implement this solution in PHP: **[3070. Count Submatrices with Top-Left Element and Sum Less Than k](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003070-count-submatrices-with-top-left-element-and-sum-less-than-k/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer
 */
function countSubmatrices(array $grid, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countSubmatrices([[7,6,3],[6,6,1]], 18) . "\n";                    // Output: 4
echo countSubmatrices([[7,2,9],[1,5,0],[2,6,6]], 20) . "\n";            // Output: 6
?>
```

### Explanation:

- Because every valid submatrix must start at `(0,0)`, it is completely determined by its bottom‑right corner `(i,j)`.
- Instead of recomputing each rectangle sum from scratch, we build cumulative sums incrementally:
   - `rowSum` accumulates the sum of the current row up to column `j`.
   - `colPrefix[j]` accumulates the sum of all rows up to row `i` for the rectangle that ends at column `j`. Initially, for `i=0`, it becomes the row prefix of the first row. For later rows, adding the new `rowSum` effectively appends the new row’s segment to the previous cumulative sum, forming the complete rectangle sum.
- The algorithm checks every possible bottom‑right corner exactly once, ensuring correctness and efficiency.

### Complexity
- **Time Complexity**: _**O(m·n)**_ – each cell is processed a constant number of times.
- **Space Complexity**: _**O(n)**_ – the `colPrefix` array of length `n` (plus a few scalar variables). This is optimal for the problem constraints (up to 1000 columns).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**