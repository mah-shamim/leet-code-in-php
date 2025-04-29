2962\. Count Subarrays Where Max Element Appears at Least K Times

**Difficulty:** Medium

**Topics:** `Array`, `Sliding Window`

You are given an integer array `nums` and a **positive** integer `k`.

Return _the number of subarrays where the **maximum** element of `nums` appears **at least** `k` times in that subarray_.

A **subarray** is a contiguous sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,3,2,3,3], k = 2
- **Output:** 6
- **Explanation:** The subarrays that contain the element 3 at least 2 times are: [1,3,2,3], [1,3,2,3,3], [3,2,3], [3,2,3,3], [2,3,3] and [3,3].

**Example 2:**

- **Input:** nums = [1,4,2,1], k = 3
- **Output:** 0
- **Explanation:** No subarray contains the element 4 at least 3 times.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>6</sup></code>
- <code>1 <= k <= 10<sup>5</sup></code>



**Solution:**

We need to count the number of subarrays where the maximum element of the given array appears at least K times. The approach involves identifying the positions of the maximum element and using these positions to efficiently calculate valid subarrays.

### Approach
1. **Identify the Maximum Element**: First, determine the maximum element in the array, as this element must appear at least K times in each valid subarray.
2. **Track Indices of Maximum Element**: Collect the indices where the maximum element occurs. These indices will help in determining valid subarrays.
3. **Sliding Window Technique**: Use the indices of the maximum element to determine valid subarrays. For each possible end position of a subarray (determined by the K-th occurrence of the maximum element), calculate the number of valid starting positions and ending positions to form valid subarrays.

Let's implement this solution in PHP: **[2962. Count Subarrays Where Max Element Appears at Least K Times](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002962-count-subarrays-where-max-element-appears-at-least-k-times/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function countSubarrays($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage:
echo countSubarrays([1,3,2,3,3], 2); // Output: 6
echo "\n";
echo countSubarrays([1,4,2,1], 3);   // Output: 0
?>
```

### Explanation:

1. **Identify Maximum Element**: The maximum element is found using the `max` function.
2. **Collect Indices**: The indices where the maximum element occurs are stored in an array.
3. **Check Feasibility**: If the number of occurrences of the maximum element is less than K, return 0 immediately.
4. **Calculate Valid Subarrays**: For each valid end position (starting from the K-th occurrence of the maximum element), compute the number of valid starting positions and ending positions. The number of valid starting positions is determined by the gap between consecutive occurrences of the maximum element. The number of valid ending positions is determined by the remaining elements from the current position to the end of the array.

This approach efficiently counts all valid subarrays using the positions of the maximum element, ensuring that each subarray meets the requirement of containing the maximum element at least K times. The complexity is linear with respect to the number of elements in the array, making it efficient for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**