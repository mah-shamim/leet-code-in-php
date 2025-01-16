1671\. Minimum Number of Removals to Make Mountain Array

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Dynamic Programming`, `Greedy`

You may recall that an array `arr` is a **mountain array** if and only if:

- `arr.length >= 3`
- There exists some index `i` (**0-indexed**) with `0 < i < arr.length - 1` such that:
  - `arr[0] < arr[1] < ... < arr[i - 1] < arr[i]`
  - `arr[i] > arr[i + 1] > ... > arr[arr.length - 1]`

Given an integer array `nums`, return _the **minimum** number of elements to remove to make `nums` a **mountain array**_.

**Example 1:**

- **Input:** nums = [1,3,1]
- **Output:** 0
- **Explanation:** The array itself is a mountain array so we do not need to remove any elements.

**Example 2:**

- **Input:** nums = [2,1,1,5,6,2,3,1]
- **Output:** 3
- **Explanation:** One solution is to remove the elements at indices 0, 1, and 5, making the array nums = [1,5,6,3,1].



**Constraints:**

- `3 <= nums.length <= 1000`
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- `It is guaranteed that you can make a mountain array out of nums.`


**Hint:**
1. Think the opposite direction instead of minimum elements to remove the maximum mountain subsequence
2. Think of LIS it's kind of close



**Solution:**

We can use a dynamic programming approach with the idea of finding the **maximum mountain subsequence** rather than directly counting elements to remove. This approach is based on finding two **Longest Increasing Subsequences (LIS)** for each position in the array: one going **left-to-right** and the other going **right-to-left**. Once we have the longest possible mountain subsequence, the difference between the original array length and this subsequence length will give us the minimum elements to remove.

### Solution Outline

1. **Identify increasing subsequence lengths**:
   - Compute the `leftLIS` array, where `leftLIS[i]` represents the length of the longest increasing subsequence ending at `i` (going left to right).

2. **Identify decreasing subsequence lengths**:
   - Compute the `rightLIS` array, where `rightLIS[i]` represents the length of the longest decreasing subsequence starting at `i` (going right to left).

3. **Calculate maximum mountain length**:
   - For each index `i` where `0 < i < n - 1`, check if there exists a valid peak (i.e., `leftLIS[i] > 1` and `rightLIS[i] > 1`). Calculate the mountain length at `i` as `leftLIS[i] + rightLIS[i] - 1`.

4. **Get the minimum removals**:
   - The minimum elements to remove will be the original array length minus the longest mountain length found.

Let's implement this solution in PHP: **[1671. Minimum Number of Removals to Make Mountain Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001671-minimum-number-of-removals-to-make-mountain-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumMountainRemovals($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$nums1 = [1, 3, 1];
echo minimumMountainRemovals($nums1); // Output: 0

$nums2 = [2, 1, 1, 5, 6, 2, 3, 1];
echo minimumMountainRemovals($nums2); // Output: 3
?>
```

### Explanation:

1. **Left LIS Calculation**:
   - `leftLIS[i]` stores the maximum length of an increasing subsequence ending at `i`. We iterate through each `i`, and for each `i`, iterate from `0` to `i-1` to find the longest subsequence ending at `i`.

2. **Right LIS Calculation**:
   - `rightLIS[i]` stores the maximum length of a decreasing subsequence starting at `i`. We iterate backward from `n-2` to `0`, and for each `i`, iterate from `n-1` down to `i+1` to find the longest subsequence starting at `i`.

3. **Mountain Calculation**:
   - A valid peak at index `i` must have `leftLIS[i] > 1` and `rightLIS[i] > 1`. The length of a mountain with peak at `i` is `leftLIS[i] + rightLIS[i] - 1`.

4. **Final Calculation**:
   - The minimum removals needed is the difference between the original array length and the maximum mountain length found.

### Complexity Analysis

- **Time Complexity**: _**O(n<sup>2</sup>)**_, due to the double loop in the LIS calculations.
- **Space Complexity**: _**O(n)**_, for storing the `leftLIS` and `rightLIS` arrays.

This solution ensures that we find the maximum mountain subsequence and compute the minimum removals required to achieve a mountain array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
