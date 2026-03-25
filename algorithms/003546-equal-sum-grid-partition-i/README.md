3546\. Equal Sum Grid Partition I

**Difficulty:** Medium

**Topics:** `Union Find`, `Graph`

You are given an `m x n` matrix `grid` of positive integers. Your task is to determine if it is possible to make **either one horizontal or one vertical cut** on the grid such that:

- Each of the two resulting sections formed by the cut is **non-empty**.
- The sum of the elements in both sections is **equal**.

Return `true` if such a partition exists; otherwise return `false`.

**Example 1:**

- **Input:** grid = [[1,4],[2,3]]
- **Output:** true
- **Explanation:**

   ![lc](https://assets.leetcode.com/uploads/2025/03/30/lc.jpeg)
   A horizontal cut between row 0 and row 1 results in two non-empty sections, each with a sum of 5. Thus, the answer is `true`.

**Example 2:**

- **Input:** grid = [[1,3],[2,4]]
- **Output:** false
- **Explanation:** No horizontal or vertical cut results in two non-empty sections with equal sums. Thus, the answer is `false`.

**Example 3:**

- **Input:** grid = [[2,2]]
- **Output:** true

**Example 4:**

- **Input:** grid = [[3],[3]]
- **Output:** true

**Example 5:**

- **Input:** grid = [[1,2],[3,4]]
- **Output:** false

**Constraints:**

- `1 <= m == grid.length <= 10⁵`
- `1 <= n == grid[i].length <= 10⁵`
- `2 <= m * n <= 10⁵`
- `1 <= grid[i][j] <= 10⁵`



**Hint:**
1. There are two types of cuts: a `horizontal` cut or a `vertical` cut.
2. For a `horizontal` cut at row `r` (0 <= r grid into rows 0...r vs. r+1...m-1 and compare their sums.
3. For a `vertical` cut at column `c` (0 <= c < n - 1), split `grid` into columns 0...c vs. c+1...n-1 and compare their sums.
4. Brute‑force all possible `r` and `c` cuts; if any yields equal section sums, return `true`.






**Solution:**

The problem asks whether a grid of positive integers can be split into two non‑empty sections by a single horizontal or vertical cut such that the sums of the two sections are equal. The solution computes the total sum and checks if it is even. Then it uses prefix sums over rows and columns to see if any cut yields exactly half the total. The approach runs in linear time relative to the number of cells.

### Approach:

- **Compute row and column sums** – iterate over the entire grid to obtain the total sum, the sum of each row, and the sum of each column.
- **Early exit for odd total** – if the total sum is odd, an equal split is impossible.
- **Check horizontal cuts** – accumulate row sums from the top; after each row (except the last), compare the accumulated sum with `total / 2`. If a match is found, return `true`.
- **Check vertical cuts** – similarly, accumulate column sums from the left; after each column (except the last), compare with `total / 2`. If a match is found, return `true`.
- **No valid cut found** – return `false`.

Let's implement this solution in PHP: **[3546. Equal Sum Grid Partition I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003546-equal-sum-grid-partition-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Boolean
 */
function canPartitionGrid(array $grid): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo canPartitionGrid([[1,4],[2,3]]) . "\n";        // Output: true
echo canPartitionGrid([[1,3],[2,4]]) . "\n";        // Output: false
echo canPartitionGrid([[2,2]]) . "\n";              // Output: true
echo canPartitionGrid([[3],[3]]) . "\n";            // Output: true
echo canPartitionGrid([[1,2],[3,4]]) . "\n";        // Output: false
?>
```

### Explanation:

- **Non‑empty sections** – the cut must be placed between rows or columns so that both resulting parts contain at least one row or column. This is why the loops stop at `m-1` and `n-1`.
- **Prefix sums** – by accumulating row sums (or column sums), we can compute the sum of the top part (or left part) in _**O(1)**_ after each addition. This avoids recomputing sums from scratch for each cut.
- **Equality condition** – the sum of one part must be exactly half the total. Because all numbers are positive, the prefix sums are strictly increasing, so at most one cut can satisfy the condition, but we only need existence.
- **Why two separate checks** – a horizontal cut affects whole rows, a vertical cut affects whole columns. They are independent, so both possibilities must be examined.

### Complexity
- **Time Complexity**: _**O(m × n)**_, because we traverse the entire grid once to compute row and column sums, and then we traverse _**O(m + n)**_ for the prefix checks. Since the total number of cells is up to _**10⁵**_, the solution is efficient.
- **Space Complexity**: _**O(m + n)**_ for storing row sums and column sums, plus a few scalar variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**