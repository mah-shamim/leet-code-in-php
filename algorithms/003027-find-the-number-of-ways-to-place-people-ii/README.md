3027\. Find the Number of Ways to Place People II

**Difficulty:** Hard

**Topics:** `Array`, `Math`, `Geometry`, `Sorting`, `Enumeration`, `Biweekly Contest 123`

You are given a 2D array `points` of size `n x 2` representing integer coordinates of some points on a 2D-plane, where <code>points[i] = [x<sub>i</sub>, y<sub>i</sub>]</code>.

We define the **right** direction as positive x-axis (**increasing x-coordinate**) and the **left** direction as negative x-axis (**decreasing x-coordinate**). Similarly, we define the **up** direction as positive y-axis (**increasing y-coordinate**) and the **down** direction as negative y-axis (**decreasing y-coordinate**)

You have to place `n` people, including Alice and Bob, at these points such that there is **exactly one** person at every point. Alice wants to be alone with Bob, so Alice will build a rectangular fence with Alice's position as the **upper left corner** and Bob's position as the **lower right corner** of the fence (**Note** that the fence **might not** enclose any area, i.e. it can be a line). If any person other than Alice and Bob is either **inside** the fence or **on** the fence, Alice will be sad.

Return _the number of **pairs of points** where you can place Alice and Bob, such that Alice **does not** become sad on building the fence_.

**Note** that Alice can only build a fence with Alice's position as the upper left corner, and Bob's position as the lower right corner. For example, Alice cannot build either of the fences in the picture below with four corners `(1, 1)`, `(1, 3)`, `(3, 1)`, and `(3, 3)`, because:

- With Alice at `(3, 3)` and Bob at `(1, 1)`, Alice's position is not the upper left corner and Bob's position is not the lower right corner of the fence.
- With Alice at `(1, 3)` and Bob at `(1, 1)`, Bob's position is not the lower right corner of the fence.

![example0alicebob-1](https://assets.leetcode.com/uploads/2024/01/04/example0alicebob-1.png)


**Example 1:**

![example1-alice-bob](https://assets.leetcode.com/uploads/2024/01/04/example1alicebob.png)

- **Input:** points = [[1,1],[2,2],[3,3]]
- **Output:** 0
- **Explanation:** here is no way to place Alice and Bob such that Alice can build a fence with Alice's position as the upper left corner and Bob's position as the lower right corner. Hence we return 0.

**Example 2:**

![example2-alice-bob](https://assets.leetcode.com/uploads/2024/02/04/example2alicebob.png)

- **Input:** points = [[6,2],[4,4],[2,6]]
- **Output:** 2
- **Explanation:** There are two ways to place Alice and Bob such that Alice will not be sad:
  - Place Alice at (4, 4) and Bob at (6, 2).
  - Place Alice at (2, 6) and Bob at (4, 4).
    You cannot place Alice at (2, 6) and Bob at (6, 2) because the person at (4, 4) will be inside the fence.

**Example 3:**

![example4-alice-bob](https://assets.leetcode.com/uploads/2024/02/04/example4alicebob.png)

- **Input:** points = [[3,1],[1,3],[1,1]]
- **Output:** 2
- **Explanation:** There are two ways to place Alice and Bob such that Alice will not be sad:
  - Place Alice at (1, 1) and Bob at (3, 1).
  - Place Alice at (1, 3) and Bob at (1, 1).
    You cannot place Alice at (1, 3) and Bob at (3, 1) because the person at (1, 1) will be on the fence.
    Note that it does not matter if the fence encloses any area, the first and second fences in the image are valid.

**Constraints:**

- `2 <= n <= 1000`
- `points[i].length == 2`
- <code>-10<sup>9</sup> <= points[i][0], points[i][1] <= 10<sup>9</sup></code>
- All `points[i]` are distinct.



**Hint:**
1. Sort the points by x-coordinate in non-decreasing order and break the tie by sorting the y-coordinate in non-increasing order.
2. Now consider two points upper-left corner `points[i]` and lower-right corner `points[j]`, such that `i < j` and `points[i][0] <= points[j][0]` and `points[i][1] >= points[j][1]`.
3. Instead of brute force looping, we can save the largest y-coordinate that is no larger than `points[i][1]` when looping on `j`, say the value is `m`. And if `m < points[j][1]`, the upper-left and lower-right corner pair is valid.
4. The actual values don’t matter, we can compress all x-coordinates and y-coordinates to the range `[1, n]`. Can we use prefix sum now?


**Similar Questions:**
1. [223. Rectangle Area](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000223-rectangle-area)






**Solution:**

We need to count the number of valid pairs of points where Alice can be placed at the upper left corner and Bob at the lower right corner of a rectangular fence such that no other point lies inside or on the boundary of the fence. The solution involves sorting the points and then efficiently checking each possible pair to ensure the condition is met.

### Approach
1. **Sorting**: First, sort the points primarily by their x-coordinates in ascending order. For points with the same x-coordinate, sort them by their y-coordinates in descending order. This ensures that when we consider a point `i` as Alice and a point `j` as Bob, where `i < j`, the x-coordinate of `i` is less than or equal to that of `j`, and if their x-coordinates are equal, the y-coordinate of `i` is greater than or equal to that of `j`.

2. **Checking Pairs**: For each point `i` (considered as Alice's point), iterate through all points `j` where `j > i` (considered as Bob's point). For each point `j`, check if its y-coordinate is less than or equal to that of `i`. If so, check if the maximum y-coordinate encountered so far between `i` and `j` (excluding `j`) is less than the y-coordinate of `j`. If this condition is met, it means no other point lies inside or on the boundary of the rectangle defined by `i` and `j`, so the pair is valid. Update the maximum y-coordinate to include the y-coordinate of `j` for future checks.

Let's implement this solution in PHP: **[3027. Find the Number of Ways to Place People II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003027-find-the-number-of-ways-to-place-people-ii/solution.php)**

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
echo numberOfPairs([[1,1],[2,2],[3,3]]) . PHP_EOL; // 0
echo numberOfPairs([[6,2],[4,4],[2,6]]) . PHP_EOL; // 2
echo numberOfPairs([[3,1],[1,3],[1,1]]) . PHP_EOL; // 2
?>
```

### Explanation:

1. **Sorting**: The points are sorted using a custom comparator. Points are first compared by their x-coordinates. If two points have the same x-coordinate, they are compared by their y-coordinates in descending order. This sorting strategy ensures that for any two points `i` and `j` where `i < j`, the x-coordinate of `i` is less than or equal to that of `j`, and if their x-coordinates are equal, the y-coordinate of `i` is greater than or equal to that of `j`.

2. **Checking Valid Pairs**: For each point `i`, we initialize `maxY` to a very small value. Then, for each point `j` after `i`, we check if the y-coordinate of `j` is less than or equal to that of `i`. If so, we check if `maxY` is less than the y-coordinate of `j`. If it is, the pair `(i, j)` is valid because no other point between `i` and `j` has a y-coordinate that would place it inside or on the boundary of the rectangle. We then update `maxY` to the maximum of its current value and the y-coordinate of `j`.

3. **Result**: The total count of valid pairs is returned after processing all possible pairs.

This approach efficiently checks all possible pairs of points while ensuring that no other point lies inside or on the boundary of the rectangle formed by Alice and Bob, leveraging sorting and a linear pass through the points for each `i`. The complexity is O(n<sup>2</sup>), which is feasible given the constraint `n <= 1000`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**