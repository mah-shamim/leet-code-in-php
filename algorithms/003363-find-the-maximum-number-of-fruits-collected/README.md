3363\. Find the Maximum Number of Fruits Collected

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Matrix`, `Biweekly Contest 144`

There is a game dungeon comprised of `n x n` rooms arranged in a grid.

You are given a 2D array `fruits` of size `n x n`, where `fruits[i][j]` represents the number of fruits in the room `(i, j)`. Three children will play in the game dungeon, with **initial** positions at the corner rooms `(0, 0)`, `(0, n - 1)`, and `(n - 1, 0)`.

The children will make **exactly** `n - 1` moves according to the following rules to reach the room `(n - 1, n - 1)`:

- The child starting from `(0, 0)` must move from their current room `(i, j)` to one of the rooms `(i + 1, j + 1)`, `(i + 1, j)`, and `(i, j + 1)` if the target room exists.
- The child starting from `(0, n - 1)` must move from their current room `(i, j)` to one of the rooms `(i + 1, j - 1)`, `(i + 1, j)`, and `(i + 1, j + 1)` if the target room exists.
- The child starting from `(n - 1, 0)` must move from their current room `(i, j)` to one of the rooms `(i - 1, j + 1)`, `(i, j + 1)`, and `(i + 1, j + 1)` if the target room exists.

When a child enters a room, they will collect all the fruits there. If two or more children enter the same room, only one child will collect the fruits, and the room will be emptied after they leave.

Return _the **maximum** number of fruits the children can collect from the dungeon_.

**Example 1:**

- **Input:** fruits = [[1,2,3,4],[5,6,8,7],[9,10,11,12],[13,14,15,16]]
- **Output:** 100
- **Explanation:**
  ![example_1](https://assets.leetcode.com/uploads/2024/10/15/example_1.gif)
    In this example:
    - The 1<sup>st</sup> child (green) moves on the path `(0,0) -> (1,1) -> (2,2) -> (3, 3)`.
    - The 2<sup>nd</sup> child (red) moves on the path `(0,3) -> (1,2) -> (2,3) -> (3, 3)`.
    - The 3<sup>rd</sup> child (blue) moves on the path `(3,0) -> (3,1) -> (3,2) -> (3, 3)`.

In total they collect `1 + 6 + 11 + 16 + 4 + 8 + 12 + 13 + 14 + 15 = 100` fruits.

**Example 2:**

- **Input:** fruits = [[1,1],[1,1]]
- **Output:** 0
- **Explanation:** In this example:
    - The 1<sup>st</sup> child moves on the path `(0,0) -> (1,1)`.
    - The 2<sup>nd</sup> child moves on the path `(0,1) -> (1,1)`.
    - The 3<sup>rd</sup> child moves on the path `(1,0) -> (1,1)`.
In total they collect `1 + 1 + 1 + 1 = 4` fruits.

**Constraints:**

- `2 <= n == fruits.length == fruits[i].length <= 1000`
- `0 <= fruits[i][j] <= 1000`


**Hint:**
1. The child at `(0, 0)` has only one possible path.
2. The other two children won’t intersect its path.
3. Use Dynamic Programming.






**Solution:**

We need to maximize the number of fruits collected by three children moving through an `n x n` grid of rooms. Each child starts at a different corner of the grid and moves towards the bottom-right corner `(n-1, n-1)` in exactly `n-1` moves, following specific movement rules. The challenge is to compute the maximum total fruits collected, considering that if multiple children visit the same room, the fruits in that room are counted only once.

### Approach
1. **Problem Analysis**:
    - **Child 1 (starts at (0,0))**: Must move diagonally (to (i+1, j+1)) each time to reach (n-1, n-1) in exactly `n-1` moves. Thus, Child 1's path is fixed: `(0,0) → (1,1) → ... → (n-1, n-1)`. The fruits collected along this diagonal are summed separately.
    - **Child 2 (starts at (0, n-1))**: Moves down, down-left, or down-right. At each step `k`, Child 2 is at row `k` and some column `jB`.
    - **Child 3 (starts at (n-1, 0))**: Moves right, up-right, or down-right. At each step `k`, Child 3 is at column `k` and some row `iC`.
    - **Fruits Calculation**: The total fruits collected include all fruits on the diagonal (collected by Child 1) plus fruits collected by Child 2 and Child 3 from non-diagonal rooms, ensuring rooms visited by both children are counted only once.

2. **Dynamic Programming (DP) Setup**:
    - **Child 2's Path**: Use DP to compute the maximum fruits Child 2 can collect. The state `dp2[k][j]` represents the maximum fruits collected up to step `k` ending at column `j`. The transition considers moves from the previous step (columns `j-1`, `j`, `j+1`).
    - **Child 3's Path**: Similarly, use DP to compute the maximum fruits Child 3 can collect. The state `dp3[k][i]` represents the maximum fruits collected up to step `k` ending at row `i`. The transition considers moves from the previous step (rows `i-1`, `i`, `i+1`).
    - **Initial States**:
        - Child 2 starts at `(0, n-1)`, so `dp2[0][n-1] = fruits[0][n-1]`.
        - Child 3 starts at `(n-1, 0)`, so `dp3[0][n-1] = fruits[n-1][0]`.
    - **Fruits Addition**: For each step, if the current room is not on the diagonal, add its fruits; otherwise, skip it.

3. **Final Calculation**: Sum the diagonal fruits, the maximum fruits from Child 2's path ending at `(n-1, n-1)`, and the maximum fruits from Child 3's path ending at `(n-1, n-1)`.

Let's implement this solution in PHP: **[3363. Find the Maximum Number of Fruits Collected](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003363-find-the-maximum-number-of-fruits-collected/solution.php)**

```php
<?php
/**
 * @param Integer[][] $fruits
 * @return Integer
 */
function maxCollectedFruits($fruits) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$fruits = [[1,2,3,4],[5,6,8,7],[9,10,11,12],[13,14,15,16]];
echo maxCollectedFruits($fruits);  // Output: 100

$fruits = [[1,1],[1,1]];
echo maxCollectedFruits($fruits);  // Output: 4
?>
```

### Explanation:

1. **Diagonal Sum Calculation**: The first child's path is fixed along the diagonal `(i, i)` for `i` from `0` to `n-1`. The sum of fruits along this diagonal is computed as `diagonalSum`.
2. **Child 2's Path (Dynamic Programming)**:
    - **Initialization**: Start at `(0, n-1)` with `fruits[0][n-1]`.
    - **Transition**: For each step `k`, compute the maximum fruits collected ending at column `j` by considering moves from columns `j-1`, `j`, and `j+1` of the previous step. If the room `(k, j)` is not on the diagonal, add its fruits.
3. **Child 3's Path (Dynamic Programming)**:
    - **Initialization**: Start at `(n-1, 0)` with `fruits[n-1][0]`.
    - **Transition**: For each step `k`, compute the maximum fruits collected ending at row `i` by considering moves from rows `i-1`, `i`, and `i+1` of the previous step. If the room `(i, k)` is not on the diagonal, add its fruits.
4. **Result Calculation**: The total maximum fruits collected is the sum of `diagonalSum`, the result from Child 2's path ending at `(n-1, n-1)`, and the result from Child 3's path ending at `(n-1, n-1)`.

This approach efficiently computes the maximum fruits collected by leveraging dynamic programming for the paths of Child 2 and Child 3, while Child 1's path is handled separately along the diagonal. The solution ensures optimal performance with a time complexity of O(n²), suitable for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**