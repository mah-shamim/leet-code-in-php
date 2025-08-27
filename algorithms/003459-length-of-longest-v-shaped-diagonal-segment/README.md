3459\. Length of Longest V-Shaped Diagonal Segment

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Memoization`, `Matrix`, `Weekly Contest 437`

You are given a 2D integer matrix `grid` of size `n x m`, where each element is either ``0`, `1`, or `2`.

A **V-shaped diagonal segment** is defined as:

- The segment starts with `1`.
- The subsequent elements follow this infinite sequence: `2, 0, 2, 0, ...`.
- The segment:
  - Starts **along** a diagonal direction (top-left to bottom-right, bottom-right to top-left, top-right to bottom-left, or bottom-left to top-right).
  - Continues the **sequence** in the same diagonal direction.
  - Makes **at most one clockwise 90-degree turn** to another diagonal direction while **maintaining** the sequence.
    ![length_of_longest3](https://assets.leetcode.com/uploads/2025/01/11/length_of_longest3.jpg)
    Return _the **length** of the **longest V-shaped diagonal segment**_. If no valid segment _exists_, return 0.

**Example 1:**

- **Input:** grid = [[2,2,1,2,2],[2,0,2,2,0],[2,0,1,1,0],[1,0,2,2,2],[2,0,0,2,2]]
- **Output:** 5
- **Explanation:**

![matrix_1-2](https://assets.leetcode.com/uploads/2024/12/09/matrix_1-2.jpg)
The longest V-shaped diagonal segment has a length of 5 and follows these coordinates: `(0,2) → (1,3) → (2,4)`, takes a **90-degree clockwise turn** at `(2,4)`, and continues as `(3,3) → (4,2)`.

**Example 2:**

- **Input:** grid = [[2,2,2,2,2],[2,0,2,2,0],[2,0,1,1,0],[1,0,2,2,2],[2,0,0,2,2]]
- **Output:** 4
- **Explanation:**

![matrix_2](https://assets.leetcode.com/uploads/2024/12/09/matrix_2.jpg)
The longest V-shaped diagonal segment has a length of 4 and follows these coordinates: `(2,3) → (3,2)`, takes a **90-degree clockwise turn** at `(3,2)`, and continues as `(2,1) → (1,0)`.

**Example 3:**

- **Input:** grid = [[1,2,2,2,2],[2,2,2,2,0],[2,0,0,0,0],[0,0,2,2,2],[2,0,0,2,0]]
- **Output:** 5
- **Explanation:**

![matrix_3](https://assets.leetcode.com/uploads/2024/12/09/matrix_3.jpg)
The longest V-shaped diagonal segment has a length of 5 and follows these coordinates: _(0,0) → (1,1) → (2,2) → (3,3) → (4,4)_.

**Example 4:**

- **Input:** grid = [[1]]
- **Output:** 1

**Constraints:**

- `n == grid.length`
- `m == grid[i].length`
- `1 <= n, m <= 500`
- `grid[i][j]` is either `0`, `1` or `2`.



**Hint:**
1. Use dynamic programming to determine the best point to make a 90-degree rotation in the diagonal path while maintaining the required sequence.
2. Represent dynamic programming states as (row, col, currentDirection, hasMadeTurnYet)`. Track the current position, direction of traversal, and whether a turn has already been made, and take transitions accordingly to find the longest V-shaped diagonal segment.






**Solution:**

We need to find the longest V-shaped diagonal segment in a 2D grid where the segment starts with 1, followed by the sequence 2, 0, 2, 0, etc., and can make at most one clockwise 90-degree turn. The solution involves using dynamic programming to precompute the lengths of valid segments in all four diagonal directions both with and without turns.

### Approach
1. **Direction Definitions**: Define the four diagonal directions as (1,1), (1,-1), (-1,-1), and (-1,1).
2. **Dynamic Programming Arrays**: Initialize two 3D arrays, `dp` and `rev_dp`, of dimensions 4 x n x m. The `dp` array stores the lengths of segments starting from each cell in each direction without any turns. The `rev_dp` array stores the lengths of segments that can continue from each cell in each direction without breaking the sequence.
3. **Compute `dp` Array**: For each direction, compute the segment lengths by checking if the current cell starts a new segment (value 1) or continues a segment from the previous cell in the same direction, ensuring the sequence is maintained.
4. **Compute `rev_dp` Array**: For each direction, compute the segment lengths in reverse order, checking if the next cell in the direction matches the expected value in the sequence.
5. **Find Longest Segment**: Iterate over each cell and direction. Update the answer with the length of segments without turns. For each cell, check if a clockwise turn can be made to the next direction. If the next cell in the turned direction matches the expected value, update the answer with the combined length of the segment before the turn and the segment after the turn.

Let's implement this solution in PHP: **[3459. Length of Longest V-Shaped Diagonal Segment](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003459-length-of-longest-v-shaped-diagonal-segment/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function lenOfVDiagonal($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $v
 * @return int
 */
function nextValue($v) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$grid1 = [[2,2,1,2,2],[2,0,2,2,0],[2,0,1,1,0],[1,0,2,2,2],[2,0,0,2,2]];
echo lenOfVDiagonal($grid1); // Output: 5

$grid2 = [[2,2,2,2,2],[2,0,2,2,0],[2,0,1,1,0],[1,0,2,2,2],[2,0,0,2,2]];
echo lenOfVDiagonal($grid2); // Output: 4

$grid3 = [[1,2,2,2,2],[2,2,2,2,0],[2,0,0,0,0],[0,0,2,2,2],[2,0,0,2,0]];
echo lenOfVDiagonal($grid3); // Output: 5

$grid4 = [[1]];
echo lenOfVDiagonal($grid4); // Output: 1
?>
```

### Explanation:

1. **Initialization**: The code initializes two 3D arrays, `dp` and `rev_dp`, to store segment lengths for each cell and direction.
2. **DP Calculation**: For each direction, the `dp` array is computed by checking if the current cell continues a valid segment from the previous cell in the same direction, maintaining the sequence pattern.
3. **Reverse DP Calculation**: The `rev_dp` array is computed in reverse order for each direction, checking if the next cell in the direction continues the sequence from the current cell.
4. **Answer Calculation**: The code iterates over each cell and direction, updating the answer with the longest segment found without a turn. For each cell, it checks if a clockwise turn can be made, and if so, combines the segment before the turn with the segment after the turn to update the answer.
5. **Helper Function**: The `nextValue` function returns the next expected value in the sequence given the current value.

This approach efficiently computes the longest V-shaped diagonal segment by leveraging dynamic programming to explore all possible segments and turns, ensuring optimal performance even for large grids.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**