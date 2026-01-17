3047\. Find the Largest Area of Square Inside Two Rectangles

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Geometry`, `Weekly Contest 386`

There exist `n` rectangles in a 2D plane with edges parallel to the x and y axis. You are given two 2D integer arrays `bottomLeft` and topRight where `bottomLeft[i] = [a_i, b_i]` and `topRight[i] = [c_i, d_i]` represent the **bottom-left** and **top-right** coordinates of the `iᵗʰ` rectangle, respectively.

You need to find the **maximum** area of a **square** that can fit inside the intersecting region of at least two rectangles. Return 0 if such a square does not exist.

**Example 1:**

![example12](https://assets.leetcode.com/uploads/2024/01/05/example12.png)

- **Input:** bottomLeft = [[1,1],[2,2],[3,1]], topRight = [[3,3],[4,4],[6,6]]
- **Output:** 1
- **Explanation:** A square with side length 1 can fit inside either the intersecting region of rectangles 0 and 1 or the intersecting region of rectangles 1 and 2. Hence the maximum area is 1. It can be shown that a square with a greater side length can not fit inside any intersecting region of two rectangles.

**Example 2:**

![diag](https://assets.leetcode.com/uploads/2024/07/15/diag.png)

- **Input:** bottomLeft = [[1,1],[1,3],[1,5]], topRight = [[5,5],[5,7],[5,9]]
- **Output:** 4
- **Explanation:** A square with side length 2 can fit inside either the intersecting region of rectangles 0 and 1 or the intersecting region of rectangles 1 and 2. Hence the maximum area is `2 * 2 = 4`. It can be shown that a square with a greater side length can not fit inside any intersecting region of two rectangles.

**Example 3:**

![rectanglesexample2](https://assets.leetcode.com/uploads/2024/01/04/rectanglesexample2.png)

- **Input:** bottomLeft = [[1,1],[2,2],[1,2]], topRight = [[3,3],[4,4],[3,4]]
- **Output:** 1
- **Explanation:** A square with side length 1 can fit inside the intersecting region of any two rectangles. Also, no larger square can, so the maximum area is 1. Note that the region can be formed by the intersection of more than 2 rectangles.

**Example 4:**

![rectanglesexample3](https://assets.leetcode.com/uploads/2024/01/04/rectanglesexample3.png)

- **Input:** bottomLeft = [[1,1],[3,3],[3,1]], topRight = [[2,2],[4,4],[4,2]]
- **Output:** 0
- **Explanation:** No pair of rectangles intersect, hence, the answer is 0.

**Constraints:**

- `n == bottomLeft.length == topRight.length`
- `2 <= n <= 10³`
- `bottomLeft[i].length == topRight[i].length == 2`
- `1 <= bottomLeft[i][0], bottomLeft[i][1] <= 10⁷`
- `1 <= topRight[i][0], topRight[i][1] <= 10⁷`
- `bottomLeft[i][0] < topRight[i][0]`
- `bottomLeft[i][1] < topRight[i][1]`



**Hint:**
1. Brute Force the intersection area of each pair of rectangles.
2. Two rectangles will not overlap when the bottom left x coordinate of one rectangle is greater than the top right x coordinate of the other rectangle. The same is true for the y coordinate.
3. The intersection area (if any) is also a rectangle. Find its corners.




**Similar Questions:**
1. [223. Rectangle Area](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000223-rectangle-area)






**Solution:**

We need to find the largest square that fits inside the intersection region of at least two rectangles. Let me break down the solution approach and then provide the implementation.

### Approach:

- Iterate through every pair of rectangles (i, j) where i < j
- Calculate their intersection region using:
   - `max(bottomLeft[i][0], bottomLeft[j][0])` for left x
   - `min(topRight[i][0], topRight[j][0])` for right x
   - `max(bottomLeft[i][1], bottomLeft[j][1])` for bottom y
   - `min(topRight[i][1], topRight[j][1])` for top y
- If left < right AND bottom < top, rectangles intersect
- The intersection forms a rectangle; the largest square inside has side length = min(width, height)
- Track the maximum square area across all intersecting pairs
- Return 0 if no intersections found

Let's implement this solution in PHP: **[3047. Find the Largest Area of Square Inside Two Rectangles](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003047-find-the-largest-area-of-square-inside-two-rectangles/solution.php)**

```php
<?php
/**
 * @param Integer[][] $bottomLeft
 * @param Integer[][] $topRight
 * @return Integer
 */
function largestSquareArea(array $bottomLeft, array $topRight): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestSquareArea([[1,1],[2,2],[3,1]], [[3,3],[4,4],[6,6]]) . "\n";            // Output: 1
echo largestSquareArea([[1,1],[1,3],[1,5]], [[5,5],[5,7],[5,9]]) . "\n";            // Output: 4
echo largestSquareArea([[1,1],[2,2],[1,2]], [[3,3],[4,4],[3,4]]) . "\n";            // Output: 1
echo largestSquareArea([[1,1],[3,3],[3,1]], [[2,2],[4,4],[4,2]]) . "\n";            // Output: 0
?>
```

### Explanation:

- **Pairwise Checking**: We check all rectangle pairs because the problem requires intersection of *at least* two rectangles. If more than two rectangles intersect, their common intersection area is contained within each pair's intersection area.
- **Intersection Logic**: Two rectangles intersect if their x-ranges and y-ranges overlap. The intersection region is defined by the overlap of both ranges.
- **Square Constraint**: A square requires equal width and height. The largest square fitting in a rectangle uses the smaller dimension as the side length.
- **Complexity**: O(n²) time, O(1) extra space, which is acceptable for n ≤ 1000.

### Complexity

- **Time Complexity**: O(n²), where n is the number of rectangles
   - We check all pairs of rectangles, which is n*(n-1)/2 pairs
   - For each pair, we perform constant-time operations

- **Space Complexity**: O(1)
   - We only use a constant amount of extra space


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**