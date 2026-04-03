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

This problem requires finding the maximum number of unique walls that can be destroyed by robots firing bullets left or right, with bullets stopping when they encounter another robot. The solution uses sorting, binary search for range queries, and dynamic programming to track optimal wall destruction counts while accounting for bullet-blocking interactions between robots.

### Approach:

- **Sorting** — Sort both robots and walls arrays to enable efficient range-based queries using binary search.
- **Neighbor identification** — Precompute previous and next robot positions to determine stopping boundaries for bullets.
- **Range calculation** — For each robot, compute the index ranges of walls it can destroy when shooting left or right, considering neighboring robots as blockers.
- **Dynamic Programming** — Use DP where `dp[i][0]` represents max walls destroyed using first `i+1` robots with the last robot shooting left, and `dp[i][1]` for shooting right.
- **Overlap handling** — When adding a new robot's destroyed walls, subtract walls already destroyed by previous robots to avoid double-counting.

Let's implement this solution in PHP: **[3661. Maximum Walls Destroyed by Robots](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003661-maximum-walls-destroyed-by-robots/solution.php)**

```php
<?php
/**
 * @param Integer[] $robots
 * @param Integer[] $distance
 * @param Integer[] $walls
 * @return Integer
 */
function maxWalls(array $robots, array $distance, array $walls): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $arr
 * @param $target
 * @return int
 */
function lower_bound($arr, $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $arr
 * @param $target
 * @return int
 */
function upper_bound($arr, $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxWallsDestroyed([4], [3], [1,10]) . "\n";                // Output: 3
echo maxWallsDestroyed([10,2], [5,1], [5,2,7]) . "\n";          // Output: 4
echo maxWallsDestroyed([1,2], [100,1], [10]) . "\n";            // Output: 0
?>
```

### Explanation:

- **Sorting:** Both `robots` and `walls` arrays are sorted to allow binary search operations. This transforms position-based queries into index-based range queries.
- **Neighbor blocking:** For each robot at position `pos` with distance `d`:
   - **Left shot** reaches from `pos - d` to `pos`, but cannot go past the previous robot (if exists), so the leftmost reachable position is `max(pos - d, prev_robot + 1)`.
   - **Right shot** reaches from `pos` to `pos + d`, but cannot go past the next robot, so the rightmost reachable position is `min(pos + d, next_robot - 1)`.
- **Wall range indexing:** Using `lower_bound` and `upper_bound` on the sorted `walls` array, each robot's left and right shooting ranges are converted to inclusive index ranges `[left_idx, right_idx]` in the walls array.
- **DP state transition:** For robot `i`:
   - `dp[i][0]` (shoot left): can be based on `dp[i-1][0]` or `dp[i-1][1]`, but walls that were already destroyed by robot `i-1`'s right shot should not be counted again.
   - `dp[i][1]` (shoot right): similar logic applies.
   - The actual count added is `range_length` minus walls already covered by previous robots.
- **Overlap subtraction:** When calculating new walls destroyed by robot `i` shooting left, if robot `i-1` shot right, some walls may overlap. The overlap is calculated by finding how many walls in robot `i`'s left range were already in robot `i-1`'s right range.
- **Final answer:** Return `max(dp[n-1][0], dp[n-1][1])` — the best result after processing all robots.

### Complexity
- **Time Complexity**:  `O((n + m) log m)`  
  - Sorting robots and walls: `O(n log n + m log m)`.  
  - For each robot (n up to 1e5), binary search operations: `O(log m)`.  
  - DP transitions: `O(n)`.
- **Space Complexity**: `O(n + m)`  
  - Storing sorted arrays: `O(n + m)`.  
  - DP table: `O(n)`.  
  - Range arrays: `O(n)`.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**