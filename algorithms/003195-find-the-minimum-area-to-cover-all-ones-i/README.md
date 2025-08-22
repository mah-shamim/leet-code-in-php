3195\. Find the Minimum Area to Cover All Ones I

**Difficulty:** Medium

**Topics:** `Array`, `Matrix`, `Weekly Contest 403`

You are given a 2D **binary** array `grid`. Find a rectangle with horizontal and vertical sides with the **smallest** area, such that all the 1's in `grid` lie inside this rectangle.

Return _the **minimum** possible area of the rectangle_.

**Example 1:**

- **Input:** grid = [[0,1,0],[1,0,1]]
- **Output:** 6
- **Explanation:**

![examplerect0](https://assets.leetcode.com/uploads/2024/05/08/examplerect0.png)
The smallest rectangle has a height of 2 and a width of 3, so it has an area of `2 * 3 = 6`.

**Example 2:**

- **Input:** grid = [[1,0],[0,0]]
- **Output:** 1
- **Explanation:**

![examplerect1](https://assets.leetcode.com/uploads/2024/05/08/examplerect1.png)
The smallest rectangle has both height and width 1, so its area is `1 * 1 = 1`.

**Constraints:**

- `1 <= grid.length, grid[i].length <= 1000`
- `grid[i][j]` is either 0 or 1.
- The input is generated such that there is at least one 1 in `grid`.



**Hint:**
1. Find the minimum and maximum coordinates of a cell with a value of 1 in both directions.


**Similar Questions:**
1. [302. Smallest Rectangle Enclosing Black Pixels](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000302-smallest-rectangle-enclosing-black-pixels)






**Solution:**

We need to find the smallest rectangle with sides parallel to the grid that can cover all the 1's in a given binary matrix. The solution involves determining the boundaries of the rectangle by identifying the extreme positions (topmost, bottommost, leftmost, and rightmost) of the 1's in the grid.

### Approach
1. **Initialize Boundaries**: Start by initializing variables to keep track of the minimum and maximum row and column indices where 1's are found. Set the initial minimum row and column to large values (larger than any possible index in the grid) and the maximum row and column to -1.
2. **Traverse the Grid**: Iterate through each cell in the grid. For each cell that contains a 1, update the boundaries:
    - The minimum row index if the current row is smaller than the stored minimum.
    - The maximum row index if the current row is larger than the stored maximum.
    - The minimum column index if the current column is smaller than the stored minimum.
    - The maximum column index if the current column is larger than the stored maximum.
3. **Calculate Area**: After processing all cells, the required rectangle will span from the minimum row to the maximum row and from the minimum column to the maximum column. The area of this rectangle is calculated as `(maxRow - minRow + 1) * (maxCol - minCol + 1)`.

Let's implement this solution in PHP: **[3195. Find the Minimum Area to Cover All Ones I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003195-find-the-minimum-area-to-cover-all-ones-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minimumArea($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$grid1 = array(
    array(0,1,0),
    array(1,0,1)
);
echo minimumArea($grid1) . "\n"; // Output: 6

// Example 2
$grid2 = array(
    array(1,0),
    array(0,0)
);
echo minimumArea($grid2) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Initialization**: The variables `minRow`, `maxRow`, `minCol`, and `maxCol` are initialized to values that will be updated during the traversal of the grid. `minRow` and `minCol` start with values larger than any possible index, while `maxRow` and `maxCol` start with -1.
2. **Grid Traversal**: The code iterates through each cell in the grid. For each cell containing a 1, it checks and updates the boundaries (minimum and maximum row and column indices) to ensure they include the current cell's position.
3. **Area Calculation**: After identifying the boundaries, the height and width of the rectangle are calculated. The height is the difference between the maximum and minimum row indices plus one, and the width is the difference between the maximum and minimum column indices plus one. The product of these values gives the area of the smallest rectangle covering all 1's.

This approach efficiently determines the required rectangle by leveraging simple boundary checks during a single pass through the grid, ensuring optimal performance with a time complexity of O(n*m), where n and m are the dimensions of the grid.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**