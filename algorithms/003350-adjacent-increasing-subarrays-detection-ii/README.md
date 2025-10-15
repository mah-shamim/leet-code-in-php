3350\. Adjacent Increasing Subarrays Detection II

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Weekly Contest 423`

Given an array `nums` of `n` integers, your task is to find the **maximum** value of `k` for which there exist **two** adjacent subarrays[^1] 

of length `k` each, such that both subarrays are **strictly increasing**. Specifically, check if there are **two** subarrays of length `k` starting at indices `a` and `b` (`a < b`), where:

- Both subarrays `nums[a..a + k - 1]` and `nums[b..b + k - 1]` are **strictly increasing**.
- The subarrays must be **adjacent**, meaning `b = a + k`.

Return the **maximum** _possible_ value of `k`.

A **subarray** is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [2,5,7,8,9,2,3,4,3,1]
- **Output:** 3
- **Explanation:**
  - The subarray starting at index `2` is `[7, 8, 9]`, which is strictly increasing.
  - The subarray starting at index `5` is `[2, 3, 4]`, which is also strictly increasing.
  - These two subarrays are adjacent, and 3 is the **maximum** possible value of `k` for which two such adjacent strictly increasing subarrays exist.


**Example 2:**

- **Input:** nums = [1,2,3,4,4,4,4,5,6,7]
- **Output:** 2
- **Explanation:**
  - The subarray starting at index `0` is `[1, 2]`, which is strictly increasing.
  - The subarray starting at index `2` is `[3, 4]`, which is also strictly increasing.
  - These two subarrays are adjacent, and 2 is the **maximum** possible value of `k` for which two such adjacent strictly increasing subarrays exist.

**Constraints:**

- `2 <= nums.length <= 2 * 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`



**Hint:**
1. Find the boundaries between strictly increasing subarrays.
2. Can we use binary search?



[^1]: **Subarray** A **subarray** is a contiguous **non-empty** sequence of elements within an array.


**Solution:**

We need to find the maximum length `k` where there exist two adjacent strictly increasing subarrays of length `k` in the given array.

Let me break down the approach:

1. **Understanding the problem**: I need to find two subarrays of length `k` that are:
    - Both strictly increasing
    - Adjacent (the second starts right after the first ends)
    - And I need the maximum possible `k`

2. **Key Insight**:
    - I can precompute for each position, the length of the increasing sequence starting at that position
    - Then for each possible starting position, I can check if it can form two adjacent increasing subarrays

3. **Optimization**:
    - Use binary search to find the maximum `k` efficiently
    - Precompute increasing sequence lengths to quickly validate potential `k` values

Let's implement this solution in PHP: **[3350. Adjacent Increasing Subarrays Detection II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003350-adjacent-increasing-subarrays-detection-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxIncreasingSubarrays($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}


/**
 * Check if there exists two adjacent increasing subarrays of length k
 *
 * @param $nums
 * @param $inc
 * @param $k
 * @param $n
 * @return bool
 */
function isValid($nums, $inc, $k, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums1 = [2,5,7,8,9,2,3,4,3,1];
echo maxIncreasingSubarrays($nums1) . "\n"; // Output: 3

// Example 2
$nums2 = [1,2,3,4,4,4,4,5,6,7];
echo maxIncreasingSubarrays($nums2) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Precomputation**: The `$inc` array stores for each position `i`, the length of the strictly increasing sequence starting at `i`. This is computed by scanning from right to left.

2. **Binary Search**: I use binary search to find the maximum `k` between 1 and `n/2` (since we need two subarrays).

3. **Validation**: For each candidate `k`, I check if there exists a position `i` where both subarrays `[i, i+k-1]` and `[i+k, i+2k-1]` are strictly increasing by verifying that `inc[i] >= k` and `inc[i+k] >= k`.

**Time Complexity**: O(n log n)
- Precomputation: O(n)
- Binary search with validation: O(log n) × O(n) = O(n log n)

**Space Complexity**: O(n) for the `$inc` array

The solution efficiently finds the maximum `k` by leveraging binary search and precomputed increasing sequence lengths, making it suitable for large input sizes up to 2×10⁵.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**