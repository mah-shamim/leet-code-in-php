1749\. Maximum Absolute Sum of Any Subarray

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

You are given an integer array `nums`. The **absolute sum** of a subarray <code>[nums<sub>l</sub>, nums<sub>l+1</sub>, ..., nums<sub>r-1</sub>, nums<sub>r</sub>]</code> is <code>abs(nums<sub>l</sub> + nums<sub>l+1</sub> + ... + nums<sub>r-1</sub> + nums<sub>r</sub>)</code>.

Return _the **maximum** absolute sum of any (**possibly empty**) subarray of `nums`_.

Note that `abs(x)` is defined as follows:

- If `x` is a negative integer, then `abs(x) = -x`.
- If `x` is a non-negative integer, then `abs(x) = x`.


**Example 1:**

- **Input:** nums = [1,-3,2,3,-4]
- **Output:** 5
- **Explanation:** The subarray [2,3] has absolute sum = abs(2+3) = abs(5) = 5.

**Example 2:**

- **Input:** nums = [2,-5,1,-4,3,-2]
- **Output:** 8
- **Explanation:** The subarray [-5,1,-4] has absolute sum = abs(-5+1-4) = abs(-8) = 8.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>-10<sup>4</sup> <= nums[i] <= 10<sup>4</sup></code>


**Hint:**
1. What if we asked for maximum sum, not absolute sum?
2. It's a standard problem that can be solved by Kadane's algorithm.
3. The key idea is the max absolute sum will be either the max sum or the min sum.
4. So just run kadane twice, once calculating the max sum and once calculating the min sum.



**Solution:**

We need to find the maximum absolute sum of any subarray (which can be empty) in a given array of integers. The key insight is that the maximum absolute sum can come from either the maximum subarray sum or the minimum subarray sum, considering their absolute values.

### Approach
1. **Kadane's Algorithm for Maximum Subarray Sum**: This algorithm helps find the maximum sum of any non-empty subarray. We then compare this maximum sum with 0 (the sum of the empty subarray) to determine the overall maximum sum, including the empty subarray.
2. **Modified Kadane's Algorithm for Minimum Subarray Sum**: Similarly, we use a modified version of Kadane's algorithm to find the minimum sum of any non-empty subarray. We compare this minimum sum with 0 to determine the overall minimum sum, including the empty subarray.
3. **Calculate Absolute Values**: The maximum absolute sum will be the maximum of the absolute values of the overall maximum and minimum sums.

Let's implement this solution in PHP: **[1749. Maximum Absolute Sum of Any Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001749-maximum-absolute-sum-of-any-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxAbsoluteSum($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1,-3,2,3,-4];
echo maxAbsoluteSum($nums1) . "\n"; // Output: 5

$nums2 = [2,-5,1,-4,3,-2];
echo maxAbsoluteSum($nums2) . "\n"; // Output: 8
?>
```

### Explanation:

1. **Maximum Subarray Sum**: Using Kadane's algorithm, we iterate through the array while maintaining the current maximum subarray sum ending at each position. The global maximum is updated whenever a larger sum is found. After processing all elements, we compare this global maximum with 0 (the sum of an empty subarray) to get the overall maximum sum.
2. **Minimum Subarray Sum**: Similarly, we use a modified version of Kadane's algorithm to track the minimum subarray sum. After processing all elements, we compare this global minimum with 0 to get the overall minimum sum.
3. **Result Calculation**: The result is the maximum of the absolute values of the overall maximum and minimum sums, which gives the maximum absolute sum of any subarray (including the empty subarray).

This approach efficiently computes the required values in linear time, making it suitable for large input arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**