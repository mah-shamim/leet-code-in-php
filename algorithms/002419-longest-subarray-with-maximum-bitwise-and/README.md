2419\. Longest Subarray With Maximum Bitwise AND

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Brainteaser`

You are given an integer array `nums` of size `n`.

Consider a **non-empty** subarray from nums that has the **maximum** possible **bitwise AND**.

- In other words, let `k` be the maximum value of the bitwise AND of **any** subarray of `nums`. Then, only subarrays with a bitwise AND equal to `k` should be considered.

Return _the length of the **longest** such subarray_.

The bitwise AND of an array is the bitwise AND of all the numbers in it.

A **subarray** is a contiguous sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,3,3,2,2]
- **Output:** 2
- **Explanation:**
  The maximum possible bitwise AND of a subarray is 3.\
  The longest subarray with that value is [3,3], so we return 2.

**Example 2:**

- **Input:** nums = [1,2,3,4]
- **Output:** 1
- **Explanation:**
  The maximum possible bitwise AND of a subarray is 4.\
  The longest subarray with that value is [4], so we return 1.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>1</sup5></code>
- <code>1 <= nums[i] <= 10<sup>6</sup></code>


**Hint:**
1. Notice that the bitwise AND of two different numbers will always be strictly less than the maximum of those two numbers.
2. What does that tell us about the nature of the subarray that we should choose?



**Solution:**

Let's first break down the problem step by step:

### Key Insights:
1. **Bitwise AND Properties**:
   - The bitwise AND of two numbers is generally smaller than or equal to both numbers.
   - Therefore, if we find a maximum value in the array, the subarray that will achieve this maximum bitwise AND value must consist of this maximum value repeated.

2. **Objective**:
   - Find the maximum value in the array.
   - Find the longest contiguous subarray of that maximum value, because any other number in the subarray would reduce the overall bitwise AND result.

### Plan:
1. Traverse the array and determine the maximum value.
2. Traverse the array again to find the longest contiguous subarray where all elements are equal to this maximum value.

### Example:
For the input array `[1,2,3,3,2,2]`, the maximum value is `3`. The longest contiguous subarray with only `3`s is `[3,3]`, which has a length of 2.

Let's implement this solution in PHP: **[2419. Longest Subarray With Maximum Bitwise AND](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002419-longest-subarray-with-maximum-bitwise-and/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestSubarray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1, 2, 3, 3, 2, 2];
$nums2 = [1, 2, 3, 4];

echo "Output for [1, 2, 3, 3, 2, 2]: " . longestSubarray($nums1) . "\n"; // Output: 2
echo "Output for [1, 2, 3, 4]: " . longestSubarray($nums2) . "\n";       // Output: 1
?>
```

### Explanation:

1. **Step 1**: We first find the maximum value in the array using PHP's built-in `max()` function.
2. **Step 2**: We initialize two variables, `$maxLength` to store the length of the longest subarray and `$currentLength` to track the length of the current contiguous subarray of the maximum value.
3. **Step 3**: We iterate through the array:
   - If the current number equals the maximum value, we increment the length of the current subarray.
   - If the current number does not equal the maximum value, we check if the current subarray is the longest so far and reset the length.
4. **Final Step**: After the loop, we ensure that if the longest subarray is at the end of the array, we still consider it.
5. Finally, we return the length of the longest subarray that contains only the maximum value.

### Time Complexity:
- Finding the maximum value takes \(O(n)\).
- Traversing the array to find the longest subarray takes \(O(n)\).
- Overall time complexity: \(O(n)\), where \(n\) is the length of the array.

### Test Cases:
For the input `[1, 2, 3, 3, 2, 2]`, the output is `2`, and for `[1, 2, 3, 4]`, the output is `1`, as expected.

This solution handles the constraints and efficiently solves the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
