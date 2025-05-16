2503\. Maximum Number of Points From Grid Queries

**Difficulty:** Hard

**Topics:** `Array`, `Two Pointers`, `Breadth-First Search`, `Union Find`, `Sorting`, `Heap (Priority Queue)`, `Matrix`

You are given an `m x n` integer matrix `grid` and an array `queries` of size `k`.

Find an array `answer` of size `k` such that for each integer `queries[i]` you start in the top left cell of the matrix and repeat the following process:

- If `queries[i]` is **strictly** greater than the value of the current cell that you are in, then you get one point if it is your first time visiting this cell, and you can move to any **adjacent** cell in all `4` directions: up, down, left, and right.
- Otherwise, you do not get any points, and you end this process.

After the process, `answer[i]` is the **maximum** number of points you can get. **Note** that for each query you are allowed to visit the same cell **multiple** times.

Return _the resulting array `answer`_.

**Example 1:**

![image1](https://assets.leetcode.com/uploads/2025/03/15/image1.png)

- **Input:** grid = [[1,2,3],[2,5,7],[3,5,1]], queries = [5,6,2]
- **Output:** [5,8,1]
- **Explanation:** The diagrams above show which cells we visit to get points for each query.

**Example 2:**

![yetgriddrawio-2](https://assets.leetcode.com/uploads/2022/10/20/yetgriddrawio-2.png)

- **Input:** grid = [[5,2,1],[1,1,2]], queries = [3]
- **Output:** [0]
- **Explanation:** We can not get any points because the value of the top left cell is already greater than or equal to 3.



**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `2 <= m, n <= 1000`
- <code>4 <= m * n <= 10<sup>5</sup></code>
- `k == queries.length`
- <code>1 <= k <= 10<sup>4</sup></code>
- <code>1 <= grid[i][j], queries[i] <= 10<sup>6</sup></code>


**Hint:**
1. The queries are all given to you beforehand so you can answer them in any order you want.
2. Sort the queries knowing their original order to be able to build the answer array.
3. Run a BFS on the graph and answer the queries in increasing order.



**Solution:**

We need to determine the maximum number of points we can collect starting from the top-left cell of a grid for each query. The points are earned by visiting cells with values strictly less than the query value, and movement is allowed in all four directions (up, down, left, right).

### Approach
1. **Dijkstra's Algorithm with Priority Queue**: We use a modified version of Dijkstra's algorithm to compute the minimal maximum value required to reach each cell from the top-left corner. This value represents the smallest maximum value encountered along the path from the start cell to each respective cell.
2. **Sorting and Binary Search**: After computing the minimal maximum values for all cells, we sort these values. For each query, we use binary search to determine how many cells have a minimal maximum value less than the query value, which gives the answer for that query.

Let's implement this solution in PHP: **[2503. Maximum Number of Points From Grid Queries](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002503-maximum-number-of-points-from-grid-queries/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer[] $queries
 * @return Integer[]
 */
function maxPoints($grid, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}
// Example 1
$grid1 = [
    [1, 2, 3],
    [2, 5, 7],
    [3, 5, 1]
];
$queries1 = [5, 6, 2];
print_r(maxPoints($grid1, $queries1)); // Output: [5, 8, 1]

// Example 2
$grid2 = [
    [5, 2, 1],
    [1, 1, 2]
];
$queries2 = [3];
print_r(maxPoints($grid2, $queries2)); // Output: [0]?>
```

### Explanation:

1. **Dijkstra's Algorithm**: We use a priority queue (min-heap) to process cells in order of their value. This ensures that we always expand the cell with the smallest maximum value encountered so far, allowing us to compute the minimal maximum value required to reach each cell.
2. **Binary Search for Queries**: After sorting the minimal maximum values, each query is answered using binary search to efficiently count how many values are less than the query value. This count gives the maximum number of points for that query.

This approach efficiently processes the grid and queries, ensuring optimal performance even for large grids and numerous queries.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**