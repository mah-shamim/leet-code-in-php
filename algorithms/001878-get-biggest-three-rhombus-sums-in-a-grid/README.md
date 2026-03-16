1878\. Get Biggest Three Rhombus Sums in a Grid

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Math`, `Sorting`, `Heap (Priority Queue)`, `Matrix`, `Prefix Sum`, `Biweekly Contest 53`

You are given an `m x n` integer matrix `grid`.

A **rhombus sum** is the sum of the elements that form **the border** of a regular rhombus shape in `grid`. The rhombus must have the shape of a square rotated 45 degrees with each of the corners centered in a grid cell. Below is an image of four valid rhombus shapes with the corresponding colored cells that should be included in each **rhombus sum**:

![pc73-q4-desc-2](https://assets.leetcode.com/uploads/2021/04/23/pc73-q4-desc-2.png)

Note that the rhombus can have an area of 0, which is depicted by the purple rhombus in the bottom right corner.

Return _the biggest three **distinct rhombus sums** in the `grid` in **descending order**. If there are less than three distinct values, return all of them._

**Example 1:**

![pc73-q4-ex1](https://assets.leetcode.com/uploads/2021/04/23/pc73-q4-ex1.png)

- **Input:** grid = [[3,4,5,1,3],[3,3,4,2,3],[20,30,200,40,10],[1,5,5,4,1],[4,3,2,2,5]]
- **Output:** [228,216,211]
- **Explanation:** The rhombus shapes for the three biggest distinct rhombus sums are depicted above.
  - Blue: 20 + 3 + 200 + 5 = 228
  - Red: 200 + 2 + 10 + 4 = 216
  - Green: 5 + 200 + 4 + 2 = 211

**Example 2:**

![pc73-q4-ex2](https://assets.leetcode.com/uploads/2021/04/23/pc73-q4-ex2.png)

- **Input:** grid = [[1,2,3],[4,5,6],[7,8,9]]
- **Output:** [20,9,8]
- **Explanation:** The rhombus shapes for the three biggest distinct rhombus sums are depicted above.
  - Blue: 4 + 2 + 6 + 8 = 20
  - Red: 9 (area 0 rhombus in the bottom right corner)
  - Green: 8 (area 0 rhombus in the bottom middle)

**Example 3:**

- **Input:** grid = [[7,7,7]]
- **Output:** [7]
- **Explanation:** All three possible rhombus sums are the same, so return [7].

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 50`
- `1 <= grid[i][j] <= 10⁵`


**Hint:**
1. You need to maintain only the biggest 3 distinct sums
2. The limits are small enough for you to iterate over all rhombus sizes then iterate over all possible borders to get the sums


**Similar Questions:**
1. [2088. Count Fertile Pyramids in a Land](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002088-count-fertile-pyramids-in-a-land)






**Solution:**

The problem requires finding the three largest distinct sums of the border elements of any rhombus-shaped (rotated square) region in a given grid. The solution exhaustively enumerates all possible rhombus centers and sizes, computes the border sum for each valid shape, collects all distinct sums, sorts them descending, and returns the top three. Since the grid dimensions are at most `50×50`, this brute-force approach is efficient and straightforward.

### Approach:

- Iterate over every cell `(i, j)` as a potential rhombus center.
- For each center, determine the maximum possible rhombus size `maxSize` based on how far we can go in all four diagonal directions without leaving the grid:  
  `maxSize = min(i, m-1-i, j, n-1-j)`.
- For each size `s` from 0 to `maxSize`:
   - If `s == 0`, the rhombus sum is simply `grid[i][j]` (a single cell).
   - For `s > 0`, compute the border sum by iterating over rows from `i-s` to `i+s`:
      - For a given row offset `dr` (where `-s ≤ dr ≤ s`), let `rem = s - |dr|` (the horizontal distance from the center to the border on that row).
      - If `rem == 0` (top or bottom vertex), add `grid[i+dr][j]`.
      - Otherwise, add the two symmetric border cells: `grid[i+dr][j+rem]` and `grid[i+dr][j-rem]`.
- Append each computed sum to an array `$sums`.
- After processing all centers and sizes, use `array_unique` to remove duplicate sums.
- Sort the unique sums in descending order with `rsort`.
- Return the first three elements (or fewer if less than three distinct sums exist).

Let's implement this solution in PHP: **[1878. Get Biggest Three Rhombus Sums in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001878-get-biggest-three-rhombus-sums-in-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer[]
 */
function getBiggestThree(array $grid): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo getBiggestThree([[3,4,5,1,3],[3,3,4,2,3],[20,30,200,40,10],[1,5,5,4,1],[4,3,2,2,5]]) . "\n";       // Output: [228,216,211]
echo getBiggestThree([[1,2,3],[4,5,6],[7,8,9]]) . "\n";                                                 // Output: [20,9,8]
echo getBiggestThree([[7,7,7]]) . "\n";                                                                 // Output: [7]

?>
```

### Explanation:

- A rhombus shape is defined by a center cell and a size `s`. The border consists of all cells whose Manhattan distance from the center equals `s` (i.e., `|r-i| + |c-j| = s`). This matches the shape of a square rotated 45°.
- For a given size `s`, the border is traversed row by row. On each row `r = i + dr`, the cells at columns `j ± rem` are the border points. When `rem = 0` (the topmost and bottommost rows), only the center column contributes.
- The maximum size is limited by the grid boundaries: the rhombus must stay completely inside the grid, so the center must be at least `s` steps away from any edge.
- The algorithm collects sums for every possible rhombus (including size 0) in the grid. Because `m, n ≤ 50`, the total number of rhombi is at most `50×50×25 ≈ 62,500` (actually `m*n*min(m,n)` ≈ 125,000 in worst case), which is manageable.
- After building the list, we keep only distinct values, sort descending, and take the top three. This ensures the result meets the problem’s requirement.

### Complexity
- **Time Complexity**: For each cell `(i, j)` (O(m·n) cells) and each size `s` up to `min(m,n)` (O(K) sizes), computing the border sum takes O(s) operations. Hence total is O(m·n·K²) where K = min(m,n). With m, n ≤ 50, this is at most ~6.25 million steps, well within limits.
- **Space Complexity**: We store all rhombus sums in an array, which can have up to O(m·n·K) ≈ 125,000 entries. Sorting this array takes O(L log L) where L is the number of sums. The space used is proportional to the number of sums.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**