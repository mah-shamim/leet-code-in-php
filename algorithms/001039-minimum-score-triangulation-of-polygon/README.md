1039\. Minimum Score Triangulation of Polygon

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Weekly Contest 135`

You have a convex `n`-sided polygon where each vertex has an integer value. You are given an integer array `values` where `values[i]` is the value of the <code>i<sup>th</sup></code> vertex in **clockwise order**.

**Polygon triangulation** is a process where you divide a polygon into a set of triangles and the vertices of each triangle must also be vertices of the original polygon. Note that no other shapes other than triangles are allowed in the division. This process will result in `n - 2` triangles.

You will **triangulate** the polygon. For each triangle, the weight of that triangle is the product of the values at its vertices. The total score of the triangulation is the sum of these weights over all `n - 2` triangles.

Return the _minimum possible score_ that you can achieve with some **triangulation** of the polygon.

**Example 1:**

- **Input:** values = [1,2,3]
- **Output:** 6
- **Explanation:** The polygon is already triangulated, and the score of the only triangle is 6.

**Example 2:**

- **Input:** values = [3,7,4,5]
- **Output:** 144
- **Explanation:** There are two triangulations, with possible scores: 3*7*5 + 4*5*7 = 245, or 3*4*5 + 3*4*7 = 144.
  The minimum score is 144.

**Example 3:**

- **Input:** values = [1,3,1,4,1,5]
- **Output:** 13
- **Explanation:** The minimum score triangulation is 1*1*3 + 1*1*4 + 1*1*5 + 1*1*1 = 13.

**Constraints:**

- `n == values.length`
- `3 <= n <= 50`
- `1 <= values[i] <= 100`



**Hint:**
1. Without loss of generality, there is a triangle that uses adjacent vertices A[0] and A[N-1] (where N = A.length). Depending on your choice K of it, this breaks down the triangulation into two subproblems A[1:K] and A[K+1:N-1].






**Solution:**

We need to find the minimum possible score of triangulating a convex polygon where the score is the sum of the products of the vertices of each triangle in the triangulation. The solution involves using dynamic programming to efficiently compute the minimum score by considering all possible ways to split the polygon into smaller subproblems.

### Approach
1. **Problem Analysis**: The problem requires triangulating a convex polygon such that the sum of the products of the vertices of all triangles is minimized. Each triangulation of an n-sided polygon results in (n-2) triangles.
2. **Dynamic Programming (DP) Setup**: We use a 2D DP array where `dp[i][j]` represents the minimum score for the polygon formed from vertices `i` to `j`. The solution is built by considering all possible triangles that can be formed using vertices `i`, `j`, and an intermediate vertex `k`.
3. **Triangulation Strategy**: For each segment from `i` to `j`, we consider all possible vertices `k` between `i` and `j` to form a triangle `(i, k, j)`. The score for this triangle is `values[i] * values[k] * values[j]`. The total score for the segment `i` to `j` is the sum of the scores from the left segment `(i, k)`, the right segment `(k, j)`, and the current triangle.
4. **Base Case**: When the segment has fewer than three vertices, no triangle can be formed, so the score is zero. For segments with three vertices, the score is simply the product of the three vertices.
5. **Iterative Computation**: We compute the DP array by iterating over all possible segment lengths from 3 to `n`, ensuring that all smaller segments are computed before larger ones.

Let's implement this solution in PHP: **[1039. Minimum Score Triangulation of Polygon](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001039-minimum-score-triangulation-of-polygon/solution.php)**

```php
<?php
/**
 * @param Integer[] $values
 * @return Integer
 */
function minScoreTriangulation($values) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minScoreTriangulation([1,2,3]) . "\n";       // Output: 6
echo minScoreTriangulation([3,7,4,5]) . "\n";     // Output: 144
echo minScoreTriangulation([1,3,1,4,1,5]) . "\n"; // Output: 13
?>
```

### Explanation:

1. **Initialization**: We initialize a 2D DP array `dp` of size `n x n` with zeros, where `n` is the number of vertices in the polygon.
2. **Dynamic Programming Calculation**: We iterate over all possible segment lengths starting from 3 (the smallest triangle) up to `n`. For each segment starting at index `i` and ending at index `j`, we initialize `dp[i][j]` to a large value (indicating an uncomputed state).
3. **Intermediate Vertex Check**: For each segment `(i, j)`, we check all possible intermediate vertices `k` between `i` and `j`. For each `k`, we compute the score of forming a triangle `(i, k, j)` and add the scores of the left and right segments `(i, k)` and `(k, j)`. The minimum score among all possible `k` is stored in `dp[i][j]`.
4. **Result Extraction**: The solution is found in `dp[0][n-1]`, which represents the minimum score for triangulating the entire polygon from the first to the last vertex.

This approach efficiently computes the minimum score by breaking down the problem into smaller subproblems and combining their solutions, leveraging dynamic programming to avoid redundant calculations. The time complexity is O(n³) due to the triple nested loops, which is feasible given the constraint `n <= 50`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**