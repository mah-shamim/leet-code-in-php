3025\. Find the Number of Ways to Place People I

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Geometry`, `Sorting`, `Enumeration`, `Biweekly Contest 123`

You are given a 2D array `points` of size `n x 2` representing integer coordinates of some points on a 2D plane, where <code>points[i] = [x<sub>i</sub>, y<sub>i</sub>]</code>.

Count the number of pairs of points `(A, B)`, where

- `A` is on the **upper left** side of `B`, and
- there are no other points in the rectangle (or line) they make (**including the border**).

Return _the count_.

**Example 1:**

- **Input:** points = [[1,1],[2,2],[3,3]]
- **Output:** 0
- **Explanation:**
    ![example1alicebob](https://assets.leetcode.com/uploads/2024/01/04/example1alicebob.png)
    - There is no way to choose `A` and `B` so `A` is on the upper left side of `B`.

**Example 2:**

- **Input:** points = [[6,2],[4,4],[2,6]]
- **Output:** 2
- **Explanation:**
    ![t2](https://assets.leetcode.com/uploads/2024/06/25/t2.jpg)
    - The left one is the pair `(points[1], points[0])`, where `points[1]` is on the upper left side of `points[0]` and the rectangle is empty.
    - The middle one is the pair `(points[2], points[1])`, same as the left one it is a valid pair.
    - The right one is the pair `(points[2], points[0])`, where `points[2]` is on the upper left side of `points[0]`, but `points[1]` is inside the rectangle so it's not a valid pair.


**Example 3:**

- **Input:** points = [[3,1],[1,3],[1,1]]
- **Output:** 2
- **Explanation:**
    ![t3](https://assets.leetcode.com/uploads/2024/06/25/t3.jpg)
    - The left one is the pair `(points[2], points[0])`, where `points[2]` is on the upper left side of `points[0]` and there are no other points on the line they form. Note that it is a valid state when the two points form a line.
    - The middle one is the pair `(points[1], points[2])`, it is a valid pair same as the left one.
    - The right one is the pair `(points[1], points[0])`, it is not a valid pair as `points[2]` is on the border of the rectangle.


**Constraints:**

- `2 <= n <= 50`
- `points[i].length == 2`
- `0 <= points[i][0], points[i][1] <= 50`
- All `points[i]` are distinct.



**Hint:**
1. We can enumerate all the upper-left and lower-right corners.
2. If the upper-left corner is `(x1, y1)` and lower-right corner is `(x2, y2)`, check that there is no point `(x, y)` such that `x1 <= x <= x2` and `y2 <= y <= y1`.



**Similar Questions:**
1. [223. Rectangle Area](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000223-rectangle-area)






**Solution:**

We need to count the number of pairs of points (A, B) such that point A is in the upper left position relative to point B, and there are no other points within the rectangle formed by A and B, including its borders.

### Approach
1. **Check Valid Pairs**: For each pair of distinct points (A, B), verify if A is in the upper left position relative to B. This means that the x-coordinate of A must be less than or equal to the x-coordinate of B, and the y-coordinate of A must be greater than or equal to the y-coordinate of B. Additionally, there must be at least one strict inequality to ensure the points are distinct in either the x or y direction.
2. **Check for Other Points**: For each valid pair (A, B), check if there is any other point that lies within or on the borders of the rectangle defined by A and B. The rectangle is defined by x-range [A<sub>x</sub>, B<sub>x</sub>] and y-range [B<sub>y</sub>, A<sub>y</sub>]. If no such point exists, the pair is counted.
3. **Iterate Through All Pairs**: Use nested loops to iterate through all possible pairs of points, and for each pair, check the conditions mentioned above. The solution efficiently checks all pairs and validates them against the constraints.

Let's implement this solution in PHP: **[3025. Find the Number of Ways to Place People I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003025-find-the-number-of-ways-to-place-people-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $points
 * @return Integer
 */
function numberOfPairs($points) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$points1 = [[1,1],[2,2],[3,3]];
echo numberOfPairs($points1) . PHP_EOL; // 0

$points2 = [[6,2],[4,4],[2,6]];
echo numberOfPairs($points2) . PHP_EOL; // 2

$points3 = [[3,1],[1,3],[1,1]];
echo numberOfPairs($points3) . PHP_EOL; // 2
?>
```

### Explanation:

1. **Initialization**: The function starts by initializing a counter `$count` to zero.
2. **Nested Loops**: The outer loops iterate over each point `$i` as point A, and the inner loops iterate over each point `$j` as point B. If `$i` and `$j` are the same, the loop continues to the next iteration.
3. **Check Upper Left Condition**: For each pair (A, B), the code checks if A is in the upper left position relative to B by verifying that A's x-coordinate is less than or equal to B's x-coordinate, and A's y-coordinate is greater than or equal to B's y-coordinate, with at least one strict inequality.
4. **Check for Other Points**: If the pair (A, B) satisfies the upper left condition, the code checks all other points to ensure no point lies within or on the borders of the rectangle defined by A and B. If any such point is found, the pair is invalid.
5. **Count Valid Pairs**: If no other points are found within the rectangle, the counter `$count` is incremented.
6. **Return Result**: After processing all pairs, the function returns the total count of valid pairs.

This approach efficiently checks all possible pairs of points and validates them against the given conditions, ensuring correctness while maintaining clarity. The complexity is O(n<sup>3</sup>), which is feasible given the constraint that `n` is at most 50.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**