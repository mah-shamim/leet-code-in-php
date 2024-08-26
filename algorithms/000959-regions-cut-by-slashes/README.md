959\. Regions Cut By Slashes

Medium

**Topics:** `Array`, `Hash Table`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`

An `n x n` grid is composed of `1 x 1` squares where each `1 x 1` square consists of a `'/'`, `'\'`, or blank space `' '`. These characters divide the square into contiguous regions.

Given the grid `grid` represented as a string array, return _the number of regions_.

**Note** that backslash characters are escaped, so a `'\'` is represented as `'\\'`.

**Example 1:**

![1](https://assets.leetcode.com/uploads/2018/12/15/1.png)

- **Input:** grid = [" /","/ "]
- **Output:** 2

**Example 2:**

![2](https://assets.leetcode.com/uploads/2018/12/15/2.png)

- **Input:** grid = [" /","  "]
- **Output:** 1

**Example 3:**

![3](https://assets.leetcode.com/uploads/2018/12/15/4.png)

- **Input:** grid = ["/\\","\\/"]
- **Output:** 5
- **Explanation:** Recall that because \ characters are escaped, "\\/" refers to \/, and "/\\" refers to /\.

**Constraints:**

- `n == grid.length == grid[i].length`
- `1 <= n <= 30`
- `grid[i][j]` is either `'/'`, `'\'`, or `' '`.



**Solution:**


We can represent each `1x1` square as 4 triangles, which allows us to apply a Union-Find (Disjoint Set Union, DSU) algorithm to count the distinct regions.

### Step-by-Step Approach:

1. **Grid Representation**:
   - We treat each `1x1` square as 4 triangles:
      - Top-left triangle
      - Top-right triangle
      - Bottom-left triangle
      - Bottom-right triangle
   - Each of these triangles is represented by an index in the Union-Find structure.

2. **Mapping Characters**:
   - If the square is `' '`, all 4 triangles within it are connected.
   - If the square is `'/'`, the top-left triangle is connected to the bottom-right, and the top-right triangle is connected to the bottom-left.
   - If the square is `'\'`, the top-left triangle is connected to the top-right, and the bottom-left triangle is connected to the bottom-right.

3. **Connecting Adjacent Cells**:
   - We connect the triangles of adjacent cells across the grid's boundaries. This ensures that regions spanning multiple cells are properly connected.

4. **Counting the Regions**:
   - We count the number of unique sets in the Union-Find structure, which corresponds to the number of regions.

Let's implement this solution in PHP: **[959. Regions Cut By Slashes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000959-regions-cut-by-slashes/solution.php)**

```php
<?php
// Test cases
$grid1 = [" /", "/ "];
$grid2 = [" /", "  "];
$grid3 = ["/\\", "\\/"];

echo regionsBySlashes($grid1); // Output: 2
echo regionsBySlashes($grid2); // Output: 1
echo regionsBySlashes($grid3); // Output: 5
?>
```

### Explanation:

- The `UnionFind` class is used to manage the connected components (regions) in the grid.
- For each cell in the grid, we apply the union operation based on the character (`'/'`, `'\'`, or `' '`).
- Finally, the number of unique regions is determined by counting the distinct root parents in the Union-Find structure.

This solution efficiently handles the problem within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


