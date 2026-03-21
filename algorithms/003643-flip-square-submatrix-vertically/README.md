3643\. Flip Square Submatrix Vertically

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Two Pointers`, `Matrix`, `Weekly Contest 462`

You are given an `m x n` integer matrix `grid`, and three integers `x`, `y`, and `k`.

The integers `x` and `y` represent the row and column indices of the **top-left** corner of a **square** submatrix and the integer `k` represents the size (side length) of the square submatrix.

Your task is to flip the submatrix by reversing the order of its rows vertically.

Return _the updated matrix_.

**Example 1:**

![gridexmdrawio](https://assets.leetcode.com/uploads/2025/07/20/gridexmdrawio.png)

- **Input:** grid = [[1,2,3,4],[5,6,7,8],[9,10,11,12],[13,14,15,16]], x = 1, y = 0, k = 3
- **Output:** [[1,2,3,4],[13,14,15,8],[9,10,11,12],[5,6,7,16]]
- **Explanation:** The diagram above shows the grid before and after the transformation.

**Example 2:**

![gridexm2drawio](https://assets.leetcode.com/uploads/2025/07/20/gridexm2drawio.png)

- **Input:** grid = [[3,4,2,3],[2,3,4,2]], x = 0, y = 2, k = 2
- **Output:** [[3,4,4,2],[2,3,2,3]]
- **Explanation:** The diagram above shows the grid before and after the transformation.

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 50`
- `1 <= grid[i][j] <= 100`
- `0 <= x < m`
- `0 <= y < n`
- `1 <= k <= min(m - x, n - y)`



**Hint:**
1. Use two pointers at the block's top and bottom rows and swap their `k` columns pairwise until the pointers meet.






**Solution:**

The problem requires flipping a square submatrix (defined by top‑left corner `(x, y)` and side length `k`) vertically within a given `m x n` integer matrix. The solution uses a two‑pointer technique to swap rows from the outer edges of the submatrix toward the center, modifying the original matrix in place and returning the updated grid.

### Approach:

- Identify the rows that belong to the submatrix: from `top = x` to `bottom = x + k - 1`.
- Use two pointers: `top` moving downward and `bottom` moving upward.
- While `top < bottom`:
   - Swap all elements in the columns `y` through `y + k - 1` between the current `top` and `bottom` rows.
   - Increment `top` and decrement `bottom` to move toward the center.
- Return the modified matrix.

Let's implement this solution in PHP: **[3643. Flip Square Submatrix Vertically](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003643-flip-square-submatrix-vertically/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $x
 * @param Integer $y
 * @param Integer $k
 * @return Integer[][]
 */
function reverseSubmatrix(array $grid, int $x, int $y, int $k): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo reverseSubmatrix([[1,2,3,4],[5,6,7,8],[9,10,11,12],[13,14,15,16]], 1, 0, 3) . "\n";        // Output: [[1,2,3,4],[13,14,15,8],[9,10,11,12],[5,6,7,16]]
echo reverseSubmatrix([[3,4,2,3],[2,3,4,2]], 0, 2, 2) . "\n";                                   // Output: [[3,4,4,2],[2,3,2,3]]

?>
```

### Explanation:

- The submatrix is a contiguous square of size `k × k` starting at `(x, y)`. Reversing rows vertically means the first row of the submatrix becomes the last, the second becomes the second‑last, etc.
- Two pointers `top` and `bottom` track the pair of rows to swap.
- For each pair, a loop over the `k` columns performs a standard three‑step swap to exchange the values.
- Pointers move inward until they meet or cross, ensuring every row in the submatrix is placed in its reversed position.
- The operation is performed directly on the input matrix, so no extra space is needed for the submatrix.

### Complexity
- **Time Complexity**: _**O(k²)**_ – each of the `⌊k/2⌋` row swaps processes exactly `k` columns, so the total number of swaps is roughly `k * ⌊k/2⌋`.
- **Space Complexity**: _**O(1)**_ – only a few temporary variables are used; the matrix is modified in place.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**