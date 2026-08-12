2958\. Length of Longest Subarray With at Most K Frequency

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Sliding Window`, `Biweekly Contest 119`

You are given an integer array `nums` and an integer `k`.

The **frequency** of an element `x` is the number of times it occurs in an array.

An array is called **good** if the frequency of each element in this array is **less than or equal** to `k`.

Return _the length of the **longest good** subarray of `nums`_.

A **subarray** is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,3,1,2,3,1,2], k = 2
- **Output:** 6
- **Explanation:** 
  - The longest possible good subarray is [1,2,3,1,2,3] since the values 1, 2, and 3 occur at most twice in this subarray. Note that the subarrays [2,3,1,2,3,1] and [3,1,2,3,1,2] are also good.
  - It can be shown that there are no good subarrays with length more than 6.

**Example 2:**

- **Input:** nums = [1,2,1,2,1,2,1,2], k = 1
- **Output:** 2
- **Explanation:** 
  - The longest possible good subarray is [1,2] since the values 1 and 2 occur at most once in this subarray. Note that the subarray [2,1] is also good.
  - It can be shown that there are no good subarrays with length more than 2.

**Example 3:**

- **Input:** nums = [5,5,5,5,5,5,5], k = 4
- **Output:** 4
- **Explanation:** 
  - The longest possible good subarray is [5,5,5,5] since the value 5 occurs 4 times in this subarray.
  - It can be shown that there are no good subarrays with length more than 4.

**Example 4:**

- **Input:** nums = [1,2,3,4,5], k = 1
- **Output:** 5

**Example 5:**

- **Input:** nums = [1], k = 1
- **Output:** 1

**Example 6:**

- **Input:** nums = [1,1,1,1], k = 4
- **Output:** 4

**Example 7:**

- **Input:** nums = [1,1,2,2,1,1,3,3,3], k = 2
- **Output:** 2

**Example 8:**

- **Input:** nums = [1000000000, 1000000000, 1000000000], k = 2
- **Output:** 2

**Example 9:**

- **Input:** nums = [1,2,1,3,2,1,4,3,2,1], k = 2
- **Output:** 6

**Example 10:**

- **Input:** nums = [1,1,1,1,1], k = 1
- **Output:** 1

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `1 <= k <= nums.length`


**Hint:**
1. For each index `i`, find the rightmost index `j >= i` such that the frequency of each element in the subarray `[i, j]` is at most `k`.
2. We can use 2 pointers / sliding window to achieve it.


**Similar Questions:**
1. [395. Longest Substring with At Least K Repeating Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00395-longest-substring-with-at-least-k-repeating-characters)


**Solution:**

We implemented a sliding window solution using two pointers to find the longest contiguous subarray where no element appears more than `k` times. By dynamically expanding the right pointer and shrinking the left pointer whenever a frequency constraint is violated, we maintain a valid window and track its maximum length in a single pass through the array.

## Approach

- **Sliding Window with Two Pointers** - We maintain a window `[left, right]` that always satisfies the "good" condition (all element frequencies ≤ k)
- **Frequency Tracking** - Use a hash map to count occurrences of each element in the current window
- **Expand Window** - Iterate the `right` pointer to include new elements
- **Shrink When Violated** - If adding a new element makes its frequency exceed `k`, move the `left` pointer forward, decrementing frequencies, until the window becomes valid again
- **Track Maximum** - After each valid window adjustment, compute the current window length and update the global maximum

Let's implement this solution in PHP: **[2958. Length of Longest Subarray With at Most K Frequency](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002958-length-of-longest-subarray-with-at-most-k-frequency/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxSubarrayLength(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSubarrayLength([1,2,3,1,2,3,1,2], 2) .  "\n";                           // Output: 6
echo maxSubarrayLength([1,2,1,2,1,2,1,2], 1) .  "\n";                           // Output: 2
echo maxSubarrayLength([5,5,5,5,5,5,5], 4) .  "\n";                             // Output: 4
echo maxSubarrayLength([1,2,3,4,5], 1) .  "\n";                                 // Output: 5
echo maxSubarrayLength([1], 1) .  "\n";                                         // Output: 1
echo maxSubarrayLength([1,1,1,1], 4) .  "\n";                                   // Output: 4
echo maxSubarrayLength([1,1,2,2,1,1,3,3,3], 2) .  "\n";                         // Output: 6
echo maxSubarrayLength([1000000000, 1000000000, 1000000000], 2) .  "\n";        // Output: 2
echo maxSubarrayLength([1,2,1,3,2,1,4,3,2,1], 2) .  "\n";                       // Output: 6
echo maxSubarrayLength([1,1,1,1,1], 1) .  "\n";                                 // Output: 1
?>
```

### Explanation:

- **Initialization**: Start with `left = 0`, empty frequency map, and `maxLength = 0`
- **Iteration**: For each `right` from 0 to n-1:
   - Add `nums[right]` to the frequency map, incrementing its count
   - Check if the newly added element now appears more than `k` times
   - If violation occurs, enter a `while` loop:
      - Remove the element at `left` from the frequency map
      - Decrement its count (or unset if it reaches 0)
      - Increment `left` by 1
      - Continue until the violating element's frequency is ≤ `k`
   - After ensuring the window is valid, calculate current length: `right - left + 1`
   - Update `maxLength` with the larger value
- **Return**: Final `maxLength` as the answer

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ - Each element is added to the window once and removed at most once, giving linear time
- **Space Complexity**: _**O(n)**_ - In the worst case, the frequency map may store up to n distinct elements

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**