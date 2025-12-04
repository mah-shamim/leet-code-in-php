2211\. Count Collisions on a Road

**Difficulty:** Medium

**Topics:** `String`, `Stack`, `Simulation`, `Weekly Contest 285`

There are `n` cars on an infinitely long road. The cars are numbered from `0` to `n - 1` from left to right and each car is present at a **unique** point.

You are given a **0-indexed** string `directions` of length `n`. `directions[i]` can be either `'L'`, `'R'`, or `'S'` denoting whether the `ith` car is moving towards the **left**, towards the **right**, or **staying** at its current point respectively. Each moving car has the **same speed**.

The number of collisions can be calculated as follows:

- When two cars moving in **opposite** directions collide with each other, the number of collisions increases by `2`.
- When a moving car collides with a stationary car, the number of collisions increases by `1`.

After a collision, the cars involved can no longer move and will stay at the point where they collided. Other than that, cars cannot change their state or direction of motion.

Return _the **total number of collisions** that will happen on the road_.

**Example 1:**

- **Input:** directions = "RLRSLL"
- **Output:** 5
- **Explanation:** The collisions that will happen on the road are:
  - Cars 0 and 1 will collide with each other. Since they are moving in opposite directions, the number of collisions becomes 0 + 2 = 2.
  - Cars 2 and 3 will collide with each other. Since car 3 is stationary, the number of collisions becomes 2 + 1 = 3.
  - Cars 3 and 4 will collide with each other. Since car 3 is stationary, the number of collisions becomes 3 + 1 = 4.
  - Cars 4 and 5 will collide with each other. After car 4 collides with car 3, it will stay at the point of collision and get hit by car 5. The number of collisions becomes 4 + 1 = 5.
    Thus, the total number of collisions that will happen on the road is 5.

**Example 2:**

- **Input:** directions = "LLRR"
- **Output:** 0
- **Explanation:** No cars will collide with each other. Thus, the total number of collisions that will happen on the road is 0.

**Constraints:**

- `1 <= directions.length <= 10⁵`
- `directions[i]` is either `'L'`, `'R'`, or `'S'`.



**Hint:**
1. In what circumstances does a moving car not collide with another car?
2. If we disregard the moving cars that do not collide with another car, what does each moving car contribute to the answer?
3. Will stationary cars contribute towards the answer?



**Similar Questions:**
1. [735. Asteroid Collision](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000735-asteroid-collision)
2. [853. Car Fleet](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000853-car-fleet)
3. [1503. Last Moment Before All Ants Fall Out of a Plank](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001503-last-moment-before-all-ants-fall-out-of-a-plank)
4. [1776. Car Fleet II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001776-car-fleet-ii)







**Solution:**

We need to count collisions between cars moving on a road. The key insight is that collisions only happen when cars are moving towards each other or when moving cars hit stationary cars.

## Approach

The solution uses stack simulation. We'll process each car from left to right and maintain a stack of cars that are still "active" (either moving right or stationary after collisions).

**Key observations:**
1. Cars moving left ('L') will never collide if all cars to their left are also moving left
2. Cars moving right ('R') will never collide if all cars to their right are also moving right
3. A moving car collides when it meets an obstacle (either a stationary car or a car moving in the opposite direction)

**Algorithm:**
1. Initialize a stack and collision counter
2. For each car in the directions string:
   - If moving right ('R'), push to stack
   - If stationary ('S'), process any right-moving cars in the stack (they collide with this stationary car)
   - If moving left ('L'):
      - If stack has a right-moving car on top: collision between opposite directions
      - Else if stack has a stationary car on top: collision with stationary
      - Else: this left-moving car will never collide (all cars to left are also moving left)

Let's implement this solution in PHP: **[2211. Count Collisions on a Road](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002211-count-collisions-on-a-road/solution.php)**

```php
<?php
/**
 * @param String $directions
 * @return Integer
 */
function countCollisions($directions) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countCollisions("RLRSLL") . "\n";  // Output: 5
echo countCollisions("LLRR") . "\n";    // Output: 0
?>
```

### Explanation:

Let's walk through the example `"RLRSLL"`:

1. `R` → push to stack: `[R]`
2. `L` → top is `R`, collision: `2` collisions, stack becomes `[S]`
3. `R` → push to stack: `[S, R]`
4. `S` → top is `R`, collision: `+1` (total 3), stack becomes `[S, S]`
5. `L` → top is `S`, collision: `+1` (total 4), stack remains `[S, S]`
6. `L` → top is `S`, collision: `+1` (total 5), stack remains `[S, S]`

**Time Complexity:** O(n) where n is the length of directions string. We process each car once.

**Space Complexity:** O(n) for the stack in worst case.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**