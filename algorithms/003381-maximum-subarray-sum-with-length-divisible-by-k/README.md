3381\. Maximum Subarray Sum With Length Divisible by K

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Prefix Sum`, `Weekly Contest 427`

You are given an array of integers `nums` and an integer `k`.

Return the **maximum** sum of a subarray[^1] of `nums`, such that the size of the subarray is **divisible** by `k`.

**Example 1:**

- **Input:** nums = [1,2], k = 1
- **Output:** 3
- **Explanation:** The subarray `[1, 2]` with sum 3 has length equal to 2 which is divisible by 1.

**Example 2:**

- **Input:** nums = [-1,-2,-3,-4,-5], k = 4
- **Output:** -10
- **Explanation:** The maximum sum subarray is `[-1, -2, -3, -4]` which has length equal to 4 which is divisible by 4.

**Example 3:**

- **Input:** nums = [-5,1,2,-3,4], k = 2
- **Output:** 4
- **Explanation:** The maximum sum subarray is `[1, 2, -3, 4]` which has length equal to 4 which is divisible by 2.

**Constraints:**

- `1 <= k <= nums.length <= 2 * 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`



**Hint:**
1. Maintain minimum prefix sum ending at every possible `index%k`.



**Similar Questions:**
1. [974. Subarray Sums Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000974-subarray-sums-divisible-by-k)


[^1]: **Subarray**: A **subarray** is a contiguous **non-empty** sequence of elements within an array.



**Solution:**

We have two prefix sums at indices `i` and `j` where `(i % k) == (j % k)`, then the subarray from `i+1` to `j` has length `(j - i)` which is divisible by `k`. This is because:
- `i % k == j % k` implies `(j - i) % k == 0`

### Approach:

- **Prefix Sum Technique**: Calculate cumulative sums while iterating through the array
- **Modulo Tracking**: Use the remainder when dividing indices by k to group positions
- **Minimum Prefix Storage**: Maintain the smallest prefix sum for each modulo group
- **Subarray Length Control**: Ensure subarray length is divisible by k through modulo arithmetic
- **Optimal Update Strategy**: Update answer by comparing current prefix minus minimum prefix in same modulo group

Let's implement this solution in PHP: **[3381. Maximum Subarray Sum With Length Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003381-maximum-subarray-sum-with-length-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxSubarraySum($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSubarraySum([1,2], 1) . "\n";               // Output: 3
echo maxSubarraySum([-1,-2,-3,-4,-5], 4) . "\n";    // Output: -10
echo maxSubarraySum([-5,1,2,-3,4], 2) . "\n";       // Output: 4
?>
```

### Explanation:

- **Prefix Sum Array**: We compute running totals to efficiently calculate subarray sums
- **Modulo Grouping**: Positions with same `i % k` form valid subarray endpoints when paired
- **Minimum Tracking**: For each modulo group, store the smallest prefix sum encountered
- **Subarray Validation**: When `(current_index - min_index) % k == 0`, the subarray length is divisible by k
- **Answer Calculation**: Maximum sum = current prefix - minimum prefix in same modulo group

### Complexity

- **Time**: O(n) - Single pass through the array
- **Space**: O(k) - Storage for k modulo groups regardless of input size

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**