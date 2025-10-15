3349\. Adjacent Increasing Subarrays Detection I

**Difficulty:** Easy

**Topics:** `Array`, `Weekly Contest 423`

Given an array `nums` of `n` integers and an integer `k`, determine whether there exist **two adjacent** subarrays[^1] of length `k` such that both subarrays are **strictly increasing**. Specifically, check if there are **two** subarrays starting at indices `a` and `b` (`a < b`), where:

- Both subarrays `nums[a..a + k - 1]` and `nums[b..b + k - 1]` are strictly increasing.
- The subarrays must be **adjacent**, meaning `b = a + k`.

Return `true` if it is possible to find **two** such subarrays, and `false` otherwise.

**Example 1:**

- **Input:** nums = [2,5,7,8,9,2,3,4,3,1], k = 3
- **Output:** true
- **Explanation:**
  - The subarray starting at index `2` is `[7, 8, 9]`, which is strictly increasing.
  - The subarray starting at index `5` is `[2, 3, 4]`, which is also strictly increasing.
  - These two subarrays are adjacent, so the result is `true`.


**Example 2:**

- **Input:** nums = [1,2,3,4,4,4,4,5,6,7], k = 5
- **Output:** false

**Constraints:**

- `2 <= nums.length <= 100`
- `1 < 2 * k <= nums.length`
- `-1000 <= nums[i] <= 1000`



**Hint:**
1. Store the longest decreasing subarray starting and ending at an index.



[^1]: **Subarray** A **subarray** is a contiguous **non-empty** sequence of elements within an array.


**Solution:**

We need to find two adjacent strictly increasing subarrays of length k in the given array.

### Approach:

1. **Problem Analysis:** We need to find two adjacent strictly increasing subarrays of length `k` in the given array. The subarrays must be adjacent, meaning the second subarray starts immediately after the first one ends.
2. **Key Insight:** For each possible starting index `i`, check if the subarray from `i` to `i + k - 1` is strictly increasing. Then, check the adjacent subarray from `i + k` to `i + 2k - 1` for the same property.
3. **Efficiency:** Since the constraints are small (array length ≤ 100), we can check each possible pair of adjacent subarrays directly without complex optimizations.

Let's implement this solution in PHP: **[3349. Adjacent Increasing Subarrays Detection I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003349-adjacent-increasing-subarrays-detection-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Boolean
 */
function hasIncreasingSubarrays($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums = array(2, 5, 7, 8, 9, 2, 3, 4, 3, 1);
$k = 3;
var_export(hasIncreasingSubarrays($nums, $k));
// Output: true

echo "\n";

// Example 2
$nums = array(1, 2, 3, 4, 4, 4, 4, 5, 6, 7);
$k = 5;
var_export(hasIncreasingSubarrays($nums, $k));
// Output: false
?>
```

### Explanation:

1. **Loop Through Possible Starting Indices:** The outer loop iterates over all possible starting indices `i` where the first subarray can begin, ensuring there's enough space for two adjacent subarrays of length `k`.
2. **Check First Subarray:** For each `i`, check if the subarray from `i` to `i + k - 1` is strictly increasing by verifying each element is less than the next.
3. **Check Second Subarray:** If the first subarray is valid, check the adjacent subarray from `i + k` to `i + 2k - 1` for the same strictly increasing property.
4. **Return Result:** If both subarrays are valid, return `true` immediately. If no such pair is found after checking all possibilities, return `false`.

This approach efficiently checks all possible pairs of adjacent subarrays, ensuring correctness with a straightforward implementation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**