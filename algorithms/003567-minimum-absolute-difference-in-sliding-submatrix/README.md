3567\. Minimum Absolute Difference in Sliding Submatrix

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Sorting`, `Matrix`, `Weekly Contest 452`

You are given an `m x n` integer matrix `grid` and an integer `k`.

For every contiguous `k x k` **submatrix** of `grid`, compute the **minimum absolute** difference between any two **distinct** values within that **submatrix**.

Return a 2D array `ans` of size `(m - k + 1) x (n - k + 1)`, where `ans[i][j]` is the minimum absolute difference in the submatrix whose top-left corner is `(i, j)` in `grid`.

**Note:** If all elements in the submatrix have the same value, the answer will be 0.
A submatrix `(x1, y1, x2, y2)` is a matrix that is formed by choosing all cells `matrix[x][y]` where `x1 <= x <= x2` and `y1 <= y <= y2`.

**Example 1:**

- **Input:** grid = [[1,8],[3,-2]], k = 2
- **Output:** [[2]]
- **Explanation:**
  - There is only one possible `k x k` submatrix: `[[1, 8], [3, -2]]`.
  - Distinct values in the submatrix are `[1, 8, 3, -2]`.
  - The minimum absolute difference in the submatrix is `|1 - 3| = 2`. Thus, the answer is `[[2]]`.


**Example 2:**

- **Input:** grid = [[3,-1]], k = 1
- **Output:** [[0,0]]
- **Explanation:**
  - Both `k x k` submatrix has only one distinct element.
  - Thus, the answer is `[[0, 0]]`.


**Example 3:**

- **Input:** grid = [[1,-2,3],[2,3,5]], k = 2
- **Output:** [[1,2]]
- **Explanation:**
  - There are two possible `k × k` submatrix:
    - Starting at `(0, 0)`: `[[1, -2], [2, 3]]`.
      - Distinct values in the submatrix are `[1, -2, 2, 3]`.
      - The minimum absolute difference in the submatrix is `|1 - 2| = 1`.
    - Starting at `(0, 1)`: `[[-2, 3], [3, 5]]`.
      - Distinct values in the submatrix are `[-2, 3, 5]`.
      - The minimum absolute difference in the submatrix is `|3 - 5| = 2`.
  - Thus, the answer is `[[1, 2]]`.


**Constraints:**

- `1 <= m == grid.length <= 30`
- `1 <= n == grid[i].length <= 30`
- `-10⁵ <= grid[i][j] <= 10⁵`
- `1 <= k <= min(m, n)`



**Hint:**
1. Use bruteforce over the submatrices






**Solution:**

The problem asks for the minimum absolute difference between any two distinct values in every contiguous `k x k` submatrix of a given `m x n` integer matrix. The result is an `(m - k + 1) x (n - k + 1)` matrix where each entry corresponds to one submatrix. The constraints (`m, n ≤ 30`) allow a straightforward brute-force approach: for each top-left corner, extract the submatrix elements, keep only distinct values, sort them, and compute the smallest gap between consecutive sorted values. If all elements are equal, the result is `0`.

### Approach:

- **Brute-force iteration**: Loop over all possible top-left corners `(i, j)` where `0 ≤ i ≤ m - k` and `0 ≤ j ≤ n - k`.
- **Collect elements**: For each corner, collect all `k * k` elements from the submatrix into a list.
- **Keep distinct values**: Use `array_unique()` to remove duplicates.
- **Handle single‑value case**: If fewer than two distinct values exist, the answer for that submatrix is `0`.
- **Sort and compute differences**: Sort the distinct values ascending, then iterate to find the minimum difference between consecutive elements.
- **Store result**: Append the computed minimum difference to the corresponding row of the answer matrix.

Let's implement this solution in PHP: **[3567. Minimum Absolute Difference in Sliding Submatrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003567-minimum-absolute-difference-in-sliding-submatrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer[][]
 */
function minAbsDiff(array $grid, int $k): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minAbsDiff([[1,8],[3,-2]], 2) . "\n";              // Output: [[2]]
echo minAbsDiff([[3,-1]], 1) . "\n";                    // Output: [[0,0]]
echo minAbsDiff([[1,-2,3],[2,3,5]], 2) . "\n";          // Output: [[1,2]]
?>
```

### Explanation:

- The algorithm directly follows the problem definition: for every possible `k x k` submatrix, we need the minimum absolute difference among any two distinct numbers inside it.
- Because `k` can be as large as `min(m, n)`, the total number of submatrices is at most `(30-1+1)^2 = 900` (when `k=1`, there are `30*30=900` submatrices). Each submatrix contains at most `30*30=900` elements, so the total work is about `900 * (900 * log 900)` worst-case, which is feasible.
- The steps for each submatrix:
   1. Collect all values into an array – O(k²).
   2. Remove duplicates – O(k²) in practice with hashing.
   3. Sort distinct values – O(d log d) where `d ≤ k²`.
   4. Scan sorted array to find minimum adjacent difference – O(d).
- If all values are identical, `array_unique` yields one element; we directly output `0`.
- Sorting ensures that the minimum absolute difference between any two distinct elements is always the minimum difference between consecutive sorted elements (since the absolute difference is minimized among close values).

### Complexity
- **Time Complexity**:
   - Number of submatrices = `(m - k + 1) * (n - k + 1) ≤ m * n ≤ 900`.
   - For each submatrix:
      - Extracting elements: `O(k²)`.
      - Removing duplicates: `O(k²)` (hash lookups).
      - Sorting distinct values: `O(d log d)` with `d ≤ k² ≤ 900`.
      - Scanning: `O(d)`.
   - In the worst case, total time ≈ `O(m * n * k² log k²)` which is well within limits (`900 * 900 * log 900 ≈ 7e6` operations).
- **Space Complexity**:
   - For each submatrix, we store up to `k²` elements, so `O(k²)` temporary space.
   - The output matrix uses `O((m - k + 1) * (n - k + 1))` space, which is also `O(m * n)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**