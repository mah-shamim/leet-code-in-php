1765\. Map of Highest Peak

**Difficulty:** Medium

**Topics:** `Array`, `Breadth-First Search`, `Matrix`

You are given an integer matrix `isWater` of size `m x n` that represents a map of **land** and **water** cells.

- If `isWater[i][j] == 0`, cell `(i, j)` is a land cell.
- If `isWater[i][j] == 1`, cell `(i, j)` is a water cell.

You must assign each cell a height in a way that follows these rules:

- The height of each cell must be non-negative.
- If the cell is a **water** cell, its height must be `0`.
- Any two adjacent cells must have an absolute height difference of **at most** `1`. A cell is adjacent to another cell if the former is directly north, east, south, or west of the latter (i.e., their sides are touching).

Find an assignment of heights such that the maximum height in the matrix is **maximized**.

Return _an integer matrix `height` of size `m x n` where `height[i][j]` is cell `(i, j)`'s height. If there are multiple solutions, return **any** of them_.

**Example 1:**

![screenshot-2021-01-11-at-82045-am](https://assets.leetcode.com/uploads/2021/01/10/screenshot-2021-01-11-at-82045-am.png)

- **Input:** isWater = [[0,1],[0,0]]
- **Output:** [[1,0],[2,1]]
- **Explanation:** The image shows the assigned heights of each cell.
  The blue cell is the water cell, and the green cells are the land cells.

**Example 2:**

![screenshot-2021-01-11-at-82050-am](https://assets.leetcode.com/uploads/2021/01/10/screenshot-2021-01-11-at-82050-am.png)

- **Input:** isWater = [[0,0,1],[1,0,0],[0,0,0]]
- **Output:** [[1,1,0],[0,1,1],[1,2,2]]
- **Explanation:** A height of 2 is the maximum possible height of any assignment.
  Any height assignment that has a maximum height of 2 while still meeting the rules will also be accepted.

**Example 3:**

- **Input:** isWater = [[1,0,0,0,0,0,1,0,0,1,0,0,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,1,0,0,1,0,1,1,0,0,1,0,1,0,0,0,0,0,0,1,0,0,0,1,1,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,0,1,0,0,1,0,0,0,1,1,0,0,0,1,0,0,1,0,1,1,0,0,0,1,0,1,1,1,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,1,0,0,0,0,1,0,1,0,1,1,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,1,0,0,1,0,0,1,0,1,0,1,0,1,1,0,0,0,0,0,0,0,1,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,1,1,1,0,0,1,0,0,0,0,0,1,0,0,0,0,1,0,0,1,0,0],[1,1,0,0,0,0,0,1,0,0,0,1,0,0,0,1,1,0,0,1,0,0,1,1,0,1,1,0,0,1,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,1,1,0,0,0,1,0,1,0,0,1,1,0,0,0,1,0,0,0,1,1,0,1,0,1,0,0,0,1,0,0,1,1,1,1,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,1,1,0,0,1,0,1,0,0,0,0,1,0,1,0,1,1,0,0,0,1,1,1,1,0,0,0,1,0,1,0,0,0,0,1,1,1,0,1,0,0,0,0,0,1,0,1,0,0,1,0,0,0,0,1,0,1,1,0,0,0,1,1,1,0,0,0,1,1,0,0,1,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,1,1,0,1,0,1,1,0,1,0,0,0,0,0,0,0,0,1,0,0,1,0,1,0,0,0,0,0],[0,0,1,1,0,0,1,0,0,0,0,1,0,0,0,1,0,1,0,1,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,1,0,1,0,0,0,0,1,0,0,0,1,0,0,0,1,1,0,0,1,0,0,1,0,0,1,0,0,0,0,1,0,1,0,0,0,0,1,1,1,1,0,0,1,1,0,0,1,0,0,1,0,0,0,0,0,1,0,1,0,1,0,1,0,1,1,0,0,0,0,0,0,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,0,0,1,0,0,1,0,0,0,0,1,1,1,1,0,0,0,0,0,1,0,0,1,0,0,0,0,0,1,1,0,0,0,1,0,0,0,0,0,1,0,1,1,1,1,1,1,0,1,0,0,0,0,1,0,0,1,0,0,0,0,1,1,0,0,1,0,0,0,0,0,1,0,1,1,0,0,0,0,1,0,1,0,0],...]
- **Output:** [[0,1,2,2,2,1,0,1,1,0,1,1,0,1,2,1,1,2,2,1,1,0,0,1,2,1,1,2,2,1,0,1,1,0,1,0,0,1,1,0,1,0,1,2,2,1,1,1,0,1,1,1,0,0,1,1,1,2,1,0,1,2,3,2,1,1,0,1,1,0,1,2,2,1,2,2,1,0,1,1,0,1,2,1,0,0,1,2,1,0,1,1,0,1,0,0,1,2,1,0,1,0,0,0,1,1,0,1,1,1,0,0,1,0,1,1,1,0,1,1,0,1,1,2,1,0,1,0,1,0,0,1,2,1,2,3,3,2,2,1,0,0,0,1,1,1,0,1,1,0,1,1,0,1,0,1,0,1,0,0,1,2,1,1,2,2,1,0,0,0,1,0,1,1,2,3,2,2,2,2,2,2,3,2,3,3,2,1,0,1,2,1,1,2,1,0,1,0,0,0,1,1,0,1,2,3,2,1,0,1,2,1,1,0,1,1,0,1,2],[0,0,1,1,2,2,1,0,1,1,1,0,1,2,1,0,0,1,1,0,1,1,0,0,1,0,0,1,1,0,0,1,1,1,0,1,1,1,1,0,1,1,2,2,1,0,0,1,1,1,0,1,0,1,1,0,0,1,2,1,0,1,2,1,0,0,1,0,1,0,1,2,1,0,1,1,0,0,0,0,1,2,3,2,1,1,0,1,1,1,1,0,1,0,1,0,0,1,1,0,1,0,1,1,1,1,0,1,0,1,0,0,1,1,1,0,0,0,0,1,1,1,0,1,0,1,2,1,1,0,0,0,1,0,1,2,2,1,1,0,1,0,1,1,0,1,1,1,1,0,1,0,0,1,1,1,0,0,0,1,2,1,0,0,1,1,0,1,0,1,2,1,1,0,1,2,1,1,1,1,1,1,2,1,2,3,3,2,1,0,1,0,0,1,0,1,0,0,1,0,1,2,1,2,3,2,1,1,0,1,1,0,1,0,1,2,1,2,3],[1,1,0,0,1,1,0,1,1,2,1,0,1,1,1,0,1,0,1,0,1,1,0,1,2,1,1,0,1,1,1,1,0,1,1,2,1,0,1,1,2,1,2,2,1,1,0,1,0,1,0,1,1,2,1,0,1,2,1,...]]


**Constraints:**

- `m == isWater.length`
- `n == isWater[i].length`
- `1 <= m, n <= 1000`
- `isWater[i][j]` is `0` or `1`.
- There is at least **one** water cell.


**Hint:**
1. Set each water cell to be 0. The height of each cell is limited by its closest water cell.
2. Perform a multi-source BFS with all the water cells as sources.

Note: This question is the same as [542. 01 Matrix](https://leetcode.com/problems/01-matrix/)



**Solution:**

We can use a breadth-first search (BFS) approach. Here's how we can approach it step-by-step:

### Problem Breakdown:

1. **Water Cells**: The cells with `1` represent water cells, and their height is always `0`.
2. **Land Cells**: The cells with `0` represent land cells, and their height should be assigned such that adjacent land cells have a height difference of at most `1`.

### Approach:

1. **BFS Initialization**:
   - We start by marking all the water cells (cells with value `1`) as the starting points in the BFS and assign their height to `0`.
   - Then we process the neighboring land cells (cells with value `0`) to assign heights.

2. **BFS Traversal**:
   - From each water cell, we expand outwards, increasing the height by `1` for each adjacent land cell, making sure that the height difference between adjacent cells never exceeds `1`.
   - We continue this process until all the cells are visited.

3. **Result**: The result will be a matrix of heights that adheres to the given rules, with the height values maximized.

Let's implement this solution in PHP: **[1765. Map of Highest Peak](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001765-map-of-highest-peak/solution.php)**

```php
<?php
/**
 * @param Integer[][] $isWater
 * @return Integer[][]
 */
function highestPeak($isWater) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$$isWater1 = [[0,1],[0,0]];
$$isWater2 = [[0,0,1],[1,0,0],[0,0,0]];
$$isWater3 = [[1,0,0,0,0,0,1,0,0,1,0,0,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,1,0,0,1,0,1,1,0,0,1,0,1,0,0,0,0,0,0,1,0,0,0,1,1,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,0,1,0,0,1,0,0,0,1,1,0,0,0,1,0,0,1,0,1,1,0,0,0,1,0,1,1,1,0,0,1,0,0,0,1,1,0,1,0,0,0,1,0,0,1,0,0,0,0,1,0,1,0,1,1,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,1,0,0,1,0,0,1,0,1,0,1,0,1,1,0,0,0,0,0,0,0,1,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,1,1,1,0,0,1,0,0,0,0,0,1,0,0,0,0,1,0,0,1,0,0],[1,1,0,0,0,0,0,1,0,0,0,1,0,0,0,1,1,0,0,1,0,0,1,1,0,1,1,0,0,1,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,1,1,0,0,0,1,0,1,0,0,1,1,0,0,0,1,0,0,0,1,1,0,1,0,1,0,0,0,1,0,0,1,1,1,1,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,1,1,0,0,1,0,1,0,0,0,0,1,0,1,0,1,1,0,0,0,1,1,1,1,0,0,0,1,0,1,0,0,0,0,1,1,1,0,1,0,0,0,0,0,1,0,1,0,0,1,0,0,0,0,1,0,1,1,0,0,0,1,1,1,0,0,0,1,1,0,0,1,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,1,1,0,1,0,1,1,0,1,0,0,0,0,0,0,0,0,1,0,0,1,0,1,0,0,0,0,0],[0,0,1,1,0,0,1,0,0,0,0,1,0,0,0,1,0,1,0,1,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,1,0,1,0,0,0,0,1,0,0,0,1,0,0,0,1,1,0,0,1,0,0,1,0,0,1,0,0,0,0,1,0,1,0,0,0,0,1,1,1,1,0,0,1,1,0,0,1,0,0,1,0,0,0,0,0,1,0,1,0,1,0,1,0,1,1,0,0,0,0,0,0,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,0,0,1,0,0,1,0,0,0,0,1,1,1,1,0,0,0,0,0,1,0,0,1,0,0,0,0,0,1,1,0,0,0,1,0,0,0,0,0,1,0,1,1,1,1,1,1,0,1,0,0,0,0,1,0,0,1,0,0,0,0,1,1,0,0,1,0,0,0,0,0,1,0,1,1,0,0,0,0,1,0,1,0,0],...];

echo highestPeak($$isWater1) . "\n"; // Output: [[1,0],[2,1]]
echo highestPeak($$isWater2) . "\n"; // Output: [[1,1,0],[0,1,1],[1,2,2]]
echo highestPeak($$isWater3) . "\n"; // Output: [[0,1,2,2,2,1,0,1,1,0,1,1,0,1,2,1,1,2,2,1,1,0,0,1,2,1,1,2,2,1,0,1,1,0,1,0,0,1,1,0,1,0,1,2,2,1,1,1,0,1,1,1,0,0,1,1,1,2,1,0,1,2,3,2,1,1,0,1,1,0,1,2,2,1,2,2,1,0,1,1,0,1,2,1,0,0,1,2,1,0,1,1,0,1,0,0,1,2,1,0,1,0,0,0,1,1,0,1,1,1,0,0,1,0,1,1,1,0,1,1,0,1,1,2,1,0,1,0,1,0,0,1,2,1,2,3,3,2,2,1,0,0,0,1,1,1,0,1,1,0,1,1,0,1,0,1,0,1,0,0,1,2,1,1,2,2,1,0,0,0,1,0,1,1,2,3,2,2,2,2,2,2,3,2,3,3,2,1,0,1,2,1,1,2,1,0,1,0,0,0,1,1,0,1,2,3,2,1,0,1,2,1,1,0,1,1,0,1,2],[0,0,1,1,2,2,1,0,1,1,1,0,1,2,1,0,0,1,1,0,1,1,0,0,1,0,0,1,1,0,0,1,1,1,0,1,1,1,1,0,1,1,2,2,1,0,0,1,1,1,0,1,0,1,1,0,0,1,2,1,0,1,2,1,0,0,1,0,1,0,1,2,1,0,1,1,0,0,0,0,1,2,3,2,1,1,0,1,1,1,1,0,1,0,1,0,0,1,1,0,1,0,1,1,1,1,0,1,0,1,0,0,1,1,1,0,0,0,0,1,1,1,0,1,0,1,2,1,1,0,0,0,1,0,1,2,2,1,1,0,1,0,1,1,0,1,1,1,1,0,1,0,0,1,1,1,0,0,0,1,2,1,0,0,1,1,0,1,0,1,2,1,1,0,1,2,1,1,1,1,1,1,2,1,2,3,3,2,1,0,1,0,0,1,0,1,0,0,1,0,1,2,1,2,3,2,1,1,0,1,1,0,1,0,1,2,1,2,3],[1,1,0,0,1,1,0,1,1,2,1,0,1,1,1,0,1,0,1,0,1,1,0,1,2,1,1,0,1,1,1,1,0,1,1,2,1,0,1,1,2,1,2,2,1,1,0,1,0,1,0,1,1,2,1,0,1,2,1,...]]
?>
```

### Explanation:

1. **Initialization**:
   - We initialize the `height` matrix with `-1` for all cells. The water cells are immediately set to `0`.
   - The water cells are enqueued to the BFS queue.

2. **BFS**:
   - We process the queue by dequeuing each cell, and for each of its neighboring cells, we check if it is within bounds and unvisited.
   - If it's a valid land cell (unvisited), we assign it a height that is one more than the current cell's height and enqueue it for further processing.

3. **Result**:
   - After BFS completes, the `height` matrix will contain the highest possible heights for each cell, respecting the given constraints.

### Time Complexity:

- **O(m * n)** where `m` is the number of rows and `n` is the number of columns. This is because each cell is processed at most once during the BFS traversal.

This solution ensures that the matrix is filled with the correct heights, and the BFS guarantees the maximum height for each cell while maintaining the height difference constraint between adjacent cells.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**