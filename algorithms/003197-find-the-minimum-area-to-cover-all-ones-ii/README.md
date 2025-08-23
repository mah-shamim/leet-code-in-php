3197\. Find the Minimum Area to Cover All Ones II

**Difficulty:** Hard

**Topics:** `Array`, `Matrix`, `Enumeration`, `Weekly Contest 403`

You are given a 2D **binary** array `grid`. You need to find 3 **non-overlapping** rectangles having **non-zero** areas with horizontal and vertical sides such that all the 1's in `grid` lie inside these rectangles.

Return the **minimum** possible sum of the area of these rectangles.

**Note** that the rectangles are allowed to touch.

**Example 1:**

- **Input:** grid = [[1,0,1],[1,1,1]]
- **Output:** 5
- **Explanation:**

![example0rect21](https://assets.leetcode.com/uploads/2024/05/14/example0rect21.png)

- The 1's at `(0, 0)` and `(1, 0)` are covered by a rectangle of area 2.
- The 1's at `(0, 2)` and `(1, 2)` are covered by a rectangle of area 2.
- The 1 at `(1, 1)` is covered by a rectangle of area 1.


**Example 2:**  

- **Input:** grid = [[1,0,1,0],[0,1,0,1]]
- **Output:** 5
- **Explanation:**

![example1rect2](https://assets.leetcode.com/uploads/2024/05/14/example1rect2.png)

- The 1's at `(0, 0)` and `(0, 2)` are covered by a rectangle of area 3.
- The 1 at `(1, 1)` is covered by a rectangle of area 1.
- The 1 at `(1, 3)` is covered by a rectangle of area 1.


**Constraints:**

- `1 <= grid.length, grid[i].length <= 30`
- `grid[i][j]` is either 0 or 1.
- The input is generated such that there are at least three 1's in `grid`.



**Hint:**
1. Consider covering using 2 rectangles. As the rectangles don’t overlap, one of the rectangles must either be vertically above or horizontally left to the other.
2. To find the minimum area, check all possible vertical and horizontal splits.
3. For 3 rectangles, extend the idea to first covering using one rectangle, and then try splitting leftover ones both horizontally and vertically.


**Similar Questions:**
1. [302. Smallest Rectangle Enclosing Black Pixels](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000302-smallest-rectangle-enclosing-black-pixels)






**Solution:**

We need to find the minimum total area of three non-overlapping rectangles that cover all the 1's in a given binary grid. The rectangles must have horizontal and vertical sides and can touch but not overlap. The solution involves enumerating all possible ways to split the grid into three regions using horizontal and vertical lines, then calculating the sum of the areas of the bounding boxes of the 1's in each region.

### Approach
1. **Precompute Ones**: First, we gather all the coordinates of the 1's in the grid.
2. **Bounding Box Area Calculation**: We define a helper function to compute the area of the bounding box for a set of points. The area is calculated as `(max_row - min_row + 1) * (max_col - min_col + 1)`.
3. **Enumerate Splits**: We consider six different ways to split the grid into three regions:
    - **Two Horizontal Splits**: Split the grid into three horizontal strips.
    - **Two Vertical Splits**: Split the grid into three vertical strips.
    - **Vertical then Horizontal Split**: First split vertically, then split the left part horizontally.
    - **Vertical then Horizontal Split (Right)**: First split vertically, then split the right part horizontally.
    - **Horizontal then Vertical Split**: First split horizontally, then split the top part vertically.
    - **Horizontal then Vertical Split (Bottom)**: First split horizontally, then split the bottom part vertically.
4. **Check Validity**: For each split, we check if all three regions contain at least one 1. If they do, we compute the sum of the areas of their bounding boxes.
5. **Minimum Area**: We keep track of the minimum sum of areas encountered during the enumeration.

Let's implement this solution in PHP: **[3197. Find the Minimum Area to Cover All Ones II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003197-find-the-minimum-area-to-cover-all-ones-ii/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minimumSum($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$grid1 = [[1,0,1],[1,1,1]];
echo minimumSum($grid1) . PHP_EOL; // 5

$grid2 = [[1,0,1,0],[0,1,0,1]];
echo minimumSum($grid2) . PHP_EOL; // 5
?>
```

### Explanation:

1. **Precompute Ones**: We start by collecting all the coordinates of the 1's in the grid into an array.
2. **Area Calculation**: The helper function `$calculateArea` computes the area of the bounding box for a given set of points by finding the minimum and maximum row and column indices.
3. **Splits Enumeration**: We iterate over all possible splits (horizontal and vertical) to partition the grid into three regions. For each split, we check if all regions contain at least one 1. If they do, we compute the sum of the areas of their bounding boxes.
4. **Result**: The minimum sum of areas found during the enumeration is returned as the result.

This approach efficiently explores all possible configurations of three non-overlapping rectangles by leveraging the constraints of the grid size, ensuring optimal performance while guaranteeing the correct solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**