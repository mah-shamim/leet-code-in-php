2017\. Grid Game

**Difficulty:** Medium

**Topics:** `Array`, `Matrix`, `Prefix Sum`

You are given a **0-indexed** 2D array `grid` of size `2 x n`, where `grid[r][c]` represents the number of points at position `(r, c)` on the matrix. Two robots are playing a game on this matrix.

Both robots initially start at `(0, 0)` and want to reach `(1, n-1)`. Each robot may only move to the right (`(r, c)` to `(r, c + 1)`) or **down** (`(r, c)` to `(r + 1, c)`).

At the start of the game, the **first** robot moves from `(0, 0)` to `(1, n-1)`, collecting all the points from the cells on its path. For all cells `(r, c)` traversed on the path, `grid[r][c]` is set to `0`. Then, the **second** robot moves from `(0, 0)` to `(1, n-1)`, collecting the points on its path. Note that their paths may intersect with one another.

The **first** robot wants to **minimize** the number of points collected by the **second** robot. In contrast, the **second** robot wants to **maximize** the number of points it collects. If both robots play **optimally**, return _the **number of points** collected by the **second** robot_.

**Example 1:**

![a1](https://assets.leetcode.com/uploads/2021/09/08/a1.png)

- **Input:** grid = [[2,5,4],[1,5,1]]
- **Output:** 4
- **Explanation:** The optimal path taken by the first robot is shown in red, and the optimal path taken by the second robot is shown in blue.
  The cells visited by the first robot are set to 0.
  The second robot will collect 0 + 0 + 4 + 0 = 4 points.

**Example 2:**

![a2](https://assets.leetcode.com/uploads/2021/09/08/a2.png)

- **Input:** grid = [[3,3,1],[8,5,2]]
- **Output:** 4
- **Explanation:** The optimal path taken by the first robot is shown in red, and the optimal path taken by the second robot is shown in blue.
  The cells visited by the first robot are set to 0.
  The second robot will collect 0 + 3 + 1 + 0 = 4 points.


**Example 3:**

![a3](https://assets.leetcode.com/uploads/2021/09/08/a3.png)

- **Input:** grid = [[1,3,1,15],[1,3,3,1]]
- **Output:** 7
- **Explanation:** The optimal path taken by the first robot is shown in red, and the optimal path taken by the second robot is shown in blue.
  The cells visited by the first robot are set to 0.
  The second robot will collect 0 + 1 + 3 + 3 + 0 = 7 points.



**Constraints:**

- `grid.length == 2`
- `n == grid[r].length`
- <code>1 <= n <= 5 * 10<sup>4</sup></code>
- <code>1 <= grid[r][c] <= 10<sup>5</sup></code>


**Hint:**
1. There are `n` choices for when the `first` robot moves to the `second` row.
2. Can we use `prefix` sums to help solve this problem?



**Solution:**

We'll use the following approach:

1. **Prefix Sum Calculation**: We'll compute the prefix sums for both rows of the grid to efficiently calculate the sum of points for any subarray.

2. **Simulating Optimal Movement**:
   - The first robot determines its path to minimize the points left for the second robot.
   - At each column transition, the first robot can choose to move down, splitting the grid into two segments:
      - **Upper remaining points**: Points in the top row after the transition column.
      - **Lower remaining points**: Points in the bottom row before the transition column.

3. **Minimizing the Maximum Points for the Second Robot**:
   - At each transition, calculate the maximum points the second robot can collect after the first robot's path.
   - Track the minimum of these maximums across all transitions.

Let's implement this solution in PHP: **[2017. Grid Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002017-grid-game/solution.php)**

```php
<?php
function gridGame($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$grid1 = [[2, 5, 4], [1, 5, 1]];
$grid2 = [[3, 3, 1], [8, 5, 2]];
$grid3 = [[1, 3, 1, 15], [1, 3, 3, 1]];

echo gridGame($grid1) . "\n"; // Output: 4
echo gridGame($grid2) . "\n"; // Output: 4
echo gridGame($grid3) . "\n"; // Output: 7
?>
```

### Explanation:

1. **Prefix Sum Calculation**:
   - `prefixTop` and `prefixBottom` store cumulative sums for the top and bottom rows, respectively.
   - These allow efficient range sum calculations.

2. **Simulating the First Robot's Path**:
   - At each column `i`, the first robot can decide to move down after column `i`.
   - This splits the grid into two regions:
      - Top row after column `i` (collected points: `prefixTop[n] - prefixTop[i + 1]`).
      - Bottom row before column `i` (collected points: `prefixBottom[i]`).

3. **Second Robot's Optimal Points**:
   - The second robot will take the maximum of the two remaining regions.
   - We track the minimum of these maximums for all possible transitions.

4. **Complexity**:
   - **Time Complexity**: _**O(n)**_, as we compute prefix sums and loop through the grid once.
   - **Space Complexity**: _**O(n)**_, due to prefix sum arrays.

### Example Walkthrough
#### Input: `grid = [[2, 5, 4], [1, 5, 1]]`
- **Prefix Sums**:
   - `prefixTop = [0, 2, 7, 11]`
   - `prefixBottom = [0, 1, 6, 7]`
- **Transition Points**:
   - _**i = 0**_: Top Remaining = _**11 - 7 = 9**_, Bottom Remaining = _**0**_ → Second Robot = _**9**_.
   - _**i = 1**_: Top Remaining = _**11 - 11 = 4**_, Bottom Remaining = _**1**_ → Second Robot = _**4**_.
   - _**i = 2**_: Top Remaining = _**0**_, Bottom Remaining = _**6**_ → Second Robot = _**6**_.
- **Minimum Points for Second Robot**: _**min(9, 4, 6) = 4**_.

This matches the expected output.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**