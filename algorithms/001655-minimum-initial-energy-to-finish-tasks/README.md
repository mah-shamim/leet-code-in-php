1655\. Minimum Initial Energy to Finish Tasks

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Greedy`, `Sorting`, `Weekly Contest 216`

You are given an array `tasks` where `tasks[i] = [actuali, minimumi]`:

- `actuali` is the actual amount of energy you **spend to finish** the `iᵗʰ` task.
- `minimumi` is the minimum amount of energy you **require to begin** the `iᵗʰ` task.

For example, if the task is `[10, 12]` and your current energy is `11`, you cannot start this task. However, if your current energy is `13`, you can complete this task, and your energy will be `3` after finishing it.

You can finish the tasks in **any order** you like.

Return _the **minimum** initial amount of energy you will need to finish all the tasks_.

**Example 1:**

- **Input:** tasks = [[1,2],[2,4],[4,8]]
- **Output:** 8
- **Explanation:**
   - Starting with 8 energy, we finish the tasks in the following order:
     - 3rd task. Now energy = 8 - 4 = 4.
     - 2nd task. Now energy = 4 - 2 = 2.
     - 1st task. Now energy = 2 - 1 = 1.
   - Notice that even though we have leftover energy, starting with 7 energy does not work because we cannot do the 3rd task.

**Example 2:**

- **Input:** tasks = [[1,3],[2,4],[10,11],[10,12],[8,9]]
- **Output:** 32
- **Explanation:**
  - Starting with 32 energy, we finish the tasks in the following order:
     - 1st task. Now energy = 32 - 1 = 31.
     - 2nd task. Now energy = 31 - 2 = 29.
     - 3rd task. Now energy = 29 - 10 = 19.
     - 4th task. Now energy = 19 - 10 = 9.
     - 5th task. Now energy = 9 - 8 = 1.

**Example 3:**

- **Input:** tasks = [[1,7],[2,8],[3,9],[4,10],[5,11],[6,12]]
- **Output:** 27
- **Explanation:**
  - Starting with 27 energy, we finish the tasks in the following order:
     - 5th task. Now energy = 27 - 5 = 22.
     - 2nd task. Now energy = 22 - 2 = 20.
     - 3rd task. Now energy = 20 - 3 = 17.
     - 1st task. Now energy = 17 - 1 = 16.
     - 4th task. Now energy = 16 - 4 = 12.
     - 6th task. Now energy = 12 - 6 = 6.

**Constraints:**

- `1 <= tasks.length <= 10⁵`
- `1 <= actualᵢ <= minimumᵢ <= 10⁴`



**Hint:**
1. We can easily figure that the `f(x)` : does `x` solve this array is monotonic so binary Search is doable
2. Figure a sorting pattern






**Solution:**

The solution determines the **minimum initial energy** required to complete all tasks in any order, where each task has an **actual energy cost** and a **minimum required energy to start**.  
It uses **greedy sorting** by `(minimum - actual)` in descending order to ensure tasks that are "harder to start" are done earlier, then calculates the needed starting energy.

### Approach:

- **Sorting Strategy** Sort tasks by `(minimum - actual)` in **descending order**. This prioritizes tasks where the gap between required start energy and actual energy is largest.
- **Simulation & Energy Tracking** Iterate through tasks in sorted order, keeping track of:
   - `sumActual` = total actual energy spent so far
   - `initial` = maximum starting energy needed to reach the current point
- **Formula Updating** For each task `(actual, minimum)`, the energy needed before this task is at least `minimum + sumActual`. Update `initial` to the maximum such value across all tasks, then add `actual` to `sumActual`.
- **Result** After processing all tasks, `initial` contains the minimum starting energy.

Let's implement this solution in PHP: **[1655. Minimum Initial Energy to Finish Tasks](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001655-minimum-initial-energy-to-finish-tasks/solution.php)**

```php
<?php
/**
 * @param Integer[][] $tasks
 * @return Integer
 */
function minimumEffort(array $tasks): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumEffort([[1,2],[2,4],[4,8]]) . "\n";                             // Output: 8
echo minimumEffort([[1,3],[2,4],[10,11],[10,12],[8,9]]) . "\n";             // Output: 32
echo minimumEffort([[1,7],[2,8],[3,9],[4,10],[5,11],[6,12]]) . "\n";        // Output: 27
?>
```

### Explanation:

- Sorting by `minimum - actual` descending ensures tasks with **high minimum requirement relative to actual cost** are attempted first.  
  This is optimal because starting with less energy fails for tasks that require a high threshold, so earlier energy "buffer" is more valuable for them.
- The greedy choice is proven optimal by exchange arguments (typical for scheduling with constraints).
- The formula `initial = max(initial, minimum + sumActual)` ensures that before doing the current task, we have enough energy to meet its `minimum` requirement, considering all previous tasks have been done (cost added to `sumActual`).
- No binary search needed because sorting + linear scan directly gives the minimal starting energy.

### Complexity
- **Time Complexity**: _**O(n log n)**_ due to sorting.
- **Space Complexity**: _**O(1)**_ extra space (ignoring input storage).
-  **Sorting Comparison:** Each comparison is _**O(1)**_.
- **Iteration:** _**O(n)**_ after sorting.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**