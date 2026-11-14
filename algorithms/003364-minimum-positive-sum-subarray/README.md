3364\. Minimum Positive Sum Subarray

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Sliding Window`, `Prefix Sum`, `Weekly Contest 425`

You are given an integer array `nums` and **two** integers `l` and `r`. Your task is to find the **minimum** sum of a **subarray** whose size is between `l` and `r` (inclusive) and whose sum is greater than 0.

Return the **minimum** sum of such a subarray. If no such subarray exists, return -1.

A **subarray** is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [3, -2, 1, 4], l = 2, r = 3
- **Output:** 1
- **Explanation:**
  - The subarrays of length between `l = 2` and `r = 3` where the sum is greater than 0 are:
     - `[3, -2]` with a sum of 1
     - `[1, 4]` with a sum of 5
     - `[3, -2, 1]` with a sum of 2
     - `[-2, 1, 4]` with a sum of 3
  - Out of these, the subarray `[3, -2]` has a sum of 1, which is the smallest positive sum. Hence, the answer is 1.

**Example 2:**

- **Input:** nums = [-2, 2, -3, 1], l = 2, r = 3
- **Output:** -1
- **Explanation:** There is no subarray of length between `l` and `r` that has a sum greater than 0. So, the answer is -1.

**Example 3:**

- **Input:** nums = [1, 2, 3, 4], l = 2, r = 4
- **Output:** 3
- **Explanation:** The subarray `[1, 2]` has a length of 2 and the minimum sum greater than 0. So, the answer is 3.

**Example 4:**

- **Input:** nums = [1], l = 1, r = 1
- **Output:** 1

**Example 5:**

- **Input:** nums = [-1], l = 1, r = 1
- **Output:** -1

**Example 6:**

- **Input:** nums = [0, 0, 0], l = 1, r = 2
- **Output:** -1

**Example 7:**

- **Input:** nums = [2, -1, 2], l = 1, r = 2
- **Output:** 1

**Example 8:**

- **Input:** nums = [5, -4, 3], l = 1, r = 3
- **Output:** 1

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= l <= r <= nums.length`
- `-1000 <= nums[i] <= 1000`


**Hint:**

1. Check every subarray, since constraints are small.


**Similar Questions:**

1. [209. Minimum Size Subarray Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000209-minimum-size-subarray-sum)


**Solution:**

We solve this by using a **prefix sum array** and checking every subarray whose length is between `l` and `r`. Since `nums.length <= 100`, an `O(n²)` enumeration is small enough and easy to implement.

## Approach

- Build a prefix sum array where `prefix[i]` is the sum of `nums[0 ... i-1]`.
- For every starting index `start`, consider valid subarray lengths from `l` to `r`.
- Compute each subarray sum in `O(1)` using:
  - `sum = prefix[end + 1] - prefix[start]`
- If the sum is positive, update the minimum positive sum.
- If no valid positive-sum subarray is found, return `-1`.

Let's implement this solution in PHP: **[3364. Minimum Positive Sum Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003364-minimum-positive-sum-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $l
 * @param Integer $r
 * @return Integer
 */
function minimumSumSubarray(array $nums, int $l, int $r): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumSumSubarray([3, -2, 1, 4], 2, 3) . "\n";            // Output: 1
echo minimumSumSubarray([-2, 2, -3, 1], 2, 3) . "\n";           // Output: -1
echo minimumSumSubarray([1, 2, 3, 4], 2, 4) . "\n";             // Output: 3
echo minimumSumSubarray([1], 1, 1) . "\n";                      // Output: 1
echo minimumSumSubarray([-1], 1, 1) . "\n";                     // Output: -1
echo minimumSumSubarray([0, 0, 0], 1, 2) . "\n";                // Output: -1
echo minimumSumSubarray([2, -1, 2], 1, 2) . "\n";               // Output: 1
echo minimumSumSubarray([5, -4, 3], 1, 3) . "\n";               // Output: 1
?>
```

## Explanation

- The prefix sum array avoids recomputing subarray sums from scratch.
- The outer loop selects the subarray start position.
- The inner loop selects the subarray end position such that the length is within `[l, r]`.
- Only subarrays with sum greater than `0` are considered.
- The smallest such sum is tracked in `minSum`.
- Because the constraints are small, checking all valid subarrays is safe and simple.

## Complexity Analysis

- **Time Complexity:** `O(n * (r - l + 1))`, bounded by `O(n²)`.
- **Space Complexity:** `O(n)` for the prefix sum array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**