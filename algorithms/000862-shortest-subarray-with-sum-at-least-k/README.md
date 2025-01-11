862\. Shortest Subarray with Sum at Least K

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Queue`, `Sliding Window`, `Heap (Priority Queue)`, `Prefix Sum`, `Monotonic Queue`

Given an integer array `nums` and an integer `k`, return _the length of the shortest non-empty **subarray** of `nums` with a sum of at least `k`. If there is no such **subarray**, return `-1`_.

A **subarray** is a **contiguous** part of an array.

**Example 1:**

- **Input:** nums = [1], k = 1
- **Output:** 1

**Example 2:**

- **Input:** nums = [1,2], k = 4
- **Output:** -1


**Example 3:**

- **Input:** nums = [2,-1,2], k = 3
- **Output:** 3



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>-10<sup>5</sup> <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= k <= 10<sup>9</sup></code>


**Solution:**

We need to use a sliding window approach combined with prefix sums and a monotonic queue. Here's the step-by-step approach:

### Steps:

1. **Prefix Sum:**
   - First, calculate the prefix sum array, where each element at index `i` represents the sum of the elements from the start of the array to `i`. The prefix sum allows us to compute the sum of any subarray in constant time.

2. **Monotonic Queue:**
   - We use a deque (double-ended queue) to maintain the indices of the `prefix_sum` array. The deque will be maintained in an increasing order of prefix sums.
   - This helps us efficiently find subarrays with the sum greater than or equal to `k` by comparing the current prefix sum with earlier prefix sums.

3. **Sliding Window Logic:**
   - For each index `i`, check if the difference between the current prefix sum and any previous prefix sum (which is stored in the deque) is greater than or equal to `k`.
   - If so, compute the length of the subarray and update the minimum length if necessary.

### Algorithm:

1. Initialize `prefix_sum` array with size `n+1` (where `n` is the length of the input array). The first element is `0` because the sum of zero elements is `0`.
2. Use a deque to store indices of `prefix_sum` values. The deque will help to find the shortest subarray that satisfies the condition in an efficient manner.
3. For each element in the array, update the `prefix_sum`, and check the deque to find the smallest subarray with sum greater than or equal to `k`.

Let's implement this solution in PHP: **[862. Shortest Subarray with Sum at Least K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000862-shortest-subarray-with-sum-at-least-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function shortestSubarray($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1];
$k1 = 1;
echo shortestSubarray($nums1, $k1) . "\n"; // Output: 1

$nums2 = [1, 2];
$k2 = 4;
echo shortestSubarray($nums2, $k2) . "\n"; // Output: -1

$nums3 = [2, -1, 2];
$k3 = 3;
echo shortestSubarray($nums3, $k3) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Prefix Sum Array:**
   - We compute the cumulative sum of the array in the `prefix_sum` array. This helps in calculating the sum of any subarray `nums[i...j]` by using the formula `prefix_sum[j+1] - prefix_sum[i]`.

2. **Monotonic Queue:**
   - The deque holds indices of the `prefix_sum` array in increasing order of values. We maintain this order so that we can efficiently find the smallest subarray whose sum is greater than or equal to `k`.

3. **Sliding Window Logic:**
   - As we traverse through the `prefix_sum` array, we try to find the smallest subarray using the difference between the current `prefix_sum[i]` and previous `prefix_sum[deque[0]]`.
   - If the difference is greater than or equal to `k`, we calculate the subarray length and update the minimum length found.

4. **Returning Result:**
   - If no valid subarray is found, return `-1`. Otherwise, return the minimum subarray length.

### Time Complexity:
- **Time Complexity:** `O(n)`, where `n` is the length of the input array. Each element is processed at most twice (once when added to the deque and once when removed).
- **Space Complexity:** `O(n)` due to the `prefix_sum` array and the deque used to store indices.

This approach ensures that the solution runs efficiently even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
