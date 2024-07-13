2751\. Robot Collisions

Hard

There are `n` **1-indexed** robots, each having a position on a line, health, and movement direction.

You are given **0-indexed** integer arrays `positions`, `healths`, and a string `directions` (`directions[i]` is either **'L'** for **left** or **'R'** for **right**). All integers in `positions` are **unique**.

All robots start moving on the line **simultaneously** at the **same speed** in their given directions. If two robots ever share the same position while moving, they will **collide**.

If two robots collide, the robot with **lower health** is **removed** from the line, and the health of the other robot **decreases by one**. The surviving robot continues in the **same** direction it was going. If both robots have the **same** health, they are both removed from the line.

Your task is to determine the **health** of the robots that survive the collisions, in the same **order** that the robots were given, i.e. final heath of robot 1 (if survived), final health of robot 2 (if survived), and so on. If there are no survivors, return an empty array.

Return _an array containing the health of the remaining robots (in the order they were given in the input), after no further collisions can occur_.

**Note:** The positions may be unsorted.

**Example 1:**

![](https://assets.leetcode.com/uploads/2023/05/15/image-20230516011718-12.png)

- **Input:** positions = [5,4,3,2,1], healths = [2,17,9,15,10], directions = "RRRRR"
- **Output:** [2,17,9,15,10]
- **Explanation:** No collision occurs in this example, since all robots are moving in the same direction. So, the health of the robots in order from the first robot is returned, [2, 17, 9, 15, 10].

**Example 2:**

![](https://assets.leetcode.com/uploads/2023/05/15/image-20230516004433-7.png)

- **Input:** positions = [3,5,2,6], healths = [10,10,15,12], directions = "RLRL"
- **Output:** [14]
- **Explanation:** There are 2 collisions in this example. Firstly, robot 1 and robot 2 will collide, and since both have the same health, they will be removed from the line. Next, robot 3 and robot 4 will collide and since robot 4's health is smaller, it gets removed, and robot 3's health becomes 15 - 1 = 14. Only robot 3 remains, so we return [14].

**Example 3:**

![](https://assets.leetcode.com/uploads/2023/05/15/image-20230516005114-9.png)

- **Input:** positions = [1,2,5,6], healths = [10,10,11,11], directions = "RLRL"
- **Output:** []
- **Explanation:** Robot 1 and robot 2 will collide and since both have the same health, they are both removed. Robot 3 and 4 will collide and since both have the same health, they are both removed. So, we return an empty array, [].


**Constraints:**

- <code>1 <= positions.length == healths.length == directions.length == n <= 10<sup>5</sup></code>
- <code>1 <= positions[i], healths[i] <= 10<sup>9</sup></code>
- `directions[i] == 'L'` or `directions[i] == 'R'`
- All values in `positions` are distinct


**Hint:**
1. Process the robots in the order of their positions to ensure that we process the collisions correctly.
2. To optimize the solution, use a stack to keep track of the surviving robots as we iterate through the positions.
3. Instead of simulating each collision, check the current robot against the top of the stack (if it exists) to determine if a collision occurs.

**Solution:**


Here's the step-by-step approach:

1. **Sort the robots by their positions**: Since the positions are unique, sorting will help us process collisions in the correct order.
2. **Use a stack to manage collisions**: As we iterate through the robots, we'll use a stack to keep track of the robots that are still on the line. When a robot moving to the left meets a robot moving to the right, they will collide and we will determine the result based on their healths.
3. **Handle collisions**: If a collision happens, the robot with the lower health will be removed and the robot with higher health will continue with reduced health. If both have the same health, both will be removed.

Here's the implementation in PHP: **[2751. Robot Collisions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002751-robot-collisions/solution.php)**

```php
<?php
// Example1 usage
$positions = [1, 2, 5, 6];
$healths = [10, 10, 11, 11];
$directions = "RLRL";

print_r(robotCollisions($positions, $healths, $directions));
//Output: [2,17,9,15,10]


// Example2 usage
$positions = [1, 2, 5, 6];
$healths = [10, 10, 11, 11];
$directions = "RLRL";

print_r(robotCollisions($positions, $healths, $directions));
//Output: [14]


// Example3 usage
$positions = [1, 2, 5, 6];
$healths = [10, 10, 11, 11];
$directions = "RLRL";

print_r(robotCollisions($positions, $healths, $directions));
//Output: []

?>
```

### Explanation
1. **Data Preparation**: We prepare an array of robots that include their positions, healths, directions, and original indices.
2. **Sorting**: We sort the robots based on their positions to ensure that we process potential collisions in the correct order.
3. **Stack Processing**: We use a stack to manage the robots. Robots moving to the right are simply pushed onto the stack. When a robot moving to the left is encountered, we handle collisions by popping from the stack and comparing healths.
4. **Result Preparation**: Finally, we prepare the result array based on the original indices of the robots, ensuring that the order is maintained.

This solution ensures that we efficiently handle up to \(10^5\) robots with the given constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
