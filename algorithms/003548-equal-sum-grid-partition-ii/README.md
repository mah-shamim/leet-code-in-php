3548\. Equal Sum Grid Partition II

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Hash Table`, `Matrix`, `Enumeration`, `Prefix Sum`, `Weekly Contest 449`

You are given an `m x n` matrix `grid` of positive integers. Your task is to determine if it is possible to make **either one horizontal or one vertical** cut on the grid such that:

- Each of the two resulting sections formed by the cut is **non-empty**.
- The sum of elements in both sections is **equal**, or can be made equal by discounting **at most** one single cell in total (from either section).
- If a cell is discounted, the rest of the section must **remain connected**.

Return `true` if such a partition exists; otherwise, return `false`.

**Note:** A section is **connected** if every cell in it can be reached from any other cell by moving up, down, left, or right through other cells in the section.

**Example 1:**

- **Input:** grid = [[1,4],[2,3]]
- **Output:** true
- **Explanation:**
   ![lc](https://assets.leetcode.com/uploads/2025/03/30/lc.jpeg)
   - A horizontal cut after the first row gives sums `1 + 4 = 5` and `2 + 3 = 5`, which are equal. Thus, the answer is `true`.

**Example 2:**

- **Input:** grid = [[1,2],[3,4]]
- **Output:** true
- **Explanation:**
   ![chatgpt-image-apr-1-2025-at-05_28_12-pm](https://assets.leetcode.com/uploads/2025/04/01/chatgpt-image-apr-1-2025-at-05_28_12-pm.png)
   - A vertical cut after the first column gives sums `1 + 3 = 4` and `2 + 4 = 6`.
   - By discounting 2 from the right section (`6 - 2 = 4`), both sections have equal sums and remain connected. Thus, the answer is `true`.


**Example 3:**

- **Input:** grid = [[1,2,4],[2,3,5]]
- **Output:** false
- **Explanation:**
   ![chatgpt-image-apr-2-2025-at-02_50_29-am](https://assets.leetcode.com/uploads/2025/04/01/chatgpt-image-apr-2-2025-at-02_50_29-am.png)
   - A horizontal cut after the first row gives `1 + 2 + 4 = 7` and `2 + 3 + 5 = 10`.
   - By discounting 3 from the bottom section (`10 - 3 = 7`), both sections have equal sums, but they do not remain connected as it splits the bottom section into two parts (`[2]` and `[5]`). Thus, the answer is `false`.


**Example 4:**

- **Input:** grid = [[5]]
- **Output:** true


**Example 5:**

- **Input:** grid = [[1,3],[4,2]]
- **Output:** true

**Constraints:**

- `1 <= m == grid.length <= 10⁵`
- `1 <= n == grid[i].length <= 10⁵`
- `2 <= m * n <= 10⁵`
- `1 <= grid[i][j] <= 10⁵`



**Hint:**
1. In a grid (or any `subgrid`), when can a section be disconnected? Can disconnected components occur if the section spans more than one row and more than one column?
2. Handle single rows or single columns separately. For all other partitions, maintain the sums and value frequencies of each section to check whether removing at most one element from one section can make the two sums equal.






**Solution:**

The solution determines whether a single horizontal or vertical cut can partition the grid into two non‑empty sections whose sums are either equal or can be made equal by discarding at most one cell, provided the remainder of each section stays connected. It uses prefix sums to compute section totals and frequency maps to check for a removable cell that balances the sums. Connectivity is only a concern when a section is a single row or column; in those cases the discounted cell must be at an end.

### Approach:

- Compute the total sum of all elements and a frequency map of all values.
- **Horizontal cuts:** For each cut after row `i-1`, maintain the sum of the top part (`S1`) and the bottom part (`S2`) using row prefix sums. Also maintain frequency maps of values in the top and bottom parts.
   - If `S1 == S2`, return `true`.
   - If `S1 > S2`, let `v = S1 - S2`. If `v` exists in the top part’s frequency map, check whether the top part is either:
      - a single row (then `v` must be in the first or last column of that row), or
      - a single column (then `v` must be in the first or last row of that column), or
      - a rectangle with at least two rows and two columns (then any occurrence of `v` works).  
        If the condition passes, return `true`.
   - If `S2 > S1`, similarly check the bottom part.
- **Vertical cuts:** Analogous processing using column prefix sums and frequency maps for left and right parts.
- If no cut satisfies the condition, return `false`.

Let's implement this solution in PHP: **[3548. Equal Sum Grid Partition II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003548-equal-sum-grid-partition-ii/solution.php)**

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
echo canPartitionGrid([[1,4],[2,3]]) . "\n";            // Output: true
echo canPartitionGrid([[1,2],[3,4]]) . "\n";            // Output: true
echo canPartitionGrid([[1,2,4],[2,3,5]]) . "\n";        // Output: false
echo canPartitionGrid([[5]]) . "\n";                    // Output: true
echo canPartitionGrid([[1,3],[4,2]]) . "\n";            // Output: true
?>
```

### Explanation:

- **Prefix sums** allow _**O(1)**_ retrieval of section totals after _**O(m·n)**_ preprocessing.
- **Frequency maps** let us quickly test whether a value that would balance the sums is present in the larger section.
- **Connectivity** is automatically guaranteed for sections with both dimensions _**≥ 2**_ when a single cell is removed. For single‑row or single‑column sections, the removed cell must be at an extremity to keep the rest connected.
- The algorithm checks every possible horizontal and vertical cut, stopping as soon as a valid one is found.

### Complexity
- **Time Complexity**: _**O(m·n)**_ – each cell is processed a constant number of times (prefix sums, frequency updates, and checks).
- **Space Complexity**: _**O(m·n)**_ – to store the grid and frequency maps, but since the total number of cells _**≤ 10⁵**_, this is acceptable.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**