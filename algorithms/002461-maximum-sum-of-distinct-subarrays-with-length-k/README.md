2461\. Maximum Sum of Distinct Subarrays With Length K

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sliding Window`

You are given an integer array `nums` and an integer `k`. Find the maximum subarray sum of all the **subarrays** of `nums` that meet the following conditions:

- The length of the subarray is `k`, and
- All the elements of the subarray are **distinct**.

Return _the maximum subarray sum of all the **subarrays** that meet the conditions_. If no subarray meets the conditions, return _`0`_.

_A **subarray** is a contiguous non-empty sequence of elements within an array_.

**Example 1:**

- **Input:** nums = [1,5,4,2,9,9,9], k = 3
- **Output:** 15
- **Explanation:** The **subarrays** of nums with length `3` are:
  - [1,5,4] which meets the requirements and has a sum of `10`.
  - [5,4,2] which meets the requirements and has a sum of `11`.
  - [4,2,9] which meets the requirements and has a sum of `15`.
  - [2,9,9] which does not meet the requirements because the element `9` is repeated.
  - [9,9,9] which does not meet the requirements because the element `9` is repeated.
    We return `15` because it is the maximum subarray sum of all the **subarrays** that meet the conditions

**Example 2:**

- **Input:** nums = [4,4,4], k = 3
- **Output:** 0
- **Explanation:** The **subarrays** of nums with length `3` are:
  - `[4,4,4]` which does not meet the requirements because the element `4` is repeated.
    We return `0` because no **subarrays** meet the conditions.



**Constraints:**

- <code>1 <= k <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>


**Hint:**
1. Which elements change when moving from the subarray of size `k` that ends at index `i` to the subarray of size `k` that ends at index `i + 1`?
2. Only two elements change, the element at `i + 1` is added into the subarray, and the element at `i - k + 1` gets removed from the subarray.
3. Iterate through each subarray of size k and keep track of the sum of the subarray and the frequency of each element.


**Solution:**

We can follow these steps:

### Approach:
1. **Sliding Window**: The window size is `k`, and we slide the window through the array while maintaining the sum of the current window and checking if all elements in the window are distinct.
2. **Hash Table (or associative array)**: Use an associative array (hash table) to track the frequency of elements in the current window. If any element appears more than once, the window is invalid.
3. **Updating the Window**: As we slide the window, add the new element (i.e., the element coming into the window), and remove the old element (i.e., the element leaving the window). Update the sum accordingly and check if the window is valid (i.e., all elements are distinct).
4. **Return the Maximum Sum**: We need to keep track of the maximum sum encountered among valid subarrays.

### Algorithm:
1. Initialize a hash table `freq` to store the frequency of elements in the current window.
2. Start by calculating the sum for the first window of size `k` and store the result if the window contains distinct elements.
3. Slide the window from left to right by:
   - Removing the element that leaves the window from the left.
   - Adding the element that enters the window from the right.
   - Update the sum and the hash table, and check if the window still contains only distinct elements.
4. If the window has valid distinct elements, update the maximum sum.
5. If no valid subarray is found, return `0`.

Let's implement this solution in PHP: **[2461. Maximum Sum of Distinct Subarrays With Length K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002461-maximum-sum-of-distinct-subarrays-with-length-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maximumSubarraySum($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1,5,4,2,9,9,9];
$k1 = 3;
echo maximumSubarraySum($nums1, $k1); // Output: 15

$nums2 = [4,4,4];
$k2 = 3;
echo maximumSubarraySum($nums2, $k2); // Output: 0
?>
```

### Explanation:

1. **Variables**:
   - `$maxSum`: Tracks the maximum sum of a valid subarray found so far.
   - `$currentSum`: Holds the sum of the current sliding window of size `k`.
   - `$freq`: A hash table (or associative array) that stores the frequency of elements in the current window.

2. **Sliding Window**:
   - We iterate through the array with a loop. As we move the window, we:
      - Add the element at index `$i` to the sum and update its frequency.
      - If the window size exceeds `k`, we remove the element at index `$i - k` from the sum and reduce its frequency.

3. **Valid Window Check**:
   - Once the window size reaches `k` (i.e., when `$i >= k - 1`), we check if all elements in the window are distinct by ensuring that the number of distinct keys in the frequency map is equal to `k`. If it is, we update the maximum sum.

4. **Return the Result**:
   - After iterating through the array, we return the maximum sum found. If no valid subarray was found, `maxSum` will remain `0`.

### Time Complexity:
- **O(n)**, where `n` is the length of the `nums` array. Each element is added and removed from the sliding window once, and the hash table operations (insert, remove, check count) are O(1) on average.

### Space Complexity:
- **O(k)** for the hash table that stores the frequency of elements in the current window.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
