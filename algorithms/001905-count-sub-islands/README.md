1905\. Count Sub Islands

**Difficulty:** Medium

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`

You are given two `m x n` binary matrices `grid1` and `grid2` containing only `0`'s (representing water) and `1`'s (representing land). An **island** is a group of `1`'s connected **4-directionally** (horizontal or vertical). Any cells outside of the grid are considered water cells.

An island in `grid2` is considered a **sub-island** if there is an island in `grid1` that contains **all** the cells that make up **this** island in `grid2`.

Return _the **number** of islands in `grid2` that are considered **sub-islands**_.

**Example 1:**

![test1](https://assets.leetcode.com/uploads/2021/06/10/test1.png)

- **Input:** grid1 = [[1,1,1,0,0],[0,1,1,1,1],[0,0,0,0,0],[1,0,0,0,0],[1,1,0,1,1]], grid2 = [[1,1,1,0,0],[0,0,1,1,1],[0,1,0,0,0],[1,0,1,1,0],[0,1,0,1,0]]
- **Output:** 3
- **Explanation:** In the picture above, the grid on the left is grid1 and the grid on the right is grid2.\
  The 1s colored red in grid2 are those considered to be part of a sub-island. There are three sub-islands.

**Example 2:**

![testcasex2](https://assets.leetcode.com/uploads/2021/06/03/testcasex2.png)

- **Input:** grid1 = [[1,0,1,0,1],[1,1,1,1,1],[0,0,0,0,0],[1,1,1,1,1],[1,0,1,0,1]], grid2 = [[0,0,0,0,0],[1,1,1,1,1],[0,1,0,1,0],[0,1,0,1,0],[1,0,0,0,1]]
- **Output:** 2
- **Explanation:** In the picture above, the grid on the left is grid1 and the grid on the right is grid2.\
  The 1s colored red in grid2 are those considered to be part of a sub-island. There are two sub-islands.



**Constraints:**

- `m == grid1.length == grid2.length`
- `n == grid1[i].length == grid2[i].length`
- `1 <= m, n <= 500`
- `grid1[i][j]` and `grid2[i][j]` are either `0` or `1`.

**Hint:**
1. Let's use floodfill to iterate over the islands of the second grid
2. Let's note that if all the cells in an island in the second grid if they are represented by land in the first grid then they are connected hence making that island a sub-island



**Solution:**

We'll use the Depth-First Search (DFS) approach to explore the islands in `grid2` and check if each island is entirely contained within a corresponding island in `grid1`. Here's how we can implement the solution:

### Steps:
1. **Traverse the Grid:** We'll iterate through each cell in `grid2`.
2. **Identify Islands in `grid2`:** When we encounter a land cell (`1`) in `grid2`, we'll use DFS to explore the entire island.
3. **Check Sub-Island Condition:** While performing DFS on an island in `grid2`, we'll check if all the corresponding cells in `grid1` are also land cells. If they are, the island is a sub-island.
4. **Count Sub-Islands:** For each island in `grid2` that meets the sub-island condition, we'll increment our sub-island count.


Let's implement this solution in PHP: **[1905. Count Sub Islands](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001905-count-sub-islands/solution.php)**

```php
<?php
/**
 * @param $grid1
 * @param $grid2
 * @return int
 */
function countSubIslands($grid1, $grid2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $grid1
 * @param $grid2
 * @param $i
 * @param $j
 * @param $m
 * @param $n
 * @return int|true
 */
function dfs(&$grid1, &$grid2, $i, $j, $m, $n) {
    if ($i < 0 || $j < 0 || $i >= $m || $j >= $n || $grid2[$i][$j] == 0) {
        return true;
    }

    $grid2[$i][$j] = 0; // Mark the cell as visited in grid2
    $isSubIsland = $grid1[$i][$j] == 1; // Check if it's a sub-island

    // Explore all 4 directions
    $isSubIsland &= dfs($grid1, $grid2, $i + 1, $j, $m, $n);
    $isSubIsland &= dfs($grid1, $grid2, $i - 1, $j, $m, $n);
    $isSubIsland &= dfs($grid1, $grid2, $i, $j + 1, $m, $n);
    $isSubIsland &= dfs($grid1, $grid2, $i, $j - 1, $m, $n);

    return $isSubIsland;
}

// Example usage:

// Example 1
$grid1 = [
    [1,1,1,0,0],
    [0,1,1,1,1],
    [0,0,0,0,0],
    [1,0,0,0,0],
    [1,1,0,1,1]
];

$grid2 = [
    [1,1,1,0,0],
    [0,0,1,1,1],
    [0,1,0,0,0],
    [1,0,1,1,0],
    [0,1,0,1,0]
];

echo countSubIslands($grid1, $grid2); // Output: 3

// Example 2
$grid1 = [
    [1,0,1,0,1],
    [1,1,1,1,1],
    [0,0,0,0,0],
    [1,1,1,1,1],
    [1,0,1,0,1]
];

$grid2 = [
    [0,0,0,0,0],
    [1,1,1,1,1],
    [0,1,0,1,0],
    [0,1,0,1,0],
    [1,0,0,0,1]
];

echo countSubIslands($grid1, $grid2); // Output: 2
?>
```

### Explanation:

- **DFS Function:** The `dfs` function explores the island in `grid2` and checks if the corresponding cells in `grid1` are all land cells. If any cell in `grid2` is land but the corresponding cell in `grid1` is water, the island in `grid2` is not a sub-island.
- **Mark Visited:** As we traverse `grid2`, we mark cells as visited by setting them to `0`.
- **Main Loop:** We iterate through all cells in `grid2`. Whenever we find a land cell that hasn't been visited, we initiate a DFS to check if it's part of a sub-island.

### Time Complexity:
The time complexity is \(O(m \times n)\) where `m` is the number of rows and `n` is the number of columns. This is because we potentially visit every cell once.

This solution should work efficiently within the given constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
