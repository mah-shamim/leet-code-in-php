2943\. Maximize Area of Square Hole in Grid

**Difficulty:** Medium

**Topics:** `Array`, `Sorting`, `Biweekly Contest 118`

You are given the two integers, `n` and `m` and two integer arrays, `hBars` and `vBars`. The grid has `n + 2` horizontal and `m + 2` vertical bars, creating `1 x 1` unit cells. The bars are indexed starting from `1`.

You can **remove** some of the bars in `hBars` from horizontal bars and some of the bars in `vBars` from vertical bars. Note that other bars are fixed and cannot be removed.

Return an integer denoting the **maximum area** of a _square-shaped_ hole in the grid, after removing some bars (possibly none).

**Example 1:**

![screenshot-from-2023-11-05-22-40-25](https://assets.leetcode.com/uploads/2023/11/05/screenshot-from-2023-11-05-22-40-25.png)

- **Input:** n = 2, m = 1, hBars = [2,3], vBars = [2]
- **Output:** 4
- **Explanation:**
  - The left image shows the initial grid formed by the bars. The horizontal bars are `[1,2,3,4]`, and the vertical bars are `[1,2,3]`.
  - One way to get the maximum square-shaped hole is by removing horizontal bar 2 and vertical bar 2.

**Example 2:**

![screenshot-from-2023-11-04-17-01-02](https://assets.leetcode.com/uploads/2023/11/04/screenshot-from-2023-11-04-17-01-02.png)

- **Input:** n = 1, m = 1, hBars = [2], vBars = [2]
- **Output:** 4
- **Explanation:** To get the maximum square-shaped hole, we remove horizontal bar 2 and vertical bar 2.

**Example 3:**

![unsaved-image-2](https://assets.leetcode.com/uploads/2024/03/12/unsaved-image-2.png)

- **Input:** n = 2, m = 3, hBars = [2,3], vBars = [2,4]
- **Output:** 4
- **Explanation:** One way to get the maximum square-shaped hole is by removing horizontal bar 3, and vertical bar 4.

**Constraints:**

- `1 <= n <= 10⁹`
- `1 <= m <= 10⁹`
- `1 <= hBars.length <= 100`
- `2 <= hBars[i] <= n + 1`
- `1 <= vBars.length <= 100`
- `2 <= vBars[i] <= m + 1`
- All values in `hBars` are distinct.
- All values in `vBars` are distinct.



**Hint:**
1. Sort `hBars` and `vBars` and consider them separately.
2. Compute the longest sequence of consecutive integer values in each array, denoted as `[hx, hy]` and `[vx, vy]`, respectively.
3. The maximum square length we can get is `min(hy - hx + 2, vy - vx + 2)`.
4. Square the maximum square length to get the area.



**Similar Questions:**
1. [221. Maximal Square](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000221-maximal-square)
2. [2975. Maximum Square Area by Removing Fences From a Field](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002975-maximum-square-area-by-removing-fences-from-a-field)






**Solution:**

We are given the problem of maximizing the area of a square hole in a grid by removing some bars.
The grid has horizontal bars from 1 to n+2 and vertical bars from 1 to m+2.
We are given two arrays: hBars (horizontal bars that we can remove) and vBars (vertical bars that we can remove).

### Approach:

1. **Sort both arrays**: Sort `hBars` and `vBars` in ascending order to easily identify consecutive sequences.
2. **Find longest consecutive sequences**: For each sorted array, find the length of the longest consecutive sequence of integers.
3. **Calculate gap lengths**: For a sequence of `k` consecutive removable bars, you can create a gap of length `(k + 1)` units (since the fixed bars at both ends remain).
4. **Determine square side**: The maximum square hole side length is the minimum of the maximum horizontal gap and maximum vertical gap.
5. **Return area**: Square the side length to get the area.

Let's implement this solution in PHP: **[2943. Maximize Area of Square Hole in Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002943-maximize-area-of-square-hole-in-grid/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $m
 * @param Integer[] $hBars
 * @param Integer[] $vBars
 * @return Integer
 */
function maximizeSquareHoleArea(int $n, int $m, array $hBars, array $vBars): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximizeSquareHoleArea(2, 1, [2,3], [2]) . "\n";       // Output: 4
echo maximizeSquareHoleArea(1, 1, [2], [2]) . "\n";         // Output: 4
echo maximizeSquareHoleArea(2, 3, [2,3], [2,4]) . "\n";     // Output: 4
?>
```

### Explanation:

- **Consecutive bar removal**: When you remove consecutive horizontal bars (like bars 2, 3, 4), you effectively merge multiple adjacent 1×1 cells into a larger rectangular hole. The same applies to vertical bars.
- **Gap calculation**: If you remove bars `[x, x+1, x+2, ..., x+k-1]` (k consecutive bars), the gap between the fixed bar at `(x-1)` and `(x+k)` becomes `(k + 1)` units.
- **Square constraint**: A square hole requires equal horizontal and vertical dimensions. The maximum square size is limited by the smaller of the maximum horizontal and vertical gaps you can create.
- **Fixed bars**: Note that bars 1 and `(n+2)` (for horizontal) and bars 1 and `(m+2)` (for vertical) are always fixed and cannot be removed. The arrays `hBars` and `vBars` contain indices of removable bars between these fixed boundaries.

**Key Insight**: The problem reduces to finding the longest consecutive sequence in each array, then using `min(horizontal_gap, vertical_gap)` as the square side length.

### Complexity
- **Time Complexity**: O(h log h + v log v) where h = length of hBars, v = length of vBars (due to sorting).
- **Space Complexity**: O(1) extra space (excluding input storage).


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**