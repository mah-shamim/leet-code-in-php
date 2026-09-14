836\. Rectangle Overlap

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Geometry`, `Weekly Contest 85`

An axis-aligned rectangle is represented as a list `[x1, y1, x2, y2]`, where `(x1, y1)` is the coordinate of its bottom-left corner, and `(x2, y2)` is the coordinate of its top-right corner. Its top and bottom edges are parallel to the X-axis, and its left and right edges are parallel to the Y-axis.

Two rectangles overlap if the area of their intersection is **positive**. To be clear, two rectangles that only touch at the corner or edges do not overlap.

Given two axis-aligned rectangles `rec1` and `rec2`, return _`true` if they overlap, otherwise return `false`_.

**Example 1:**

- **Input:** rec1 = [0,0,2,2], rec2 = [1,1,3,3]
- **Output:** true

**Example 2:**

- **Input:** rec1 = [0,0,1,1], rec2 = [1,0,2,1]
- **Output:** false

**Example 3:**

- **Input:** rec1 = [0,0,1,1], rec2 = [2,2,3,3]
- **Output:** false

**Example 4:**

- **Input:** rec1 = [0,0,1,1], rec2 = [0,0,1,1]
- **Output:** true

**Example 5:**

- **Input:** rec1 = [0,0,2,2], rec2 = [1,1,1,1]
- **Output:** false

**Example 6:**

- **Input:** rec1 = [-5,-5,0,0], rec2 = [-3,-3,2,2]
- **Output:** true

**Example 7:**

- **Input:** rec1 = [0,0,3,3], rec2 = [3,3,5,5]
- **Output:** false

**Example 8:**

- **Input:** rec1 = [0,0,5,5], rec2 = [1,1,2,2]
- **Output:** true

**Example 9:**

- **Input:** rec1 = [0,0,1,2], rec2 = [1,1,2,2]
- **Output:** false

**Example 10:**

- **Input:** rec1 = [-2,-2,-1,-1], rec2 = [-1,-1,0,0]
- **Output:** false

**Constraints:**

- `rec1.length == 4`
- `rec2.length == 4`
- `-10⁹ <= rec1[i], rec2[i] <= 10⁹`
- `rec1` and `rec2` represent a valid rectangle with a non-zero area.


**Similar Questions:**
1. [223. Rectangle Area](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000223-rectangle-area)


**Solution:**

We determine whether two axis-aligned rectangles overlap by checking if their projections onto both the x-axis and y-axis overlap with positive length. If both projections overlap, the rectangles intersect with positive area; otherwise, they do not overlap.

## Approach

- **Check X-axis overlap:** Compute the intersection of the horizontal ranges `[x1, x2]` of both rectangles. The overlap length is positive only when `max(rec1[0], rec2[0]) < min(rec1[2], rec2[2])`.
- **Check Y-axis overlap:** Compute the intersection of the vertical ranges `[y1, y2]` of both rectangles. The overlap length is positive only when `max(rec1[1], rec2[1]) < min(rec1[3], rec2[3])`.
- **Combine results:** Rectangles overlap if and only if both the x-axis and y-axis overlaps are positive. Return `true` when both conditions hold, otherwise `false`.
- **Strict inequality:** Use `<` instead of `<=` so that rectangles touching only at edges or corners are not considered overlapping (intersection area must be positive).

Let's implement this solution in PHP: **[836. Rectangle Overlap](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000836-rectangle-overlap/solution.php)**

```php
<?php
/**
 * @param Integer[] $rec1
 * @param Integer[] $rec2
 * @return Boolean
 */
function isRectangleOverlap(array $rec1, array $rec2): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo isRectangleOverlap([0, 0, 2, 2], [1, 1, 3, 3]) ? "true" : "false";             // Output: true
echo isRectangleOverlap([0, 0, 1, 1], [1, 0, 2, 1]) ? "true" : "false";             // Output: false
echo isRectangleOverlap([0, 0, 1, 1], [2, 2, 3, 3]) ? "true" : "false";             // Output: false
echo isRectangleOverlap([0, 0, 1, 1], [0, 0, 1, 1]) ? "true" : "false";             // Output: true
echo isRectangleOverlap([0, 0, 2, 2], [1, 1, 1, 1]) ? "true" : "false";             // Output: false
echo isRectangleOverlap([-5, -5, 0, 0], [-3, -3, 2, 2]) ? "true" : "false";         // Output: true
echo isRectangleOverlap([0, 0, 3, 3], [3, 3, 5, 5]) ? "true" : "false";             // Output: false
echo isRectangleOverlap([0, 0, 5, 5], [1, 1, 2, 2]) ? "true" : "false";             // Output: true
echo isRectangleOverlap([0, 0, 1, 2], [1, 1, 2, 2]) ? "true" : "false";             // Output: false
echo isRectangleOverlap([-2, -2, -1, -1], [-1, -1, 0, 0]) ? "true" : "false";       // Output: false
?>
```

### Explanation:

- Each rectangle is defined by its bottom-left `(x1, y1)` and top-right `(x2, y2)` corners.
- Projecting a rectangle onto the x-axis gives the interval `[x1, x2]`; projecting onto the y-axis gives `[y1, y2]`.
- Two intervals overlap with positive length when the larger of the two lower bounds is strictly less than the smaller of the two upper bounds.
- Applying this logic independently to both axes and combining with logical AND gives the correct overlap condition.
- This avoids computing the actual intersection area and works in constant time.

## Complexity Analysis

- **Time Complexity:** `O(1)` — only a fixed number of comparisons and arithmetic operations are performed.
- **Space Complexity:** `O(1)` — no extra data structures are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**