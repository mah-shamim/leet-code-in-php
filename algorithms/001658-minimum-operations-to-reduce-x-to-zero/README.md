1658\. Minimum Operations to Reduce X to Zero

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Binary Search`, `Sliding Window`, `Prefix Sum`, `Weekly Contest 215`

You are given an integer array `nums` and an integer `x`. In one operation, you can either remove the leftmost or the rightmost element from the array `nums` and subtract its value from `x`. Note that this **modifies** the array for future operations.

Return _the **minimum number** of operations to reduce `x` to **exactly** `0` if it is possible, otherwise, return `-1`_.

**Example 1:**

- **Input:** nums = [1,1,4,2,3], x = 5
- **Output:** 2
- **Explanation:** The optimal solution is to remove the last two elements to reduce x to zero.

**Example 2:**

- **Input:** nums = [5,6,7,8,9], x = 4
- **Output:** -1

**Example 3:**

- **Input:** nums = [3,2,20,1,1,3], x = 10
- **Output:** 5
- **Explanation:** The optimal solution is to remove the last three elements and the first two elements (5 operations in total) to reduce x to zero.

**Example 4:**

- **Input:** nums = [1,2,3], x = 6
- **Output:** 3

**Example 5:**

- **Input:** nums = [1,2,3], x = 3
- **Output:** 1

**Example 6:**

- **Input:** nums = [1,2,3], x = 4
- **Output:** 2

**Example 7:**

- **Input:** nums = [1,1,1,1], x = 2
- **Output:** 2

**Example 8:**

- **Input:** nums = [1,2,3,4,5], x = 15
- **Output:** 5

**Example 9:**

- **Input:** nums = [1,2,3,4,5], x = 100
- **Output:** -1

**Example 10:**

- **Input:** nums = [2], x = 2
- **Output:** 1

**Example 11:**

- **Input:** nums = [2], x = 3
- **Output:** -1

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁴`
- `1 <= x <= 10⁹`


**Hint:**

1. Think in reverse; instead of finding the minimum prefix + suffix, find the maximum subarray.
2. Finding the maximum subarray is standard and can be done greedily.


**Similar Questions:**

1. [209. Minimum Size Subarray Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00209-minimum-size-subarray-sum)
2. [560. Subarray Sum Equals K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00560-subarray-sum-equals-k)
3. [2059. Minimum Operations to Convert Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002059-minimum-operations-to-convert-number)
4. [2171. Removing Minimum Number of Magic Beans](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002171-removing-minimum-number-of-magic-beans)
5. [2749. Minimum Operations to Make the Integer Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002749-minimum-operations-to-make-the-integer-zero)


**Solution:**

We solve this by reversing the problem: removing elements from both ends with sum `x` is equivalent to keeping one contiguous middle subarray with sum `total - x`. So we find the longest middle subarray whose sum is `total - x` using a sliding window. The minimum operations is then `n - maxLength`, or `-1` if no such subarray exists.

## Approach

- Compute `total = array_sum(nums)`.
- Set `target = total - x`.
- If `target < 0`, return `-1` because even removing all elements cannot reduce `x` to zero.
- If `target == 0`, return `n` because all elements must be removed.
- Use a sliding window with `left`, `right`, and `sum`.
- Expand `right` and add `nums[right]` to `sum`.
- While `sum > target`, shrink the window from `left`.
- When `sum == target`, update the maximum middle subarray length.
- Return `n - maxLength` if `maxLength > 0`; otherwise return `-1`.

Let's implement this solution in PHP: **[1658. Minimum Operations to Reduce X to Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001658-minimum-operations-to-reduce-x-to-zero/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $x
 * @return Integer
 */
function minOperations(array $nums, $x): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minOperations([1,1,4,2,3], 5) .  "\n";         // Output: 2
echo minOperations([5,6,7,8,9], 4) .  "\n";         // Output: -1
echo minOperations([3,2,20,1,1,3], 10) .  "\n";     // Output: 5
echo minOperations([1,2,3], 6) .  "\n";             // Output: 3
echo minOperations([1,2,3], 3) .  "\n";             // Output: 1
echo minOperations([1,2,3], 4) .  "\n";             // Output: 2
echo minOperations([1,1,1,1], 2) .  "\n";           // Output: 2
echo minOperations([1,2,3,4,5], 15) .  "\n";        // Output: 5
echo minOperations([1,2,3,4,5], 100) .  "\n";       // Output: -1
echo minOperations([2], 2) .  "\n";                 // Output: 1
echo minOperations([2], 3) .  "\n";                 // Output: -1
?>
```

### Explanation:

- Each operation removes either the leftmost or rightmost element.
- After all operations, the remaining untouched elements form a contiguous subarray in the middle.
- The removed elements must sum to `x`.
- Therefore, the kept middle subarray must sum to `total - x`.
- Minimizing operations means maximizing the length of this kept middle subarray.
- Since all `nums[i]` are positive, a sliding window can efficiently find the longest subarray with the required sum.
- If no such subarray exists, it is impossible to reduce `x` to exactly `0`.

## Complexity Analysis

- Time Complexity: `O(n)` — each element is added to and removed from the sliding window at most once.
- Space Complexity: `O(1)` — only a few variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**