3625\. Count Number of Trapezoids II

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Math`, `Geometry`, `Weekly Contest 459`

You are given a 2D integer array `points` where `points[i] = [xᵢ, yᵢ]` represents the coordinates of the `iᵗʰ` point on the Cartesian plane.

Return _the number of unique trapezoids_ that can be formed by choosing any four distinct points from `points`.

A **trapezoid** is a convex quadrilateral with **at least one pair** of parallel sides. Two lines are parallel if and only if they have the same slope.

**Example 1:**

- **Input:** points = [[-3,2],[3,0],[2,3],[3,2],[2,-3]]
- **Output:** 2
- **Explanation:**
   ![desmos-graph-3](https://assets.leetcode.com/uploads/2025/04/29/desmos-graph-3.png)
   - There are two distinct ways to pick four points that form a trapezoid:
      - The points `[-3,2], [2,3], [3,2], [2,-3]` form one trapezoid.
      - The points `[2,3], [3,2], [3,0], [2,-3]` form another trapezoid.


**Example 2:**

- **Input:** points = [[0,0],[1,0],[0,1],[2,1]]
- **Output:** 1
- **Explanation:**
   ![desmos-graph-5](https://assets.leetcode.com/uploads/2025/04/29/desmos-graph-5.png)
   - There is only one trapezoid which can be formed.


**Example 3:**

- **Input:** points = [[82,7],[82,-9],[82,-52],[82,78]]
- **Output:** 0


**Example 4:**

- **Input:** points = [[83,-25],[74,11],[-65,-25],[33,-25],[17,-25],[1,30],[-84,-25],[1,-25],[1,-92],[-87,13]]
- **Output:** 0

**Constraints:**

- `4 <= points.length <= 500`
- `–1000 <= xᵢ, yᵢ <= 1000`
- All points are pairwise distinct.



**Hint:**
1. Hash every point-pair by its reduced slope `(dy,dx)` (normalize with GCD and fix signs).
2. In each slope-bucket of size `k`, there are `C(k,2)` ways to pick two segments as the trapezoid's parallel bases.
3. Skip any base-pair that shares an endpoint since it would not form a quadrilateral.
4. Subtract one count for each parallelogram. Each parallelogram was counted once for each of its two parallel-side pairs, so after subtracting once, every quadrilateral with at least one pair of parallel sides, including parallelograms, contributes exactly one to the final total.
5. Final answer = total valid base-pairs minus parallelogram overcounts.






**Solution:**

We need to count trapezoids (quadrilaterals with at least one pair of parallel sides) from given points.

### Approach:

* Precompute all **point pairs (i, j)** → each pair defines a segment.
* For each pair:

   * Compute the **normalized slope** `(dy, dx)`; vertical lines treated separately.
   * Compute the **normalized line equation** `(A, B, C)` as the signature of that infinite line.
   * Compute the **midpoint signature** `(x₁ + x₂, y₁ + y₂)` without division (for parallelogram detection).
* Maintain:

   * `cnt1[slope][lineSignature]`
     → counts how many segments lie on the same infinite line with same slope
     → used to count pairs of *parallel* but *non-collinear* segments (candidate trapezoid bases).
   * `cnt2[midpointSignature][slope]`
     → counts segments sharing the same midpoint and slope
     → used to detect **parallelograms** (because diagonals of a parallelogram have same midpoint).
* Total trapezoid base pairs:

   * For each slope group:

      * If a slope has line-counts `[c₁, c₂, ..., cₖ]`, add
        `c₁*c₂ + c₁*c₃ + ... + c₁*cₖ + c₂*c₃ + ...`
      * This counts every way to pick **two segments on different parallel lines**.
* Remove parallelogram overcounts:

   * For each midpoint group and slope group:

      * If counts are `[c₁, c₂, ...]`, subtract pair combinations
        `c₁*c₂ + c₁*c₃ + ...`
      * Because parallelograms are counted **twice**, once per slope direction.
* Final result =
  `Total parallel-segment pairs  – parallelogram overcounts`
* Return the computed trapezoid count.

Let's implement this solution in PHP: **[3625. Count Number of Trapezoids II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003625-count-number-of-trapezoids-ii/solution.php)**

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

// gcd
function gcd(int $a, int $b): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countTrapezoids([[-3,2],[3,0],[2,3],[3,2],[2,-3]]) . "\n";                                                             // Output: 2
echo countTrapezoids([[0,0],[1,0],[0,1],[2,1]]) . "\n";                                                                     // Output: 1
echo countTrapezoids([[82,7],[82,-9],[82,-52],[82,78]]) . "\n";                                                             // Output: 0
echo countTrapezoids([[83,-25],[74,11],[-65,-25],[33,-25],[17,-25],[1,30],[-84,-25],[1,-25],[1,-92],[-87,13]]) . "\n";      // Output: 0
?>
```

### Explanation:

* A trapezoid is any convex quadrilateral with **at least one pair of parallel sides**.
* Two segments can serve as parallel bases of a trapezoid **only if**:

   * They have equal slope.
   * They lie on **different** lines (not collinear).
   * They share **no endpoints**.
* The slope & line normal form `(A, B, C)` uniquely identify such conditions.
* Counting two segments in different collinear buckets ensures endpoints are distinct and segments are on different parallel lines.
* Using combinations `sum += previousCount * currentCount` efficiently counts all unordered segment pairs.
* Parallelograms:

   * A parallelogram will be counted **once for each slope direction** (because it has two pairs of parallel sides).
   * Diagonals of a parallelogram always share the same midpoint → we use this to detect them.
   * Subtracting combinations from midpoint groups removes the extra count.
* The midpoint method is guaranteed correct because:

   * Only diagonals share midpoints, and diagonals correspond to segment pairs in `cnt2`.
* Normalizing slope and line equations ensures:

   * No floating-point errors.
   * All equivalent slopes/lines map to exactly one hash key.
* Time complexity:

   * O(n²) to process all point pairs.
   * Works for n ≤ 500 (≈125k pairs) easily.
* The final value represents **all unique quadrilaterals** having at least one pair of parallel sides → exactly the definition of a trapezoid.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**