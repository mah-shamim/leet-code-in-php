3661\. Maximum Walls Destroyed by Robots

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Binary Search`, `Dynamic Programming`, `Sorting`, `Weekly Contest 464`


There is an endless straight line populated with some robots and walls. You are given integer arrays `robots`, `distance`, and `walls`:
- `robots[i]` is the position of the `iᵗʰ` robot.
- `distance[i]` is the maximum distance the `iᵗʰ` robot's bullet can travel.
- `walls[j]` is the position of the `jᵗʰ` wall.

Every robot has **one** bullet that can either fire to the left or the right **at most** `distance[i]` meters.

A bullet destroys every wall in its path that lies within its range. Robots are fixed obstacles: if a bullet hits another robot before reaching a wall, it **immediately stops** at that robot and cannot continue.

Return the **maximum** number of **unique** walls that can be destroyed by the robots.

**Notes:**
- A wall and a robot may share the same position; the wall can be destroyed by the robot at that position.
- Robots are not destroyed by bullets.


**Example 1:**

- **Input:** robots = [4], distance = [3], walls = [1,10]
- **Output:** 1
- **Explanation:**
  - `robots[0] = 4` fires **left** with `distance[0] = 3`, covering `[1, 4]` and destroys `walls[0] = 1`.
  - Thus, the answer is 1.


**Example 2:**

- **Input:** robots = [10,2], distance = [5,1], walls = [5,2,7]
- **Output:** 3
- **Explanation:**
  - `robots[0] = 10` fires **left** with `distance[0] = 5`, covering `[5, 10]` and destroys `walls[0] = 5` and `walls[2] = 7`.
  - `robots[1] = 2` fires **left** with `distance[1] = 1`, covering `[1, 2]` and destroys `walls[1] = 2`.
  - Thus, the answer is 3.


**Example 3:**

- **Input:** robots = [1,2], distance = [100,1], walls = [10]
- **Output:** 0
- **Explanation:** In this example, only `robots[0]` can reach the wall, but its shot to the **right** is blocked by `robots[1]`; thus the answer is 0.


**Example 4:**

- **Input:** robots = [17,59,32,11,72,18], distance = [5,7,6,5,2,10], walls = [17,25,33,29,54,53,18,35,39,37,20,14,34,13,16,58,22,51,56,27,10,15,12,23,45,43,21,2,42,7,32,40,8,9,1,5,55,30,38,4,3,31,36,41,57,28,11,49,26,19,50,52,6,47,46,44,24,48]
- **Output:** 37


**Constraints:**

- `1 <= robots.length == distance.length <= 10⁵`
- `1 <= walls.length <= 10⁵`
- `1 <= robots[i], walls[j] <= 10⁹`
- `1 <= distance[i] <= 10⁵`
- All values in `robots` are **unique**
- All values in `walls` are **unique**



**Hint:**
1. Sort both the robots and walls arrays. This will help in efficiently processing positions and performing range queries.
2. Each robot can shoot either left or right. However, if a robot fires and another robot is in its path, the bullet stops. You need to use the positions of neighboring robots to limit the shooting range.
3. Use binary search (`lower_bound` and `upper_bound`) to count how many walls fall within a certain range.
4. You can use dynamic programming to keep track of the maximum number of walls destroyed so far, depending on the direction the previous robot shot.






**Solution:**

The problem requires maximizing the number of unique walls destroyed by robots, each with a single bullet that travels left or right up to a given distance. Bullets stop if they hit another robot.  
The solution uses **sorting**, **binary search** for efficient range queries, and **dynamic programming (DP) with memoization** to handle the state of whether a robot shoots left or right, while respecting blockage constraints from adjacent robots.

### Approach:

- **Sorting:** Both robots and walls are sorted by position to allow binary search and linear DP processing.

- **DP State Definition:** `dp[i][direction]` = maximum walls destroyed considering robots from `0..i`, where `direction` indicates whether robot `i` shoots left (`0`) or right (`1`).

- **Range Limiting Due to Adjacent Robots**  
  - When a robot shoots left, the left bound is capped by the next robot to its left (if any) plus one, to avoid being blocked.  
  - When shooting right, the right bound is capped by the next robot to its right, depending on its planned direction.

- **Wall Counting via Binary Search:** For a given interval `[leftBound, rightBound]`, the number of walls destroyed is found using `lowerBound` on the sorted walls array.

- **Memoized Recursion:** Start from the last robot and work backwards, trying both shooting directions and taking the maximum over all possibilities.

Let's implement this solution in PHP: **[3661. Maximum Walls Destroyed by Robots](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003661-maximum-walls-destroyed-by-robots/solution.php)**

```php
<?php
/**
 * @param integer[] $robots
 * @param integer[] $distance
 * @param integer[] $walls
 * @return integer
 */
function maxWalls(array $robots, array $distance, array $walls): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Binary search: find first index where value >= target
 * @param integer[] $arr
 * @param integer $target
 * @return integer
 */
function lowerBound(array $arr, int $target): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxWallsDestroyed([4], [3], [1,10]) . "\n";                // Output: 1
echo maxWallsDestroyed([10,2], [5,1], [5,2,7]) . "\n";          // Output: 3
echo maxWallsDestroyed([1,2], [100,1], [10]) . "\n";            // Output: 0
echo maxWallsDestroyed([17,59,32,11,72,18], [5,7,6,5,2,10], [17,25,33,29,54,53,18,35,39,37,20,14,34,13,16,58,22,51,56,27,10,15,12,23,45,43,21,2,42,7,32,40,8,9,1,5,55,30,38,4,3,31,36,41,57,28,11,49,26,19,50,52,6,47,46,44,24,48]) . "\n";            // Output: 37
?>
```

### Explanation:

- **Step 1: Preprocessing:** Pair each robot with its distance, then sort robots by position. Sort walls array for binary search.

- **Step 2: DP Base Case:** If no robots remain, return 0 walls destroyed.

- **Step 3: Left Shot Calculation**  
  - Leftmost reach = `robotPos - distance`.  
  - If there’s a robot to the left, limit left reach to `leftRobotPos + 1`.  
  - Count walls in `[leftBound, robotPos]` via binary search.

- **Step 4: Right Shot Calculation**  
  - Rightmost reach = `robotPos + distance`.  
  - If there’s a robot to the right, limit right reach based on whether that robot will shoot left (then use its left bound) or right (then avoid its position).  
  - Count walls in `[robotPos, rightBound]` via binary search.

- **Step 5: Memoization:** Store results in `dp` to avoid recomputation.

- **Step 6: Final Answer:** Start recursion from the last robot with direction = 1 (right), since the last robot has no right neighbor to block.

### Complexity
- **Time Complexity**:
  - Sorting robots and walls: `O(n log n + m log m)` where `n` = robots length, `m` = walls length.
  - Each DP state `(n, 2)` computed once, each using `O(log m)` for binary search.
  - Total: `O(n log m + n log n + m log m)` ≈ `O(n log n + m log m)`.
- **Space Complexity**:
  - `O(n + m)` for DP table and sorted arrays.
  - Recursion stack depth up to `O(n)`.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**