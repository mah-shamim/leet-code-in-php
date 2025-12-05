3432\. Count Partitions with Even Sum Difference

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Prefix Sum`, `Weekly Contest 434`

You are given an integer array `nums` of length `n`.

A **partition** is defined as an index `i` where `0 <= i < n - 1`, splitting the array into two **non-empty** subarrays such that:

- Left subarray contains indices `[0, i]`.
- Right subarray contains indices `[i + 1, n - 1]`.

Return the number of **partitions** where the **difference** between the **sum** of the left and right subarrays is **even**.

**Example 1:**

- **Input:** nums = [10,10,3,7,6]
- **Output:** 4
- **Explanation:** The 4 partitions are:
    - `[10]`, `[10, 3, 7, 6]` with a sum difference of `10 - 26 = -16`, which is even.
    - `[10, 10]`, `[3, 7, 6]` with a sum difference of `20 - 16 = 4`, which is even.
    - `[10, 10, 3]`, `[7, 6]` with a sum difference of `23 - 13 = 10`, which is even.
    - `[10, 10, 3, 7]`, `[6]` with a sum difference of `30 - 6 = 24`, which is even.


**Example 2:**

- **Input:** nums = [1,2,2]
- **Output:** 0
- **Explanation:** No partition results in an even sum difference.

**Example 3:**

- **Input:** nums = [2,4,6,8]
- **Output:** 3
- **Explanation:** All partitions result in an even sum difference.

**Constraints:**

- `2 <= n == nums.length <= 100`
- `1 <= nums[i] <= 100`



**Hint:**
1. If the parity of the sum is even, the partition is valid; otherwise, there is no partition.






**Solution:**

We notice there's a critical flaw in the reasoning. Let me provide a corrected approach:

### Approach:

1. Compute the total sum of the array
2. Track the left sum as we iterate through possible partition points
3. For each partition, calculate the right sum as total sum minus left sum
4. Check if the absolute difference between left and right sums is even
5. Count valid partitions

Let's implement this solution in PHP: **[3432. Count Partitions with Even Sum Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003432-count-partitions-with-even-sum-difference/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countPartitions($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countPartitions([10,10,3,7,6]) . "\n";     // Output: 4
echo countPartitions([1,2,2]) . "\n";           // Output: 0
echo countPartitions([2,4,6,8]) . "\n";         // Output: 3
?>
```

### Explanation:

1. The problem asks for partitions where the difference between left and right sums is even
2. We need to consider all possible split points from index 0 to n-2
3. For each split point i:
    - Left sum = sum of elements from index 0 to i
    - Right sum = total sum - left sum
    - Difference = left sum - right sum (or absolute value)
    - Check if difference is even
4. Count all such partitions

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**