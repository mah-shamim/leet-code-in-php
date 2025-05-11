75\. Sort Colors

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Sorting`

Given an array `nums` with `n` objects colored red, white, or blue, sort them [in-place](https://en.wikipedia.org/wiki/In-place_algorithm) so that objects of the same color are adjacent, with the colors in the order red, white, and blue.

We will use the integers `0`, `1`, and `2` to represent the color red, white, and blue, respectively.

You must solve this problem without using the library's sort function.

**Example 1:**

- **Input:** nums = [2,0,2,1,1,0]
- **Output:** [0,0,1,1,2,2] 

**Example 2:**

- **Input:** nums = [2,0,1]
- **Output:** [0,1,2]

**Constraints:**

- <code>n == nums.length</code>
- <code>1 <= n <= 300</code>
- `nums[i]` is either `0`, `1`, or `2`.

**Follow-up:** Could you come up with a one-pass algorithm using only constant extra space?

**Hint:**
1. A rather straight forward solution is a two-pass algorithm using counting sort.
2. Iterate the array counting number of 0's, 1's, and 2's.
3. Overwrite array with the total number of 0's, then 1's and followed by 2's.


**Solution:**


To solve this problem, we can follow these steps:

The goal is to sort the array `nums` with elements representing the colors red (0), white (1), and blue (2) in one pass, using constant extra space.

### Approach:

The most efficient way to solve this problem is by using the Dutch National Flag algorithm, which is a one-pass algorithm with constant extra space. The idea is to use three pointers:
- `low` to track the position for the next 0 (red),
- `mid` to traverse the array,
- `high` to track the position for the next 2 (blue).

### Algorithm:
1. Initialize three pointers:
   - `low` at the start (0),
   - `mid` at the start (0),
   - `high` at the end (n-1) of the array.

2. Traverse the array with `mid`:
   - If `nums[mid]` is `0` (red), swap `nums[mid]` with `nums[low]`, then increment both `low` and `mid`.
   - If `nums[mid]` is `1` (white), move `mid` to the next element.
   - If `nums[mid]` is `2` (blue), swap `nums[mid]` with `nums[high]` and decrement `high`.

3. Continue until `mid` exceeds `high`.

This algorithm sorts the array in-place with a single pass.

Let's implement this solution in PHP: **[75. Sort Colors](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000075-sort-colors/solution.php)**

```php
<?php
// Example usage:
$nums1 = [2, 0, 2, 1, 1, 0];
sortColors($nums1);
print_r($nums1); // Output: [0, 0, 1, 1, 2, 2]

$nums2 = [2,0,1];
sortColors($nums2);
print_r($nums2); // Output: [0,1,2]

?>
```

### Explanation:

1. **Initialization:**
   - `low` starts at the beginning (`0`).
   - `mid` starts at the beginning (`0`).
   - `high` starts at the end (`n-1`).

2. **Loop Through Array:**
   - If `nums[mid]` is `0`, it swaps with `nums[low]` because `0` should be at the front. Both pointers `low` and `mid` are then incremented.
   - If `nums[mid]` is `1`, it is already in the correct position, so only `mid` is incremented.
   - If `nums[mid]` is `2`, it swaps with `nums[high]` because `2` should be at the end. Only `high` is decremented, while `mid` stays the same to check the swapped element.

3. **Completion:**
   - The loop continues until `mid` passes `high`, ensuring that the array is sorted in the order of `0`, `1`, and `2`.

This approach is optimal with O(n) time complexity and O(1) space complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**