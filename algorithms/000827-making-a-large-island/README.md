827\. Making A Large Island

**Difficulty:** Hard

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`

You are given an `n x n` binary matrix `grid`. You are allowed to change **at most one** `0` to be `1`.

Return _the size of the largest **island** in `grid` after applying this operation_.

An **island** is a 4-directionally connected group of `1`s.

**Example 1:**

- **Input:** grid = [[1,0],[0,1]]
- **Output:** 3
- **Explanation:** Change one 0 to 1 and connect two 1s, then we get an island with area = 3.

**Example 2:**

- **Input:** grid = [[1,1],[1,0]]
- **Output:** 4
- **Explanation:** Change the 0 to 1 and make the island bigger, only one island with area = 4.


**Example 3:**

- **Input:** grid = [[1,1],[1,1]]
- **Output:** 4
- **Explanation:** Can't change any 0 to 1, only one island with area = 4.



**Constraints:**

- `n == grid.length`
- `n == grid[i].length`
- `1 <= n <= 500`
- `grid[i][j]` is either `0` or `1`.



**Solution:**

To solve the problem of making a large island by changing at most one `0` to `1` in a binary matrix, we can follow these steps:

1. **Identify Islands**: First, we need to identify all the existing islands in the grid and assign a unique identifier to each island. We can use Depth-First Search (DFS) or Breadth-First Search (BFS) to traverse the grid and mark each cell of an island with a unique ID.

2. **Calculate Island Sizes**: As we identify each island, we calculate its size and store it in a dictionary or array where the key is the island ID and the value is the size of the island.

3. **Find the Best 0 to Flip**: For each `0` in the grid, we check its neighboring cells to see if they belong to different islands. If they do, we calculate the potential size of the new island that would be formed by flipping this `0` to `1`. We keep track of the maximum size found.

4. **Return the Result**: Finally, we return the maximum size found. If there are no `0`s in the grid, we return the size of the largest island.

Let's implement this solution in PHP: **[827. Making A Large Island](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000827-making-a-large-island/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function largestIsland($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to perform DFS and calculate component size
 *
 * @param $grid
 * @param $i
 * @param $j
 * @param $islandId
 * @param $size
 * @return void
 */
function dfs(&$grid, $i, $j, $islandId, &$size) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$grid1 = [[1, 0], [0, 1]];
$grid2 = [[1, 1], [1, 0]];
$grid3 = [[1, 1], [1, 1]];

echo largestIsland($grid1) . "\n"; // Output: 3
echo largestIsland($grid2) . "\n"; // Output: 4
echo largestIsland($grid3) . "\n"; // Output: 4
?>
```

### Explanation:

1. **DFS Traversal**:  
   A DFS is used to traverse each island (group of connected `1`s) and assign it a unique ID starting from `2`. The size of the island is recorded in the `componentSize` array.

2. **Flipping a `0`**:  
   For every cell with a `0`, the code checks its neighbors and calculates the potential size of the island formed if the `0` were flipped to `1`. It ensures that each neighboring island is only counted once using a `uniqueComponents` array.

3. **Max Island Size**:  
   The maximum size is updated as we calculate the sizes for all possible flips of `0`.

4. **Edge Cases**:
   - If the grid is entirely `1`s, the maximum island size is the total grid size.
   - If there's only one island, flipping a `0` connects the largest number of `1`s.

This solution efficiently handles the problem constraints and provides the correct result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**