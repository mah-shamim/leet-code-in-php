3464\. Maximize the Distance Between Points on a Square

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Math`, `Binary Search`, `Geometry`, `Sorting`, `Weekly Contest 438`

You are given an integer `side`, representing the edge length of a square with corners at `(0, 0)`, `(0, side)`, `(side, 0)`, and `(side, side)` on a Cartesian plane.

You are also given a **positive** integer `k` and a 2D integer array `points`, where `points[i] = [xi, yi]` represents the coordinate of a point lying on the **boundary** of the square.

You need to select `k` elements among `points` such that the **minimum** Manhattan distance between any two points is **maximized**.

Return the `maximum` possible `minimum` Manhattan distance between the selected `k` points.

The Manhattan Distance between two cells `(xᵢ, yᵢ)` and `(xⱼ, yⱼ)` is `|xᵢ - xⱼ| + |yᵢ - yⱼ|`.

**Example 1:**

- **Input:** side = 2, points = [[0,2],[2,0],[2,2],[0,0]], k = 4
- **Output:** 2
- **Explanation:**
   ![4080_example0_revised](https://assets.leetcode.com/uploads/2025/01/28/4080_example0_revised.png)
   Select all four points.

**Example 2:**

- **Input:** side = 2, points = [[0,0],[1,2],[2,0],[2,2],[2,1]], k = 4
- **Output:** 1
- **Explanation:**
   ![4080_example1_revised](https://assets.leetcode.com/uploads/2025/01/28/4080_example1_revised.png)
   Select the points `(0, 0)`, `(2, 0)`, `(2, 2)`, and `(2, 1)`.

**Example 3:**

- **Input:** side = 2, points = [[0,0],[0,1],[0,2],[1,2],[2,0],[2,2],[2,1]], k = 5
- **Output:** 1
- **Explanation:**

![4080_example2_revised](https://assets.leetcode.com/uploads/2025/01/28/4080_example2_revised.png)
Select the points `(0, 0)`, `(0, 1)`, `(0, 2)`, `(1, 2)`, and `(2, 2)`.

**Example 4:**

- **Input:** side = 40, points = [[0,14],[0,40],[32,0],[0,30],[34,40]], k = 4
- **Output:** 26

**Constraints:**

- `1 <= side <= 10⁹`
- `4 <= points.length <= min(4 * side, 15 * 10³)`
- `points[i] == [xi, yi]`
- The input is generated such that:
  - `points[i]` lies on the boundary of the square.
  - All `points[i]` are **unique**.
- `4 <= k <= min(25, points.length)`



**Hint:**
1. Can we use binary search for this problem?
2. Think of the coordinates on a straight line in clockwise order.
3. Binary search on the minimum Manhattan distance `x`.
4. During the binary search, for each coordinate, find the immediate next coordinate with distance >= `x`.
5. Greedily select up to `k` coordinates.



**Similar Questions:**
1. [2557. Maximum Number of Integers to Choose From a Range II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002557-maximum-number-of-integers-to-choose-from-a-range-ii)
2. [3143. Maximum Points Inside the Square](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003143-maximum-points-inside-the-square)






**Solution:**

This problem asks us to select `k` points from a given set of points on the boundary of a square to **maximize the minimum Manhattan distance** between any two selected points.  
We solve it by:

1. **Transforming the problem into a 1D ordering** around the square perimeter.
2. **Binary searching** on the possible minimum distance.
3. **Greedy checking** whether a given distance is feasible with at least `k` points.

### Approach:

- **Binary Search on the answer**  
  - The answer lies between `0` and `side` (max possible Manhattan dist on the boundary).  
  - We binary search for the maximum `d` such that we can pick `k` points with all pairwise distances ≥ `d`.

- **Flatten the square perimeter into a 1D sequence**  
  - Points on the boundary are ordered clockwise starting from the left edge.  
  - This converts perimeter positions into a linear coordinate for easier traversal.

- **Feasibility check for a given `d`**  
  - We greedily try to form the longest sequence of points where consecutive Manhattan distances are at least `d`.  
  - If the longest sequence length ≥ `k`, then `d` is feasible.

- **Greedy sequence building**  
  - We maintain sequences (segments) starting at earlier points, and for each new point, we try to extend the longest possible segment ending at it, ensuring the jump distance meets `d`.

Let's implement this solution in PHP: **[3464. Maximize the Distance Between Points on a Square](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003464-maximize-the-distance-between-points-on-a-square/solution.php)**

```php
<?php
/**
 * @param Integer $side
 * @param Integer[][] $points
 * @param Integer $k
 * @return Integer
 */
function maxDistance(int $side, array $points, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Returns true if we can select k points such that the minimum Manhattan
 * distance between any two consecutive chosen points is at least d.
 *
 * @param array $ordered
 * @param int $k
 * @param int $d
 * @return bool
 */
function isValidDistance(array $ordered, int $k, int $d): bool {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Returns the ordered points on the perimeter of a square of side length side,
 * starting from left, top, right, and bottom boundaries.
 *
 * @param int $side
 * @param array $points
 * @return array
 */
function getOrderedPoints(int $side, array $points): array {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDistance(2, [[0,2],[2,0],[2,2],[0,0]], 4) . "\n";                           // Output: 2
echo maxDistance(2, [[0,0],[1,2],[2,0],[2,2],[2,1]], 4) . "\n";                     // Output: 1
echo maxDistance(2, [[0,0],[0,1],[0,2],[1,2],[2,0],[2,2],[2,1]], 5) . "\n";         // Output: 1
echo maxDistance(40, [[0,14],[0,40],[32,0],[0,30],[34,40]], 4) . "\n";              // Output: 26
?>
```

### Explanation:

1. **Ordering the points**
   - Split points by which side of the square they lie on: left, top, right, bottom.
   - Sort each side appropriately to get clockwise order.
   - Merge them: left (bottom to top), top (left to right), right (top to bottom), bottom (right to left).

2. **Binary search range**
   - `low = 0`, `high = side`.
   - While `low < high`, test `mid = (low + high + 1) / 2`.

3. **Feasibility check for distance `d`**
   - Start with the first point as a sequence of length 1.
   - For each new point `(x, y)`, try to extend all existing sequences where the distance from that sequence’s end to `(x, y)` ≥ `d`.
   - Choose the longest extension.
   - Track the maximum sequence length seen.
   - If at any point we can form length ≥ `k`, return true.

4. **Manhattan distance in 1D**
   - Since points are in order around the perimeter, the Manhattan distance between two points in this 1D flattened representation is simply the smaller of:
      - the direct distance along the perimeter,
      - `side*4 - direct distance` (going the other way around).
   - The implementation uses absolute coordinate differences directly, so it works even if points wrap across the start/end.

5. **Greedy choice**
   - For a candidate `d`, we try to maximize the number of points we can pick with gaps ≥ `d` without skipping too many points.
   - This is like a longest path problem in a DAG where edges exist if distance ≥ `d`.

### Complexity
- **Time Complexity**:
   - Sorting: `O(n log n)` where `n = len(points)`.
   - Binary search: `O(log side)` iterations.
   - Each feasibility check: `O(n²)` in worst case due to linear scan over sequences.
   - Total: `O(n² log side)`.
- **Space Complexity**: _**O(n)**_ for storing ordered points and sequence data.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**