3689\. Maximum Total Subarray Value I

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Greedy`, `Weekly Contest 468`

You are given an integer array `nums` of length `n` and an integer `k`.

You need to choose **exactly** `k` non-empty subarrays[^1] `nums[l..r]` of `nums`. Subarrays may overlap, and the exact same subarray (same `l` and `r`) **can** be chosen more than once.

The **value** of a subarray `nums[l..r]` is defined as: `max(nums[l..r]) - min(nums[l..r])`.

The **total value** is the sum of the **values** of all chosen subarrays.

Return the **maximum** possible total value you can achieve.

[^1]: **Subarray**: A **subarray** is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,3,2], k = 2
- **Output:** 4
- **Explanation:**
   - One optimal approach is:
     - Choose `nums[0..1] = [1, 3]`. The maximum is 3 and the minimum is 1, giving a value of `3 - 1 = 2`.
     - Choose `nums[0..2] = [1, 3, 2]`. The maximum is still 3 and the minimum is still 1, so the value is also `3 - 1 = 2`.
   - Adding these gives 2 + 2 = 4.

**Example 2:**

- **Input:** nums = [4,2,5,1], k = 3
- **Output:** 12
- **Explanation:**
  - One optimal approach is:
    - Choose `nums[0..3] = [4, 2, 5, 1]`. The maximum is 5 and the minimum is 1, giving a value of `5 - 1 = 4`.
    - Choose `nums[0..3] = [4, 2, 5, 1]`. The maximum is 5 and the minimum is 1, so the value is also `4`.
    - Choose `nums[2..3] = [5, 1]`. The maximum is 5 and the minimum is 1, so the value is again `4`.
  - Adding these gives 4 + 4 + 4 = 12.

**Example 3:**

- **Input:** nums = [5, 5, 5], k = 10
- **Output:** 0

**Example 4:**

- **Input:** nums = [0], k = 100000
- **Output:** 0

**Constraints:**

- `1 <= n == nums.length <= 5 * 10⁴`
- `0 <= nums[i] <= 10⁹`
- `1 <= k <= 10⁵`



**Hint:**
1. Choose the whole subarray `k` times.






**Solution:**

The problem asks for the maximum total value achievable by choosing exactly `k` non-empty subarrays (possibly overlapping or identical) from the array, where a subarray's value is defined as `max(subarray) - min(subarray)`. The key insight is that the maximum possible value for any subarray is the difference between the global maximum and global minimum of the entire array. Since subarrays can be repeated, the optimal strategy is to repeatedly pick the whole array (or any subarray that spans the global max and min) `k` times, giving a total value of `k * (global_max - global_min)`.

### Approach:

- **Observation:** The value of any subarray cannot exceed `max(nums) - min(nums)` because the maximum and minimum of any subarray are bounded by the global max and min of `nums`.
- **Achievability:** The whole array itself achieves exactly `global_max - global_min`.
- **Repetition:** Since subarrays can be chosen more than once (including the exact same subarray), we can simply pick the whole array `k` times.
- **Result:** Therefore, the maximum total value is `k * (global_max - global_min)`.

Let's implement this solution in PHP: **[3689. Maximum Total Subarray Value I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003689-maximum-total-subarray-value-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return float|int
 */
function maxTotalValue(array $nums, int $k): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxTotalValue([1,3,2], 2) . "\n";              // Output: 4
echo maxTotalValue([4,2,5,1], 3) . "\n";            // Output: 12
echo maxTotalValue([5, 5, 5], 10) . "\n";           // Output: 0
echo maxTotalValue([0], 100000) . "\n";             // Output: 0
?>
```

### Explanation:

- The value of a subarray is `max - min`. The maximum possible `max` is the global maximum, and the minimum possible `min` is the global minimum. Hence, no subarray can have a value greater than `global_max - global_min`.
- The entire array `nums[0..n-1]` has exactly `global_max - global_min` as its value.
- Because we can choose the same subarray multiple times, we simply choose the entire array `k` times.
- Thus, the maximum total value is `k * (global_max - global_min)`.

### Complexity
- **Time Complexity**: _**O(n)**_ — one pass to find the min and max of the array.
- **Space Complexity**: _**O(1)**_ — only a few variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**