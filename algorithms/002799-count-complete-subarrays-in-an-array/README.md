2799\. Count Complete Subarrays in an Array

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sliding Window`

You are given an array `nums` consisting of **positive** integers.

We call a subarray of an array **complete** if the following condition is satisfied:

- The number of **distinct** elements in the subarray is equal to the number of distinct elements in the whole array.

Return _the number of **complete** subarrays_.

A **subarray** is a contiguous non-empty part of an array.

**Example 1:**

- **Input:** nums = [1,3,1,2,2]
- **Output:** 4
- **Explanation:** The complete subarrays are the following: [1,3,1,2], [1,3,1,2,2], [3,1,2] and [3,1,2,2].

**Example 2:**

- **Input:** nums = [5,5,5,5]
- **Output:** 10
- **Explanation:** The array consists only of the integer 5, so any subarray is complete. The number of subarrays that we can choose is 10.



**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 2000`


**Hint:**
1. Let’s say k is the number of distinct elements in the array. Our goal is to find the number of subarrays with k distinct elements.
2. Since the constraints are small, you can check every subarray.



**Solution:**

We need to count the number of complete subarrays in a given array. A complete subarray is defined as a contiguous subarray that contains exactly the same number of distinct elements as the entire array.

### Approach
1. **Identify Distinct Elements**: First, determine the number of distinct elements in the entire array, denoted as `k`.
2. **Sliding Window Technique**: Use the sliding window technique to efficiently count subarrays with exactly `k` distinct elements. This is done by leveraging two helper functions:
   - **atMost(m)**: This function counts the number of subarrays with at most `m` distinct elements.
   - **Exact Count Calculation**: The number of subarrays with exactly `k` distinct elements can be derived by subtracting the count of subarrays with at most `k-1` distinct elements from the count of subarrays with at most `k` distinct elements.

Let's implement this solution in PHP: **[2799. Count Complete Subarrays in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002799-count-complete-subarrays-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countCompleteSubarrays($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @param $m
 * @return int
 */
function atMost($nums, $m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Example 1
$nums1 = array(1, 3, 1, 2, 2);
echo "Output 1: " . countCompleteSubarrays($nums1) . "\n"; // Expected: 4

// Test Example 2
$nums2 = array(5, 5, 5, 5);
echo "Output 2: " . countCompleteSubarrays($nums2) . "\n"; // Expected: 10
?>
```

### Explanation:

1. **Identify Distinct Elements**: We use `array_unique` to get the distinct elements of the array and count them to determine `k`.
2. **Sliding Window Technique**:
   - **atMost(m) Function**: This function uses a sliding window approach to count all subarrays with up to `m` distinct elements. It maintains a window using left and right pointers and a hash map to track the frequency of elements within the window. As the window expands to the right, if the number of distinct elements exceeds `m`, the left pointer is moved to shrink the window until the distinct elements are within the limit.
   - **Exact Count Calculation**: By computing `atMost(k) - atMost(k-1)`, we effectively get the count of subarrays that have exactly `k` distinct elements, which are the complete subarrays we are interested in.

This approach efficiently narrows down the problem using the sliding window technique, ensuring we count the required subarrays in linear time relative to the input size, making it suitable for large arrays up to the constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**