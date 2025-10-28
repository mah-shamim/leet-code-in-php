3354\. Make Array Elements Equal to Zero

**Difficulty:** Easy

**Topics:** `Array`, `Simulation`, `Prefix Sum`, `Weekly Contest 424`

You are given an integer array `nums`.

Start by selecting a starting position `curr` such that `nums[curr] == 0`, and choose a movement **direction** of either left or right.

After that, you repeat the following process:

- If `curr` is out of the range `[0, n - 1]`, this process ends.
- If `nums[curr] == 0`, move in the current direction by **incrementing** `curr` if you are moving right, or **decrementing** `curr` if you are moving left.
- Else if `nums[curr] > 0`:
  - Decrement `nums[curr]` by 1.
  - **Reverse** your movement direction (left becomes right and vice versa).
  - Take a step in your new direction.

A selection of the initial position `curr` and movement direction is considered **valid** if every element in `nums` becomes 0 by the end of the process.

Return the number of possible **valid** selections.

**Example 1:**

- **Input:** nums = [1,0,2,0,3]
- **Output:** 2
- **Explanation:** The only possible valid selections are the following:
  - Choose `curr = 3`, and a movement direction to the left.
    - `[1,0,2,0,3] -> [1,0,2,0,3] -> [1,0,1,0,3] -> [1,0,1,0,3] -> [1,0,1,0,2] -> [1,0,1,0,2] -> [1,0,0,0,2] -> [1,0,0,0,2] -> [1,0,0,0,1] -> [1,0,0,0,1] -> [1,0,0,0,1] -> [1,0,0,0,1] -> [0,0,0,0,1] -> [0,0,0,0,1] -> [0,0,0,0,1] -> [0,0,0,0,1] -> [0,0,0,0,0]`.
  - Choose `curr = 3`, and a movement direction to the right.
    - `[1,0,2,0,3] -> [1,0,2,0,3] -> [1,0,2,0,2] -> [1,0,2,0,2] -> [1,0,1,0,2] -> [1,0,1,0,2] -> [1,0,1,0,1] -> [1,0,1,0,1] -> [1,0,0,0,1] -> [1,0,0,0,1] -> [1,0,0,0,0] -> [1,0,0,0,0] -> [1,0,0,0,0] -> [1,0,0,0,0] -> [0,0,0,0,0]`.


**Example 2:**

- **Input:** nums = [2,3,4,0,4,1,0]
- **Output:** 0
- **Explanation:** There are no possible valid selections.


**Example 3:**

- **Input:** [81,100,95,100,98,90,91,97,100,93,95,93,97,82,100,90,100,92,91,100,0,0,0,0,0,0,38,47,33,44,41,53,47,43,41,49,44,52,44,41,45,42,43,42,45,39,52,49,42,38,43,53,48,47,38,41,42,47,45,41,43,45,39,40,50,48,34,44,42]
- **Output:** 6



**Constraints:**

- `1 <= nums.length <= 100`
- `0 <= nums[i] <= 100`
- There is at least one element `i` where `nums[i] == 0`.



**Hint:**
1. Since the constraints are very small, you can simulate the process described.






**Solution:**

We need to find all starting positions and directions where beginning at a zero and following the described process will eventually make all array elements become zero.

Let me analyze the examples to understand the pattern:

**Key Observations:**
1. The process can only start at positions where `nums[i] == 0`
2. When we encounter a non-zero element, we decrement it and reverse direction
3. The process ends when we move out of bounds

Let me think about what makes a valid selection:
- The total number of times we visit each position must equal its initial value
- The path must be "balanced" - we need to visit each position the exact right number of times

**Approach:**
I'll simulate the process for each possible starting position (where `nums[i] == 0`) and both directions, counting how many lead to all zeros.

Let's implement this solution in PHP: **[3354. Make Array Elements Equal to Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003354-make-array-elements-equal-to-zero/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countValidSelections($nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to simulate the process
 *
 * @param $nums
 * @param $start
 * @param $dir
 * @return bool
 */
function simulateProcess($nums, $start, $dir): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1, 0, 2, 0, 3];
$nums2 = [2, 3, 4, 0, 4, 1, 0];
$nums3 = [81,100,95,100,98,90,91,97,100,93,95,93,97,82,100,90,100,92,91,100,0,0,0,0,0,0,38,47,33,44,41,53,47,43,41,49,44,52,44,41,45,42,43,42,45,39,52,49,42,38,43,53,48,47,38,41,42,47,45,41,43,45,39,40,50,48,34,44,42];

echo countValidSelections($nums1) . PHP_EOL; // Output: 2
echo countValidSelections($nums2) . PHP_EOL; // Output: 0
echo countValidSelections($nums3) . PHP_EOL; // Output: 6
?>
```

### Explanation:

1. **`countValidSelections` function:**
   - Iterates through all positions in the array
   - For each position that contains zero, tries both left and right directions
   - Calls `simulateProcess` to check if the selection is valid

2. **`simulateProcess` function:**
   - Simulates the entire process according to the given rules
   - Starts at the specified position with the specified direction
   - Follows the movement rules until going out of bounds
   - Checks if all array elements become zero by the end

3. **Movement Rules:**
   - If current element is zero: move in current direction
   - If current element is non-zero: decrement it, reverse direction, and move

**Time Complexity:** O(n² × max_value) in worst case, but acceptable for the given constraints (n ≤ 100)
**Space Complexity:** O(n) for the copy of the array

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**