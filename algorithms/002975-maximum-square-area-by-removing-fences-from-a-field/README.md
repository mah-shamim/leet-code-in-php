2975\. Maximum Square Area by Removing Fences From a Field

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Enumeration`, `Weekly Contest 377`

There is a large `(m - 1) x (n - 1)` rectangular field with corners at `(1, 1)` and `(m, n)` containing some horizontal and vertical fences given in arrays `hFences` and `vFences` respectively.

Horizontal fences are from the coordinates `(hFences[i], 1)` to `(hFences[i], n)` and vertical fences are from the coordinates `(1, vFences[i])` to `(m, vFences[i])`.

Return _the **maximum** area of a **square** field that can be formed by **removing** some fences (**possibly none**) or `-1` if it is impossible to make a square field_.

Since the answer may be large, return it **modulo** `10⁹ + 7`.

**Note:** The field is surrounded by two horizontal fences from the coordinates `(1, 1)` to `(1, n)` and `(m, 1)` to `(m, n)` and two vertical fences from the coordinates `(1, 1)` to `(m, 1)` and `(1, n)` to` (m, n)`. These fences **cannot** be removed.

**Example 1:**

![screenshot-from-2023-11-05-22-40-25](https://assets.leetcode.com/uploads/2023/11/05/screenshot-from-2023-11-05-22-40-25.png)

- **Input:** m = 4, n = 3, hFences = [2,3], vFences = [2]
- **Output:** 4
- **Explanation:** Removing the horizontal fence at 2 and the vertical fence at 2 will give a square field of area 4.

**Example 2:**

![maxsquareareaexample1](https://assets.leetcode.com/uploads/2023/11/22/maxsquareareaexample1.png)

- **Input:** m = 6, n = 7, hFences = [2], vFences = [4]
- **Output:** -1
- **Explanation:** It can be proved that there is no way to create a square field by removing fences.

**Constraints:**

- `3 <= m, n <= 10⁹`
- `1 <= hFences.length, vFences.length <= 600`
- `1 < hFences[i] < m`
- `1 < vFences[i] < n`
- `hFences` and `vFences` are unique.



**Hint:**
1. Put `1` and `m` into `hFences`. The differences of any two values in the new `hFences` can be a horizontal edge of a rectangle.
2. Similarly, put `1` and `n` into `vFences`. The differences of any two values in the new `vFences` can be a vertical edge of a rectangle.
3. Our goal is to find the maximum common value in both parts.


**Similar Questions:**
1. [2943. Maximize Area of Square Hole in Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002943-maximize-area-of-square-hole-in-grid)





**Solution:**

We are given a large field with boundaries at `x=1`, `x=m`, `y=1`, `y=n`. Inside, there are horizontal fences (parallel to x-axis) at given `hFences` (x-coordinates) and vertical fences (parallel to y-axis) at given `vFences` (y-coordinates). We can remove some fences to create a larger open area. We want the maximum area of a square that can be formed by removing some fences.

### Approach:

1. **Expand fence arrays**: Add the boundary fences (1 and m to hFences, 1 and n to vFences) since these cannot be removed but define the available segments.
2. **Find all possible horizontal segments**: Compute all possible distances (differences) between any two horizontal fences by iterating through all pairs in the expanded hFences array.
3. **Find all possible vertical segments**: Similarly compute all possible distances between any two vertical fences in the expanded vFences array.
4. **Find maximum common distance**: Look for the largest distance that appears in both the horizontal and vertical segment sets. This represents the maximum possible square side length.
5. **Calculate area**: If a common distance exists, return (side × side) modulo 10⁹+7. Otherwise return -1.

Let's implement this solution in PHP: **[2975. Maximum Square Area by Removing Fences From a Field](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002975-maximum-square-area-by-removing-fences-from-a-field/solution.php)**

```php
<?php
/**
 * @param Integer $m
 * @param Integer $n
 * @param Integer[] $hFences
 * @param Integer[] $vFences
 * @return Integer
 */
function maximizeSquareArea(int $m, int $n, array $hFences, array $vFences): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximizeSquareArea(4, 3, [2,3], [2]) . "\n";       // Output: 4
echo maximizeSquareArea(6, 7, [2]. [4]) . "\n";         // Output: -1
?>
```

### Explanation:

- The key insight is that any two horizontal fences define a possible vertical side length for a rectangle, and any two vertical fences define a possible horizontal side length.
- To form a square, we need the same length to be available in both horizontal and vertical directions.
- By adding the boundaries (1, m) and (1, n), we ensure all possible segments are considered, including those using the outer boundaries.
- The algorithm efficiently finds all possible segment lengths using O(k²) comparisons where k is the number of fences (≤ 600), which is manageable.
- The solution works within the constraints by avoiding the massive m,n values (up to 10⁹) directly and only working with the fence positions.

**Complexity**:

- Time: O(H² + V²) where H and V are the numbers of horizontal and vertical fences after adding boundaries
- Space: O(H²) for storing the horizontal differences

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**