885\. Spiral Matrix III

Medium

**Topics:** `Array`, `Matrix`, `Simulation`

You start at the cell `(rStart, cStart)` of an `rows x cols` grid facing east. The northwest corner is at the first row and column in the grid, and the southeast corner is at the last row and column.

You will walk in a clockwise spiral shape to visit every position in this grid. Whenever you move outside the grid's boundary, we continue our walk outside the grid (but may return to the grid boundary later.). Eventually, we reach all `rows * cols` spaces of the grid.

Return _an array of coordinates representing the positions of the grid in the order you visited them_.

**Example 1:**

![example_1](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/08/24/example_1.png)

- **Input:** rows = 1, cols = 4, rStart = 0, cStart = 0
- **Output:** [[0,0],[0,1],[0,2],[0,3]]

**Example 2:**

![example_2](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/08/24/example_2.png)

- **Input:** rows = 5, cols = 6, rStart = 1, cStart = 4
- **Output:** [[1,4],[1,5],[2,5],[2,4],[2,3],[1,3],[0,3],[0,4],[0,5],[3,5],[3,4],[3,3],[3,2],[2,2],[1,2],[0,2],[4,5],[4,4],[4,3],[4,2],[4,1],[3,1],[2,1],[1,1],[0,1],[4,0],[3,0],[2,0],[1,0],[0,0]]

**Constraints:**

- `1 <= rows, cols <= 100`
- `0 <= rStart < rows`
- `0 <= cStart < cols`



**Solution:**


To solve this problem, we can follow these steps:

1. **Direction Array**: Use a direction array to facilitate movement in the right order (east → south → west → north). Each direction will have a corresponding change in the row and column indices.
2. **Steps Management**: You need to control how many steps to take in each direction. Initially, you move 1 step east, then 1 step south, 2 steps west, 2 steps north, and so on.
3. **Boundary Check**: Ensure that after every move, you check whether the new position is within the grid boundaries. If it is, add it to the result array.
4. **Stopping Condition**: Stop the loop once you have visited all `rows * cols` positions.

Let's implement this solution in PHP: **[885. Spiral Matrix III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000885-spiral-matrix-iii/solution.php)**

```php
<?php
// Example Usage:
print_r(spiralMatrixIII(1, 4, 0, 0)); // [[0,0],[0,1],[0,2],[0,3]]
print_r(spiralMatrixIII(5, 6, 1, 4)); // [[1,4],[1,5],[2,5],[2,4], ...]
?>
```

### Explanation:

1. **Directions**: The `directions` array holds the change in row and column for moving east, south, west, and north.
2. **Movement**: We start at `(rStart, cStart)` and move according to the directions in the spiral pattern.
3. **Boundary Checking**: Only add the position to `result` if it is within the grid.
4. **Steps Control**: `stepCount` manages how many steps are taken in the current direction before turning. It increases after two turns.
5. **Termination**: The loop continues until all positions in the grid have been visited.

This approach ensures that we visit every cell in the grid in the required spiral order.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
