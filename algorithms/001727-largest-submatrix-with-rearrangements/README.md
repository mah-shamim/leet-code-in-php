1727\. Largest Submatrix With Rearrangements

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Greedy`, `Sorting`, `Matrix`, `Weekly Contest 224`

You are given a binary matrix `matrix` of size `m x n`, and you are allowed to rearrange the **columns** of the `matrix` in any order.

Return _the area of the largest submatrix within `matrix` where **every** element of the submatrix is `1` after reordering the columns optimally_.

**Example 1:**

![screenshot-2020-12-30-at-40536-pm](https://assets.leetcode.com/uploads/2020/12/29/screenshot-2020-12-30-at-40536-pm.png)

- **Input:** matrix = [[0,0,1],[1,1,1],[1,0,1]]
- **Output:** 4
- **Explanation:** You can rearrange the columns as shown above.
  The largest submatrix of 1s, in bold, has an area of 4.

**Example 2:**

![screenshot-2020-12-30-at-40852-pm](https://assets.leetcode.com/uploads/2020/12/29/screenshot-2020-12-30-at-40852-pm.png)

- **Input:** matrix = [[1,0,1,0,1]]
- **Output:** 3
- **Explanation:** You can rearrange the columns as shown above.
  The largest submatrix of 1s, in bold, has an area of 3.

**Example 3:**

- **Input:** matrix = [[1,1,0],[1,0,1]]
- **Output:** 2
- **Explanation:** Notice that you must rearrange entire columns, and there is no way to make a submatrix of 1s larger than an area of 2.

**Example 4:**

- **Input:** matrix = [[1,1,0,0,1,0,1,1,0,1,1,1,1,0,1,1,1,0,1,1,1,0,1,0,0,1,1,1,1,1,0,1,0,1,1],[1,1,1,1,1,1,0,1,0,1,1,1,0,1,1,1,1,0,1,1,0,1,1,1,1,1,1,0,1,0,0,1,1,1,1],[1,1,1,0,1,1,1,1,1,0,0,0,1,1,1,0,1,1,1,1,1,1,1,1,1,0,1,1,1,0,1,1,1,1,0]]
- **Output:** 40

**Constraints:**

- `m == matrix.length`
- `n == matrix[i].length`
- `1 <= m * n <= 10⁵`
- `matrix[i][j]` is either `0` or `1`.


**Hint:**
1. For each column, find the number of consecutive ones ending at each position.
2. For each row, sort the cumulative ones in non-increasing order and "fit" the largest submatrix.


**Similar Questions:**
1. [695. Max Area of Island](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000695-max-area-of-island)






**Solution:**

The problem asks for the largest area of a submatrix consisting entirely of `1`s after we are allowed to rearrange the columns of a binary matrix arbitrarily. The key insight is to process the matrix row by row, treating each column as having a "height" of consecutive `1`s ending at the current row. For each row, we sort these heights in descending order; the sorted order corresponds to choosing columns that can form a rectangle of height equal to the current height and width equal to the number of columns with at least that height. The maximum area for that row is then computed by iterating over the sorted heights, and the global maximum across all rows is the answer.

### Approach:

- Iterate through each row of the matrix.
- Maintain an array `heights` of size `n` (number of columns) where `heights[j]` stores the number of consecutive `1`s ending at the current row in column `j`. Update it: if the cell is `1`, increment; otherwise reset to `0`.
- For each row, make a copy of `heights` and sort it in **descending order**.
- Traverse the sorted heights. For the `k`-th element (0‑based), the height is `h`; this means we can form a rectangle of height `h` and width `k+1` (because all columns before it in the sorted list have height at least `h`). Compute the area `h * (k+1)`.
- Keep track of the maximum area encountered across all rows.
- Return the maximum area.

Let's implement this solution in PHP: **[1727. Largest Submatrix With Rearrangements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001727-largest-submatrix-with-rearrangements/solution.php)**

```php
<?php
/**
 * @param Integer[][] $matrix
 * @return float|int
 */
function largestSubmatrix(array $matrix): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestSubmatrix([[0,0,1],[1,1,1],[1,0,1]]) . "\n";        // Output: 4
echo largestSubmatrix([[1,0,1,0,1]]) . "\n";                    // Output: 3
echo largestSubmatrix([[1,1,0],[1,0,1]]) . "\n";                // Output: 2
echo largestSubmatrix([[1,1,0,0,1,0,1,1,0,1,1,1,1,0,1,1,1,0,1,1,1,0,1,0,0,1,1,1,1,1,0,1,0,1,1],[1,1,1,1,1,1,0,1,0,1,1,1,0,1,1,1,1,0,1,1,0,1,1,1,1,1,1,0,1,0,0,1,1,1,1],[1,1,1,0,1,1,1,1,1,0,0,0,1,1,1,0,1,1,1,1,1,1,1,1,1,0,1,1,1,0,1,1,1,1,0]]) . "\n";                // Output: 40
?>
```

### Explanation:

- **Why compute consecutive ones?**  
  For each cell `(i, j)`, `heights[j]` tells us how many consecutive `1`s have been seen in column `j` up to row `i`. This is essentially a histogram where the base is the current row and bars represent the number of `1`s above it. Rearranging columns means we can reorder these bars arbitrarily.

- **Why sort the heights per row?**  
  To maximize the rectangle area, we want to group columns with the largest heights together. Sorting descending ensures that for any candidate height `h`, all columns to its left (with indices `< k`) have height at least `h`, so we can form a rectangle of height `h` and width `k+1` using those columns. This is the same logic as finding the largest rectangle in a histogram, but here we are allowed to permute the bars freely, so the optimal arrangement is simply to place the tallest bars first.

- **Area calculation:**  
  After sorting, for each position `k` (0‑based), the maximum width we can achieve with height `h` (the value at `k`) is `k+1` because all previous `k` columns have height ≥ `h`. Thus, the area = `h * (k+1)`. We take the maximum over all `k`.

- **Global maximum:**  
  The best submatrix may be anchored at any row, so we perform this process for every row and keep the largest area encountered.

### Complexity
- **Time Complexity**:  _**O(m * n log n)**_, where `m` is the number of rows and `n` the number of columns. For each row we update heights (_**O(n)**_) and then sort them (_**O(n log n)**_). The total is _**O(m * n log n)**_. Given the constraint `m * n ≤ 10⁵`, this is efficient.
- **Space Complexity**: _**O(n)**_ for the `heights` array and the sorted copy (or we can sort in place if we use a copy, still _**O(n)**_ extra space).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**