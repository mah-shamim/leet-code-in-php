3623\. Count Number of Trapezoids I

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Geometry`, `Weekly Contest 459`

You are given a 2D integer array `points`, where `points[i] = [xᵢ, yᵢ]` represents the coordinates of the `iᵗʰ` point on the Cartesian plane.

A **horizontal trapezoid** is a convex quadrilateral with **at least one pair** of horizontal sides (i.e. parallel to the x-axis). Two lines are parallel if and only if they have the same slope.

Return _the number of unique **horizontal trapezoids** that can be formed by choosing any four distinct points from `points`_.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

**Example 1:**

- **Input:** points = [[1,0],[2,0],[3,0],[2,2],[3,2]]
- **Output:** 3
- **Explanation:**
![desmos-graph-6](https://assets.leetcode.com/uploads/2025/05/01/desmos-graph-6.png)
   - There are three distinct ways to pick four points that form a horizontal trapezoid:
     - Using points `[1,0]`, `[2,0]`, `[3,2]`, and `[2,2]`.
     - Using points `[2,0]`, `[3,0]`, `[3,2]`, and `[2,2]`.
     - Using points `[1,0]`, `[3,0]`, `[3,2]`, and `[2,2]`.


**Example 2:**

- **Input:** points = [[0,0],[1,0],[0,1],[2,1]]
- **Output:** 1
- **Explanation:**
![desmos-graph-5](https://assets.leetcode.com/uploads/2025/04/29/desmos-graph-5.png)
   - There is only one horizontal trapezoid that can be formed.

**Constraints:**

- `4 <= points.length <= 10⁵`
- `–10⁸ <= xᵢ, yᵢ <= 10⁸`
- All points are pairwise distinct.



**Hint:**
1. For a line parallel to the x‑axis, all its points must share the same y‑coordinate.
2. Group the points by their y‑coordinate.
3. Choose two distinct groups (two horizontal lines), and from each group select two points to form a trapezoid.






**Solution:**

We need to count horizontal trapezoids formed by 4 points where at least one pair of sides is horizontal (parallel to x-axis). Here's my PHP solution:

### Approach:

1. **Group points by y-coordinate** - Since horizontal trapezoids require at least one pair of horizontal (parallel to x-axis) sides, points on the same horizontal line (same y-coordinate) can form these sides.
2. **Count combinations for each line** - For each horizontal line with `k` points, there are `C(k, 2) = k*(k-1)/2` ways to choose 2 points that could form a horizontal side.
3. **Count trapezoids across pairs of lines** - A trapezoid requires two distinct horizontal lines. For two lines with counts `a` and `b`, the number of trapezoids using points from these lines is `C(a, 2) * C(b, 2)`.
4. **Efficient computation** - To avoid O(n²) pairwise comparisons, we use a suffix sum approach to compute the sum of `C(count_i, 2) * C(count_j, 2)` for all pairs `i < j` in O(n) time.
5. **Modulo operation** - All calculations are performed modulo 10⁹+7 to handle large numbers.

Let's implement this solution in PHP: **[3623. Count Number of Trapezoids I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003623-count-number-of-trapezoids-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $points
 * @return Integer
 */
function countTrapezoids($points) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countTrapezoids([[1,0],[2,0],[3,0],[2,2],[3,2]]) . "\n";   // Output: 3
echo countTrapezoids([[0,0],[1,0],[0,1],[2,1]]) . "\n";         // Output: 1
?>
```

### Explanation:

- **Horizontal trapezoid definition**: A quadrilateral with at least one pair of horizontal parallel sides. Since two lines are horizontal if and only if they have the same y-coordinate, we need points from at least two different y-levels.
- **Key observation**: Any four points forming a horizontal trapezoid must consist of two pairs of points, where each pair shares the same y-coordinate (forming the two horizontal sides). Thus, we need to select two distinct y-coordinates, and from each select two points.
- **Mathematical formulation**: For each y-coordinate with `count` points, compute `comb = count*(count-1)/2` (ways to choose 2 points). Then, for every pair of distinct y-coordinates with combinations `cᵢ` and `cⱼ`, add `cᵢ * cⱼ` to the total.
- **Efficient calculation**: Instead of nested loops, we compute:
  ```
  total = Σᵢ Σⱼ>ᵢ (cᵢ * cⱼ)
  ```
  This can be computed in O(n) using:
  ```
  suffix_sum = 0
  for i from n-1 down to 0:
      total += cᵢ * suffix_sum
      suffix_sum += cᵢ
  ```
- **Complexity**: O(n) time and O(n) space for grouping points and storing combinations.

### Code Analysis

- **Grouping**: Creates a hash map `yGroups` counting points per y-coordinate.
- **Combination precomputation**: Computes `C(count, 2)` for each y-coordinate with at least 2 points.
- **Suffix sum calculation**: Iterates backwards through the combinations array, multiplying each combination with the sum of all combinations to its right.
- **Modulo handling**: All intermediate results are taken modulo 10⁹+7.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**