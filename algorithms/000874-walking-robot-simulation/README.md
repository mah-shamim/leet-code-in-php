874\. Walking Robot Simulation

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Simulation`

A robot on an infinite XY-plane starts at point `(0, 0)` facing north. The robot can receive a sequence of these three possible types of `commands`:

- `-2:` Turn left `90` degrees.
- `-1:` Turn right `90` degrees.
- `1 <= k <= 9:` Move forward `k` units, one unit at a time.

Some of the grid squares are `obstacles`. The <code>i</sup>th</sup></code> obstacle is at grid point <code>obstacles[i] = (x<sub>i</sub>, y<sub>i</sub>)</code>. If the robot runs into an obstacle, then it will instead stay in its current location and move on to the next command.

Return _the **maximum Euclidean distance** that the robot ever gets from the origin **squared** (i.e. if the distance is `5`, return `25`).

**Note:**

- North means `+Y direction`.
- East means `+X direction`.
- South means `-Y direction`.
- West means `-X direction`.
- There can be obstacle in `[0,0]`.


**Example 1:**

- **Input:** commands = [4,-1,3], obstacles = []
- **Output:** 25
- **Explanation:** The robot starts at (0, 0):
  1. Move north 4 units to (0, 4).
  2. Turn right.
  3. Move east 3 units to (3, 4).\
  The furthest point the robot ever gets from the origin is (3, 4), which squared is 32 + 42 = 25 units away.

**Example 2:**

- **Input:** commands = [4,-1,4,-2,4], obstacles = [[2,4]]
- **Output:** 65
- **Explanation:** The robot starts at (0, 0):
  1. Move north 4 units to (0, 4).
  2. Turn right.
  3. Move east 1 unit and get blocked by the obstacle at (2, 4), robot is at (1, 4).
  4. Turn left.
  5. Move north 4 units to (1, 8).\
     The furthest point the robot ever gets from the origin is (1, 8), which squared is 12 + 82 = 65 units away.


**Example 3:**

- **Input:** commands = [6,-1,-1,6], obstacles = []
- **Output:** 36
- Explanation: The robot starts at (0, 0):
  1. Move north 6 units to (0, 6).
  2. Turn right.
  3. Turn right.
  4. Move south 6 units to (0, 0).\
     The furthest point the robot ever gets from the origin is (0, 6), which squared is 62 = 36 units away.



**Constraints:**

- <code>1 <= commands.length <= 10<sup>4</sup></code>
- `commands[i]` is either `-2`, `-1`, or an integer in the range `[1, 9]`.
- <code>0 <= obstacles.length <= 10<sup>4</sup></code>
- <code>-3 * 10<sup>4</sup> <= x<sub>i</sub>, y<sub>i</sub> <= 3 * 10<sup>4</sup></code>
- The answer is guaranteed to be less than <code>2<sup>31</sup></code>


**Solution:**

We need to simulate the robot's movement on an infinite 2D grid based on a sequence of commands and avoid obstacles if any. The goal is to determine the maximum Euclidean distance squared that the robot reaches from the origin.

### Approach

1. **Direction Handling**:
   - The robot can face one of four directions: North, East, South, and West.
   - We can represent these directions as vectors:
      - North: `(0, 1)`
      - East: `(1, 0)`
      - South: `(0, -1)`
      - West: `(-1, 0)`

2. **Turning**:
   - A left turn `(-2)` will shift the direction counterclockwise by 90 degrees.
   - A right turn `(-1)` will shift the direction clockwise by 90 degrees.

3. **Movement**:
   - For each move command, the robot will move in its current direction, one unit at a time. If it encounters an obstacle, it stops moving for that command.

4. **Tracking Obstacles**:
   - Convert the obstacles list into a set of tuples for quick lookup, allowing the robot to quickly determine if it will hit an obstacle.

5. **Distance Calculation**:
   - Track the maximum distance squared from the origin that the robot reaches during its movements.

Let's implement this solution in PHP: **[874\. Walking Robot Simulation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000874-walking-robot-simulation/solution.php)**

```php
<?php
/**
 * @param Integer[] $commands
 * @param Integer[][] $obstacles
 * @return Integer
 */
function robotSim($commands, $obstacles) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo robotSim([4,-1,3], []) . "\n"; // Output: 25
echo robotSim([4,-1,4,-2,4], [[2,4]]) . "\n"; // Output: 65
echo robotSim([6,-1,-1,6], []) . "\n"; // Output: 36
?>
```

### Explanation:

- **Direction Management**: We use a list of vectors to represent the directions, allowing easy calculation of the next position after moving.
- **Obstacle Detection**: By storing obstacles in a set, we achieve O(1) time complexity for checking if a position is blocked by an obstacle.
- **Distance Calculation**: We continuously update the maximum squared distance the robot reaches as it moves.

### Test Cases
- The example test cases provided are used to validate the solution:
   - `[4,-1,3]` with no obstacles should return `25`.
   - `[4,-1,4,-2,4]` with obstacles `[[2,4]]` should return `65`.
   - `[6,-1,-1,6]` with no obstacles should return `36`.

This solution efficiently handles the problem constraints and calculates the maximum distance squared as required.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
