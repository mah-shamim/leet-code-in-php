945\. Minimum Increment to Make Array Unique

Medium

You are given an integer array `nums`. In one move, you can pick an index `i` where `0 <= i < nums.length` and increment `nums[i]` by `1`.

Return _the minimum number of moves to make every value in `nums` **unique**_.

The test cases are generated so that the answer fits in a 32-bit integer.

**Example 1:**

- **Input:** nums = [1,2,2]
- **Output:** 1
- **Explanation:** After 1 move, the array could be [1, 2, 3]. 

**Example 2:**

- **Input:** nums = [3,2,1,2,1,7]
- **Output:** 6
- **Explanation:** After 6 moves, the array could be [3, 4, 1, 2, 5, 7].\
  It can be shown with 5 or less moves that it is impossible for the array to have all unique values.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>5</sup></code>


**Solution:**

The problem asks us to make every number in a given integer array unique. We can increment any number in the array in one move, and the goal is to minimize the total number of moves required to ensure that each element is distinct.

### Key Points:
- You are allowed to increment numbers in the array.
- The task is to find the minimum number of moves necessary to make all numbers unique.
- You need to handle potentially large arrays, so efficiency is important.

### Approach:
The strategy involves sorting the array and then iterating over it, ensuring each number is greater than the last (if a number repeats). If a number is smaller than or equal to the previous number (or the minimum available number), we increment it and count the moves.

- **Sorting the array** ensures that we process the numbers in ascending order, making it easy to see if a number is already taken by a previous one.
- We maintain a variable `minAvailable` which tracks the smallest number that can be assigned to a number (starting from 0).
- If a number in the array is less than `minAvailable`, we must increment it to `minAvailable` and update the counter for moves.

### Plan:
1. **Sort the array** to arrange the numbers in increasing order.
2. Initialize two variables:
  - `ans`: To store the total number of moves.
  - `minAvailable`: To track the next available unique number.
3. Loop through the sorted array:
  - For each number, if it's less than `minAvailable`, increment it until it's unique.
  - Update `minAvailable` to be the next available number.
4. Return the total number of moves.

Let's implement this solution in PHP: **[945. Minimum Increment to Make Array Unique](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000945-minimum-increment-to-make-array-unique/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minIncrementForUnique($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1,2,2];
$nums2 = [3,2,1,2,1,7];

echo minIncrementForUnique($nums1) . "\n"; // Output: 1
echo minIncrementForUnique($nums2) . "\n"; // Output: 6
?>
```

### Explanation:

1. **Sorting**: The array is sorted so that we can easily compare each number to the previous one.
2. **Loop**: For each number, if it's smaller than `minAvailable`, it needs to be incremented. We update `minAvailable` to be one more than the current number after it's incremented.
3. **Counting moves**: Every time a number is incremented to make it unique, we add to the total moves.

### Example Walkthrough:

#### Example 1:
- **Input**: nums = [1, 2, 2]
- **Sorted**: [1, 2, 2]
- **Initial `minAvailable`**: 0
  - First number (1): No increment needed. `minAvailable` becomes 2.
  - Second number (2): No increment needed. `minAvailable` becomes 3.
  - Third number (2): Since `minAvailable` is 3, we increment 2 to 3. So, the total moves = 1.
- **Output**: 1

#### Example 2:
- **Input**: nums = [3, 2, 1, 2, 1, 7]
- **Sorted**: [1, 1, 2, 2, 3, 7]
- **Initial `minAvailable`**: 0
  - First number (1): No increment needed. `minAvailable` becomes 2.
  - Second number (1): Increment it to 2. Total moves = 1. `minAvailable` becomes 3.
  - Third number (2): Increment it to 3. Total moves = 2. `minAvailable` becomes 4.
  - Fourth number (2): Increment it to 4. Total moves = 4. `minAvailable` becomes 5.
  - Fifth number (3): Increment it to 5. Total moves = 6. `minAvailable` becomes 6.
  - Sixth number (7): No increment needed. `minAvailable` becomes 8.
- **Output**: 6

### Time Complexity:
- **Sorting**: The sorting operation takes _**O(n log n)**_, where _**n**_ is the length of the array.
- **Iteration**: The iteration through the array is _**O(n)**_.
  Thus, the overall time complexity is _**O(n log n)**_, dominated by the sorting step.

### Output for Example:
#### Example 1:
- **Input**: [1, 2, 2]
- **Output**: 1

#### Example 2:
- **Input**: [3, 2, 1, 2, 1, 7]
- **Output**: 6

The approach efficiently solves the problem by sorting the array and using a greedy strategy to make each element unique. By processing the elements in ascending order, we ensure that we minimize the number of moves required to resolve duplicates. The solution has a time complexity of _**O(n log n)**_, making it feasible even for large inputs (up to _**10<sup>5</sup>**_ elements).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**