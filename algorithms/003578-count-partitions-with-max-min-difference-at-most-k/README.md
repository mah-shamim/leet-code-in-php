3578\. Count Partitions With Max-Min Difference at Most K

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Queue`, `Sliding Window`, `Prefix Sum`, `Monotonic Queue`, `Weekly Contest 453`

You are given an integer array `nums` and an integer `k`. Your task is to partition `nums` into one or more **non-empty** contiguous segments such that in each segment, the difference between its **maximum** and **minimum** elements is **at most** `k`.

Return the total number of ways to partition `nums` under this condition.

Since the answer may be too large, return it **modulo** `10⁹ + 7`.

**Example 1:**

- **Input:** nums = [9,4,1,3,7], k = 4
- **Output:** 6
- **Explanation:** There are 6 valid partitions where the difference between the maximum and minimum elements in each segment is at most `k = 4`:
  - `[[9], [4], [1], [3], [7]]`
  - `[[9], [4], [1], [3, 7]]`
  - `[[9], [4], [1, 3], [7]]`
  - `[[9], [4, 1], [3], [7]]`
  - `[[9], [4, 1], [3, 7]]`
  - `[[9], [4, 1, 3], [7]]`


**Example 2:**

- **Input:** nums = [3,3,4], k = 0
- **Output:** 2
- **Explanation:** There are 2 valid partitions that satisfy the given conditions:
  - `[[3], [3], [4]]`
  - `[[3, 3], [4]]`


**Constraints:**

- `2 <= nums.length <= 5 * 10⁴`
- `1 <= nums[i] <= 10⁹`
- `0 <= k <= 10⁹`



**Hint:**
1. Use dynamic programming.
2. Let `dp[idx]` be the count of ways to partition the array with the last partition ending at index `idx`.
3. Try using a sliding window; we can track the minimum and maximum in the window using deques.



**Similar Questions:**
1. [2518. Number of Great Partitions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002518-number-of-great-partitions)






**Solution:**

We need to count the number of ways to partition an array into contiguous segments where each segment's (max - min) ≤ k.
We need to count partitions where for each segment:
- max(segment) - min(segment) ≤ k

This is a dynamic programming problem where:
- `dp[i]` = number of valid partitions ending at index i
- The transition is: `dp[i] = sum(dp[j-1])` for all j ≤ i where segment [j, i] is valid

## Approach

We can solve this using:
1. **Dynamic Programming** to count ways
2. **Sliding Window** to find valid segments
3. **Two Monotonic Queues** to track min and max in current window
4. **Prefix Sum** to efficiently compute sums of dp values

### Key Insight
For position `i`, we need to find the leftmost index `left` such that all segments ending at `i` starting from `left` to `i` are valid. Then:
- `dp[i] = sum(dp[left-1] to dp[i-1])` (with base case dp[-1] = 1)

Let's implement this solution in PHP: **[3578. Count Partitions With Max-Min Difference at Most K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003578-count-partitions-with-max-min-difference-at-most-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function countPartitions($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countPartitions([9,4,1,3,7], 4) . "\n";    // Output: 6
echo countPartitions([3,3,4], 0) . "\n";        // Output: 2
?>
```

### Explanation:

1. **Monotonic Deques**:
    - `minDeque` maintains indices with increasing values (minimum at front)
    - `maxDeque` maintains indices with decreasing values (maximum at front)

2. **Sliding Window**:
    - `left` is the start of the current valid window
    - For each `right`, we expand and maintain the deques
    - If `max - min > k`, we increment `left` and remove outdated indices from deques

3. **Dynamic Programming**:
    - `dp[i]` = sum of all `dp[j]` where `j < i` and segment `[j+1, i]` is valid
    - Using prefix sums allows O(1) computation of this sum

4. **Base Case**:
    - An empty array has 1 valid partition (doing nothing)
    - Represented as `dp[-1] = 1` or `prefixSum[0] = 1`

### Time Complexity: O(n)
- Each element is pushed and popped from the deques at most once
- We traverse the array once with the sliding window

### Space Complexity: O(n)
- For dp array, prefix sum array, and the two deques

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**