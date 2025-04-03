2874\. Maximum Value of an Ordered Triplet II

**Difficulty:** Medium

**Topics:** `Array`

You are given a **0-indexed** integer array `nums`.

Return **the maximum value over all triplets of indices** `(i, j, k)` such that `i < j < k`. If all such triplets have a negative value, return `0`.

The **value of a triplet of indices** `(i, j, k)` is equal to `(nums[i] - nums[j]) * nums[k]`.

**Example 1:**

- **Input:** nums = [12,6,1,2,7]
- **Output:** 77
- **Explanation:** The value of the triplet (0, 2, 4) is (nums[0] - nums[2]) * nums[4] = 77.
  It can be shown that there are no ordered triplets of indices with a value greater than 77.

**Example 2:**

- **Input:** nums = [1,10,3,4,19]
- **Output:** 133
- **Explanation:** The value of the triplet (1, 2, 4) is (nums[1] - nums[2]) * nums[4] = 133.
  It can be shown that there are no ordered triplets of indices with a value greater than 133.


**Example 3:**

- **Input:** nums = [1,2,3]
- **Output:** 0
- **Explanation:** The only ordered triplet of indices (0, 1, 2) has a negative value of (nums[0] - nums[1]) * nums[2] = -3. Hence, the answer would be 0.



**Constraints:**

- <code>3 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>6</sup></code>


**Hint:**
1. Preprocess the prefix maximum array, `prefix_max[i] = max(nums[0], nums[1], …, nums[i])` and the suffix maximum array, `suffix_max[i] = max(nums[i], nums[i + 1], …, nums[i - 1])`.
2. For each index `j`, find two indices `i` and k such that `i < j < k` and `(nums[i] - nums[j]) * nums[k]` is the maximum, using the prefix and suffix maximum arrays.
3. For index `j`, the maximum triplet value is `(prefix_max[j - 1] - nums[j]) * suffix_max[j + 1]`.



**Solution:**

We need to find the maximum value of the triplet (i, j, k) such that i < j < k and the value is computed as (nums[i] - nums[j]) * nums[k]. If all such triplets have a negative value, we return 0.

### Approach
1. **Precompute Maximum Values**:
   - **max_left**: For each index j, store the maximum value of nums[i] where i < j.
   - **max_right**: For each index j, store the maximum value of nums[k] where k > j.

2. **Iterate Over Possible j Values**:
   - For each valid j (from 1 to n-2), compute the value of the triplet using the precomputed max_left and max_right arrays. The value is calculated as (max_left[j] - nums[j]) * max_right[j].

3. **Track Maximum Value**:
   - Keep track of the maximum value obtained from all valid triplets. If all values are negative, return 0.

Let's implement this solution in PHP: **[2874. Maximum Value of an Ordered Triplet II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002874-maximum-value-of-an-ordered-triplet-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [12,6,1,2,7];
echo maxTripletValue($nums1) . "\n"; // Output: 77

$nums2 = [1,10,3,4,19];
echo maxTripletValue($nums2) . "\n"; // Output: 133

$nums3 = [1,2,3];
echo maxTripletValue($nums3) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Precompute max_left Array**:
   - This array is built by iterating from the start to the end of the array. For each position j, it stores the maximum value found in the subarray nums[0..j-1].

2. **Precompute max_right Array**:
   - This array is built by iterating from the end to the start of the array. For each position j, it stores the maximum value found in the subarray nums[j+1..n-1].

3. **Calculate Triplet Values**:
   - For each valid j (where i < j < k is possible), compute the value using the precomputed max_left and max_right values. This ensures that we efficiently find the maximum possible values for i and k relative to j.

4. **Track and Return Result**:
   - The maximum value from all valid triplets is tracked. If all values are negative, the result is 0, otherwise, the maximum value found is returned.

This approach ensures that we efficiently compute the required values in O(n) time and space complexity, making it suitable for large input arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**