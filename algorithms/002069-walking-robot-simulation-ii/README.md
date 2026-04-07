2069\. Walking Robot Simulation II

**Difficulty:** Medium

**Topics:** `Senior`, `Design`, `Simulation`, `Biweekly Contest 65`

A `width x height` grid is on an XY-plane with the **bottom-left** cell at `(0, 0)` and the **top-right** cell at `(width - 1, height - 1)`. The grid is aligned with the four cardinal directions (`"North"`, `"East"`, `"South"`, and `"West"`). A robot is **initially** at cell `(0, 0)` facing direction `"East"`.

The robot can be instructed to move for a specific number of **steps**. For each step, it does the following.

1. Attempts to move **forward one** cell in the direction it is facing.
2. If the cell the robot is **moving to** is **out of bounds**, the robot instead **turns** 90 degrees **counterclockwise** and retries the step.

After the robot finishes moving the number of steps required, it stops and awaits the next instruction.

Implement the `Robot` class:

- `Robot(int width, int height)` Initializes the `width x height` grid with the robot at `(0, 0)` facing `"East"`.
- `void step(int num)` Instructs the robot to move forward `num` steps.
- `int[] getPos()` Returns the current cell the robot is at, as an array of length 2, `[x, y]`.
- `String getDir()` Returns the current direction of the robot, `"North"`, `"East"`, `"South"`, or `"West"`.



**Example 1:**

![example-1](https://assets.leetcode.com/uploads/2021/10/09/example-1.png)

- **Input:** 
   ```
      ["Robot", "step", "step", "getPos", "getDir", "step", "step", "step", "getPos", "getDir"]
      [[6, 3], [2], [2], [], [], [2], [1], [4], [], []]
   ```
- **Output:** [null, null, null, [4, 0], "East", null, null, null, [1, 2], "West"]
- **Explanation:**
   ```
     Robot robot = new Robot(6, 3); // Initialize the grid and the robot at (0, 0) facing East.
     robot.step(2);  // It moves two steps East to (2, 0), and faces East.
     robot.step(2);  // It moves two steps East to (4, 0), and faces East.
     robot.getPos(); // return [4, 0]
     robot.getDir(); // return "East"
     robot.step(2);  // It moves one step East to (5, 0), and faces East.
     // Moving the next step East would be out of bounds, so it turns and faces North.
     // Then, it moves one step North to (5, 1), and faces North.
     robot.step(1);  // It moves one step North to (5, 2), and faces North (not West).
     robot.step(4);  // Moving the next step North would be out of bounds, so it turns and faces West.
     // Then, it moves four steps West to (1, 2), and faces West.
     robot.getPos(); // return [1, 2]
     robot.getDir(); // return "West"
   ```

**Constraints:**

- `2 <= width, height <= 100`
- `1 <= num <= 10⁵`
- At most `10⁴` calls **in total** will be made to `step`, `getPos`, and `getDir`.



**Hint:**
1. The robot only moves along the perimeter of the grid. Can you think if modulus can help you quickly compute which cell it stops at?
2. After the robot moves one time, whenever the robot stops at some cell, it will always face a specific direction. i.e., The direction it faces is determined by the cell it stops at.
3. Can you precompute what direction it faces when it stops at each cell along the perimeter, and reuse the results?



**Similar Questions:**
1. [874. Walking Robot Simulation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000874-walking-robot-simulation)






**Solution:**

The robot moves only along the **perimeter** of the grid.  
The key insight is that after the first move, the robot’s behavior becomes **periodic** — it repeats the same cycle of positions and directions along the perimeter every `2*(width + height - 2)` steps.  
We can use **modulo arithmetic** to reduce large step counts, but must handle the starting position `(0,0)` with direction `"East"` carefully to ensure correct final direction.

### Approach:

- Recognize that the robot **never enters the interior** — it always moves along the outer boundary.
- The number of cells on the perimeter (excluding duplicates) is `2*(width + height - 2)`.
- Use modulo to reduce `num` steps to a smaller number without changing the final position or direction, except when the robot would stay at `(0,0)` facing East.
- Simulate the reduced number of steps step-by-step, handling boundary collisions by turning left.
- Predefine directions in the order `["East", "North", "West", "South"]` to easily rotate.

Let's implement this solution in PHP: **[2069. Walking Robot Simulation II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002069-walking-robot-simulation-ii/solution.php)**

```php
<?php
class Robot {

    private int $width;
    private int $height;
    private int $x;
    private int $y;
    private string $dir;
    private int|float $perimeter;
    private array $directions;

    /**
     * @param Integer $width
     * @param Integer $height
     */
    function __construct(int $width, int $height) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function step(int $num) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @return Integer[]
     */
    function getPos(): array
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @return String
     */
    function getDir(): string
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @return void
     */
    private function turnLeft(): void
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your Robot object will be instantiated and called as such:
 * $obj = Robot($width, $height);
 * $obj->step($num);
 * $ret_2 = $obj->getPos();
 * $ret_3 = $obj->getDir();
 */

// Test cases
$robot = new Robot(6, 3);
$robot->step(2);   // (2,0), East
$robot->step(2);   // (4,0), East
$robot->getPos();  // [4,0]
$robot->getDir();  // "East"
$robot->step(2);   // (5,1), North
$robot->step(1);   // (5,2), North
$robot->step(4);   // (1,2), West
$robot->getPos();  // [1,2]
$robot->getDir();  // "West"

/**Edge case: Full cycle**/
$robot = new Robot(3, 3);
$robot->step(8);   // Full perimeter (8 steps) → should be back at (0,0) facing East
$robot->getPos();  // [0,0]
$robot->getDir();  // "East"

/**Edge case: Small grid 2x2**/
$robot = new Robot(2, 2);
$robot->step(4);   // Full cycle, back to start facing East
$robot->getPos();  // [0,0]
$robot->getDir();  // "East"
?>
```

### Explanation:

- **Periodic movement**: The robot’s path along the perimeter repeats every `2*(width + height - 2)` steps.

- **Step reduction**:  
  - `num = num % perimeter` avoids large loops.  
  - If the result is `0` and the robot is at `(0,0)` facing East, we must simulate a full cycle to get the correct final direction.

- **Simulation loop**:  
  - For each step, try to move forward.  
  - If the next cell is out of bounds, turn left and retry the same step (without moving).

- **Direction tracking**:  
  - Keep the current direction index in `$directions` array.  
  - Turning left means incrementing the index modulo 4.

- **Special case**:  
  - If `width == 2` and `height == 2`, the perimeter is 4 cells, and the starting point is a corner.  
  - The modulo logic still works because the robot will never stay in starting position unless `num % perimeter == 0`, which is handled by simulating the full cycle.

### Complexity
- **Time Complexity**:  per `step` call:  
  - After modulo reduction, at most `O(perimeter)` steps, but `perimeter <= 2*(100+100-2) = 396`, so it’s effectively **constant time** per call.  
  - Actually, with modulo, we reduce to **at most perimeter** steps, which is small (≤ 400).  
  - Better: We can compute directly without per-step loop using mathematical positions, but here we still loop.
- **Space Complexity**: _**O(1)**_ extra space beyond input.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**