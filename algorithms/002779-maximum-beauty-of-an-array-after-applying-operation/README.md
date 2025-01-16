2779\. Maximum Beauty of an Array After Applying Operation

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Sliding Window`, `Sorting`

You are given a **0-indexed** array `nums` and a **non-negative** integer `k`.

In one operation, you can do the following:

- Choose an index `i` that **hasn't been chosen before** from the range `[0, nums.length - 1]`.
- Replace `nums[i]` with any integer from the range `[nums[i] - k, nums[i] + k]`.

The **beauty** of the array is the length of the longest subsequence consisting of equal elements.

Return _the **maximum** possible beauty of the array `nums` after applying the operation any number of times_.

**Note** that you can apply the operation to each index only once.

A **subsequence** of an array is a new array generated from the original array by deleting some elements (possibly none) without changing the order of the remaining elements.

**Example 1:**

- **Input:** nums = [4,6,1,2], k = 2
- **Output:** 3
- **Explanation:** In this example, we apply the following operations:
  - Choose index 1, replace it with 4 (from range [4,8]), nums = [4,4,1,2].
  - Choose index 3, replace it with 4 (from range [0,4]), nums = [4,4,1,4].
    After the applied operations, the beauty of the array nums is 3 (subsequence consisting of indices 0, 1, and 3).
    It can be proven that 3 is the maximum possible length we can achieve.

**Example 2:**

- **Input:** nums = [1,1,1,1], k = 10
- **Output:** 4
- **Explanation:** In this example we don't have to apply any operations.
  The beauty of the array nums is 4 (whole array).


**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i], k <= 10<sup>5</sup></code>


**Hint:**
1. Sort the array.
2. The problem becomes the following: find maximum subarray A[i … j] such that A[j] - A[i] ≤ 2 * k.



**Solution:**

We can utilize sorting and a sliding window approach.

### Approach:
1. **Sort the array**: Sorting simplifies identifying subsequences where the difference between the largest and smallest element does not exceed _**2k**_.
2. **Sliding window technique**: Maintain a window of indices _**[i, j]**_ where the difference _**nums[j] - nums[i] <= 2k**_. Adjust _**i**_ or _**j**_ to maximize the window size.

Let's implement this solution in PHP: **[2779. Maximum Beauty of an Array After Applying Operation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002779-maximum-beauty-of-an-array-after-applying-operation/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maximumBeauty($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage:
$nums1 = [4, 6, 1, 2];
$k1 = 2;
echo maximumBeauty($nums1, $k1) . "\n"; // Output: 3

$nums2 = [1, 1, 1, 1];
$k2 = 10;
echo maximumBeauty($nums2, $k2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Sorting the Array**:
   - Sorting ensures that the window defined by indices _**[i, j]**_ has all elements in increasing order, which makes it easier to check the difference between the smallest and largest values in the window.
2. **Sliding Window**:
   - Start with both `i` and `j` at the beginning.
   - Expand the window by incrementing `j` and keep the window valid by incrementing `i` whenever the condition _**nums[j] - nums[i] > 2k**_ is violated.
   - At each step, calculate the size of the current valid window _**j - i + 1**_ and update the `maxBeauty`.

---

### Complexity Analysis:
1. **Time Complexity**:
   - Sorting the array: _**O(n log n)**_.
   - Sliding window traversal: _**O(n)**_.
   - Overall: _**O(n log n)**_.
2. **Space Complexity**:
   - _**O(1)**_, as the solution uses only a few additional variables.

---

### Examples:
#### Input 1:
```php
$nums = [4, 6, 1, 2];
$k = 2;
echo maximumBeauty($nums, $k); // Output: 3
```

#### Input 2:
```php
$nums = [1, 1, 1, 1];
$k = 10;
echo maximumBeauty($nums, $k); // Output: 4
```

This solution adheres to the constraints and efficiently computes the result for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
