3737\. Count Subarrays With Majority Element I

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Divide and Conquer`, `Segment Tree`, `Merge Sort`, `Counting`, `Prefix Sum`, `Biweekly Contest 169`

You are given an integer array `nums` and an integer `target`.

Return the number of **subarrays[^1]** of `nums` in which `target` is the **majority element**.

The **majority element** of a subarray is the element that appears **strictly more than half** of the times in that subarray.

[^1]: **Subarray:** A subarray is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,2,3], target = 2
- **Output:** 5
- **Explanation:**
   - Valid subarrays with `target = 2` as the majority element:
     - `nums[1..1] = [2]`
     - `nums[2..2] = [2]`
     - `nums[1..2] = [2,2]`
     - `nums[0..2] = [1,2,2]`
     - `nums[1..3] = [2,2,3]`
   - So there are 5 such subarrays.

**Example 2:**

- **Input:** nums = [1,1,1,1], target = 1
- **Output:** 10
- **Explanation:** All 10 subarrays have 1 as the majority element.

**Example 3:**

- **Input:** nums = [1,2,3], target = 4
- **Output:** 0
- **Explanation:** `target = 4` does not appear in `nums` at all. Therefore, there cannot be any subarray where 4 is the majority element. Hence the answer is 0.

**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 10⁹`
- `1 <= target <= 10⁹`


**Hint:**
1. Use brute force
2. Count all subarrays where `2 * count(target) > length`


**Solution:**

We have developed an efficient brute-force solution that counts all subarrays where a given `target` appears as the majority element. Our approach iterates through every possible subarray, maintains a running count of `target` occurrences, and checks the majority condition using integer arithmetic to avoid floating-point precision issues. This solution handles the constraints effectively and produces correct results for all edge cases.

## Approach

- **Iterate all starting positions**: For each index `i` in the array, we consider all subarrays that begin at `i`.
- **Expand subarrays**: For each starting index `i`, we extend the subarray to every possible ending index `j` (from `i` to `n-1`).
- **Maintain running statistics**: Keep track of:
   - `targetCount`: number of times `target` appears in the current subarray
   - `length`: total number of elements in the current subarray
- **Check majority condition**: After adding each new element, verify if `targetCount * 2 > length`. This condition is equivalent to `targetCount > length / 2` and avoids floating-point division.
- **Count valid subarrays**: Increment the answer counter whenever the majority condition is satisfied.

Let's implement this solution in PHP: **[3737. Count Subarrays With Majority Element I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003737-count-subarrays-with-majority-element-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function countMajoritySubarrays(array $nums, int $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countMajoritySubarrays([1,2,2,3], 2) . "\n"; // Output: 5
echo countMajoritySubarrays([1,1,1,1], 1) . "\n"; // Output: 10
echo countMajoritySubarrays([1,2,3], 4) . "\n";   // Output: 0
?>
```

### Explanation:

- **Brute-force strategy**: Since the maximum array length is 1000, the total number of subarrays is at most 500,500, which is well within computational limits for PHP. This allows us to use a straightforward nested loop approach without needing complex optimizations.
- **Running count technique**: Instead of recomputing counts for each subarray from scratch, we maintain a cumulative count as we extend the subarray to the right. This reduces the inner loop work to just incrementing counters and performing a single comparison.
- **Integer comparison trick**: The condition `targetCount * 2 > length` is mathematically equivalent to `targetCount > length / 2`. We use multiplication by 2 instead of division to avoid floating-point arithmetic and maintain precision with integer operations.
- **All subarrays are considered**: Our double loop systematically examines every contiguous non-empty sequence, ensuring no valid subarray is missed.
- **Zero-count handling**: When `target` doesn't appear in the array, `targetCount` remains 0 throughout all iterations, so no subarray satisfies the majority condition, correctly yielding 0.

## Complexity Analysis

- **Time Complexity**: **O(n²)** where `n` is the length of `nums`. The outer loop runs `n` times, and the inner loop runs `n-i` times for each `i`, resulting in `n(n+1)/2` iterations total. For `n = 1000`, this is approximately 500,500 operations, which is efficient.
- **Space Complexity**: **O(1)** — We only use a constant amount of extra space for variables (`count`, `targetCount`, `length`, loop indices). No additional data structures are allocated that scale with input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**