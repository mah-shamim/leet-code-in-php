2401\. Longest Nice Subarray

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Sliding Window`

You are given an array `nums` consisting of **positive** integers.

We call a subarray of `nums` **nice** if the bitwise **AND** of every pair of elements that are in **different** positions in the subarray is equal to `0`.

Return _the length of the **longest** nice subarray_.

A **subarray** is a **contiguous** part of an array.

**Note** that subarrays of length `1` are always considered nice.

**Example 1:**

- **Input:** nums = [1,3,8,48,10]
- **Output:** 3
- **Explanation:** The longest nice subarray is [3,8,48]. This subarray satisfies the conditions:
  - 3 AND 8 = 0.
  - 3 AND 48 = 0.
  - 8 AND 48 = 0.
    It can be proven that no longer nice subarray can be obtained, so we return 3.

**Example 2:**

- **Input:** nums = [3,1,5,11,13]
- **Output:** 1
- **Explanation:** The length of the longest nice subarray is 1. Any subarray of length 1 can be chosen.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. What is the maximum possible length of a nice subarray?
2. If two numbers have bitwise AND equal to zero, they do not have any common set bit. A number <code>x <= 10<sup>9</sup></code> only has 30 bits, hence the length of the longest nice subarray cannot exceed 30.



**Solution:**

We need to find the longest contiguous subarray (nice subarray) where the bitwise AND of every pair of elements in different positions is zero. This means that each element in the subarray must not share any common set bits with any other element in the subarray.

### Approach
1. **Bitwise Constraints**: For a subarray to be nice, each bit in the binary representation of the elements can be set in at most one element. This ensures that the bitwise AND of any two elements in the subarray is zero.
2. **Sliding Window Technique**: We use a sliding window approach to maintain the longest valid subarray. The window is defined by two pointers, `left` and `right`, which represent the current subarray being checked.
3. **Track Last Occurrence of Bits**: We maintain an array `last_occurrence` to keep track of the last index where each bit (from 0 to 30) was set. This helps in efficiently adjusting the left pointer when a conflict (overlapping bits) is detected.
4. **Adjusting the Window**: For each new element, we check all its set bits. If a bit was previously set within the current window, we adjust the left pointer to exclude the conflicting element. This ensures the window remains valid.

Let's implement this solution in PHP: **[2401. Longest Nice Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002401-longest-nice-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestNiceSubarray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1,3,8,48,10];
echo longestNiceSubarray($nums1) . "\n"; // Output: 3

$nums2 = [3,1,5,11,13];
echo longestNiceSubarray($nums2) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Initialization**: We initialize an array `last_occurrence` to track the last occurrence of each bit (0 to 30) and set it to -1 initially. The `left` pointer starts at 0, and `max_len` is initialized to 1 since a single element is always a valid subarray.
2. **Iterate Over Elements**: For each element (using the `right` pointer), we check each bit (0 to 30) to see if it is set.
3. **Adjust Left Pointer**: If a bit is set and its last occurrence is within the current window (i.e., `last_occurrence[bit] >= left`), we move the `left` pointer to exclude the conflicting element.
4. **Update Last Occurrence**: After checking all bits of the current element, we update the `last_occurrence` array for the bits that are set in the current element.
5. **Update Maximum Length**: After adjusting the window, we update the maximum length of the valid subarray found so far.

This approach efficiently tracks the valid subarray using a sliding window and bitwise operations, ensuring a time complexity of O(n * 31), which simplifies to O(n) and is optimal for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**