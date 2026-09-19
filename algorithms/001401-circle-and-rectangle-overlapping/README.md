1401\. Circle and Rectangle Overlapping

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `Geometry`, `Biweekly Contest 23`

You are given a circle represented as `(radius, xCenter, yCenter)` and an axis-aligned rectangle represented as `(x1, y1, x2, y2)`, where `(x1, y1)` are the coordinates of the bottom-left corner, and `(x2, y2)` are the coordinates of the top-right corner of the rectangle.

Return _`true` if the circle and rectangle are overlapped otherwise return `false`_. In other words, check if there is any point `(xᵢ, yᵢ)` that belongs to the circle and the rectangle at the same time.

**Example 1:**

![sample_4_1728](https://assets.leetcode.com/uploads/2020/02/20/sample_4_1728.png)

- **Input:** radius = 1, xCenter = 0, yCenter = 0, x1 = 1, y1 = -1, x2 = 3, y2 = 1
- **Output:** true
- **Explanation:** Circle and rectangle share the point (1,0).

**Example 2:**

- **Input:** radius = 1, xCenter = 1, yCenter = 1, x1 = 1, y1 = -3, x2 = 2, y2 = -1
- **Output:** false

**Example 3:**

![sample_2_1728](https://assets.leetcode.com/uploads/2020/02/20/sample_2_1728.png)

- **Input:** radius = 1, xCenter = 0, yCenter = 0, x1 = -1, y1 = 0, x2 = 0, y2 = 1
- **Output:** true

**Example 4:**

- **Input:** radius = 2, xCenter = 0, yCenter = 0, x1 = -1, y1 = -1, x2 = 1, y2 = 1
- **Output:** true

**Example 5:**

- **Input:** radius = 1, xCenter = 10, yCenter = 10, x1 = 0, y1 = 0, x2 = 2, y2 = 2
- **Output:** false

**Example 6:**

- **Input:** radius = 5, xCenter = 0, yCenter = 0, x1 = 3, y1 = 4, x2 = 5, y2 = 5
- **Output:** true

**Example 7:**

- **Input:** radius = 2, xCenter = 0, yCenter = 0, x1 = 2, y1 = -1, x2 = 4, y2 = 1
- **Output:** true

**Example 8:**

- **Input:** radius = 1, xCenter = 0, yCenter = 0, x1 = 2, y1 = 0, x2 = 3, y2 = 1
- **Output:** false

**Constraints:**

- `1 <= radius <= 2000`
- `-10⁴ <= xCenter, yCenter <= 10⁴`
- `-10⁴ <= x1 < x2 <= 10⁴`
- `-10⁴ <= y1 < y2 <= 10⁴`


**Hint:**
1. Locate the closest point of the square to the circle, you can then find the distance from this point to the center of the circle and check if this is less than or equal to the radius.


**Solution:**

We solve the circle-rectangle overlap problem by finding the point on the axis-aligned rectangle closest to the circle’s center. If that closest point is within the circle’s radius, the two shapes overlap. This gives an `O(1)` math/geometry solution.

## Approach

- Clamp the circle center’s x-coordinate to the rectangle’s x-range `[x1, x2]`.
- Clamp the circle center’s y-coordinate to the rectangle’s y-range `[y1, y2]`.
- The resulting point `(closestX, closestY)` is the nearest point on the rectangle to the circle center.
- Compute the squared distance from the circle center to this closest point.
- If the squared distance is less than or equal to `radius²`, return `true`; otherwise return `false`.

Let's implement this solution in PHP: **[1401. Circle and Rectangle Overlapping](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001401-circle-and-rectangle-overlapping/solution.php)**

```php
<?php
/**
 * @param Integer $radius
 * @param Integer $xCenter
 * @param Integer $yCenter
 * @param Integer $x1
 * @param Integer $y1
 * @param Integer $x2
 * @param Integer $y2
 * @return Boolean
 */
function checkOverlap(int $radius, int $xCenter, int $yCenter, int $x1, int $y1, int $x2, int $y2): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo checkOverlap(1, 0, 0, 1, -1, 3, 1) .  "\n";        // Output: true
echo checkOverlap(1, 1, 1, 1, -3, 2, -1) .  "\n";       // Output: false
echo checkOverlap(1, 0, 0, -1, 0, 0, 1) .  "\n";        // Output: true
echo checkOverlap(2, 0, 0, -1, -1, 1, 1) .  "\n";       // Output: true
echo checkOverlap(1, 10, 10, 0, 0, 2, 2) .  "\n";       // Output: false
echo checkOverlap(5, 0, 0, 3, 4, 5, 5) .  "\n";         // Output: true
echo checkOverlap(2, 0, 0, 2, -1, 4, 1) .  "\n";        // Output: true
echo checkOverlap(1, 0, 0, 2, 0, 3, 1) .  "\n";         // Output: false
?>
```

### Explanation:

- If the circle center is inside the rectangle, the clamped point equals the center, so distance is `0`, and the result is `true`.
- If the circle center is outside the rectangle, the closest point lies on an edge or corner of the rectangle.
- Using squared distance avoids floating-point operations and square roots.
- Boundary touching counts as overlap, so the comparison uses `<=`.
- This handles all cases: center inside, circle intersecting an edge, circle intersecting a corner, circle outside, and circle touching exactly.

## Complexity Analysis

- **Time Complexity:** `O(1)` — only a constant number of arithmetic and comparison operations.
- **Space Complexity:** `O(1)` — no extra data structures are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**