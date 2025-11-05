3321\. Find X-Sum of All K-Long Subarrays II

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Sliding Window`, `Heap (Priority Queue)`, `Weekly Contest 419`

You are given an array `nums` of `n` integers and two integers `k` and `x`.

The **x-sum** of an array is calculated by the following procedure:

- Count the occurrences of all elements in the array.
- Keep only the occurrences of the top `x` most frequent elements. If two elements have the same number of occurrences, the element with the **bigger** value is considered more frequent.
- Calculate the sum of the resulting array.

**Note** that if an array has less than x distinct elements, its **x-sum** is the sum of the array.

Return an integer array `answer` of length `n - k + 1` where `answer[i]` is the **x-sum** of the subarray[^1] `nums[i..i + k - 1]`.

**Example 1:**

- **Input:** nums = [1,1,2,2,3,4,2,3], k = 6, x = 2
- **Output:** [6,10,12]
- **Explanation:**
  - For subarray `[1, 1, 2, 2, 3, 4]`, only elements 1 and 2 will be kept in the resulting array. Hence, `answer[0] = 1 + 1 + 2 + 2`.
  - For subarray `[1, 2, 2, 3, 4, 2]`, only elements 2 and 4 will be kept in the resulting array. Hence, `answer[1] = 2 + 2 + 2 + 4`. Note that 4 is kept in the array since it is bigger than 3 and 1 which occur the same number of times.
  - For subarray `[2, 2, 3, 4, 2, 3]`, only elements 2 and 3 are kept in the resulting array. Hence, `answer[2] = 2 + 2 + 2 + 3 + 3`.


**Example 2:**

- **Input:** nums = [3,8,7,8,7,5], k = 2, x = 2
- **Output:** [11,15,15,15,12]
- **Explanation:** Since `k == x`, `answer[i]` is equal to the sum of the subarray `nums[i..i + k - 1]`.


**Constraints:**

- `nums.length == n`
- `1 <= n <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `1 <= x <= k <= nums.length`



**Hint:**
1. Use sliding window.
2. Use two sets ordered by frequency. One of the sets will only contain the top `x` frequent elements, and the second will contain all other elements.
3. Update the two sets whenever you slide the window, and maintain a sum of the elements in the set with `x` elements



[^1]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.




**Solution:**

We need to compute the x-sum for all contiguous subarrays of length `k` in the given array `nums`. The x-sum is defined as the sum of the top `x` most frequent elements in the subarray, where ties are broken by the larger element value. If there are fewer than `x` distinct elements, we simply sum all elements in the subarray.

The key challenge is to efficiently maintain and update the frequencies of elements as we slide the window of size `k` across the array. A brute-force approach would be too slow for large inputs (up to 10^5), so we need an optimized solution.

### Approach:

We can use a **sliding window** technique combined with a **frequency map** and **two heaps** (or priority queues) to efficiently maintain the top `x` most frequent elements in the current window. The idea is to:
1. Maintain a frequency count of all elements in the current window.
2. Use a max-heap to keep track of the top `x` elements based on frequency and value.
3. As the window slides, update the frequencies of the outgoing and incoming elements, and adjust the heap accordingly.

However, updating the heap for every window slide can be inefficient if done naively. Instead, we can:
- Use a frequency dictionary to track counts.
- Use a max-heap (priority queue) that orders elements by frequency (descending) and then by value (descending). This heap will help us quickly retrieve the top `x` elements.
- For each window, we can compute the x-sum by summing the top `x` elements from the heap (or all elements if there are fewer than `x` distinct elements).

### Algorithm
1. **Initialization**:
   - Create a frequency dictionary to count occurrences of elements in the first window.
   - Build a max-heap (priority queue) where elements are ordered by:
      - Higher frequency first.
      - If frequencies are equal, larger value first.
   - For each window, extract the top `x` elements from the heap (or all if fewer than `x`), sum their values multiplied by their frequencies, then push them back.

2. **Sliding the Window**:
   - For each subsequent window:
      - Decrement the frequency of the element leaving the window.
      - Increment the frequency of the new element entering the window.
      - Rebuild the heap for the current window and compute the x-sum.

### Complexity
- **Time Complexity**: O(n log k) for sliding the window and maintaining the heap.
- **Space Complexity**: O(k) for storing the frequency counts and the heap.

Let's implement this solution in PHP: **[3321. Find X-Sum of All K-Long Subarrays II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003321-find-x-sum-of-all-k-long-subarrays-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer $x
 * @return Integer[]
 */
function findXSum($nums, $k, $x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(findXSum([1,1,2,2,3,4,2,3], 6, 2)); // Output: [6,10,12]
print_r(findXSum([3,8,7,8,7,5], 2, 2)); // Output: [11,15,15,15,12]
?>
```

### Explanation:

1. **Initial Frequency Setup**: We start by counting the frequency of each element in the first window of size `k`.
2. **Heap Construction**: For each window, we build a max-heap where each element is a pair `[frequency, value]`. The heap is ordered primarily by frequency (descending) and then by value (descending).
3. **X-Sum Calculation**: We extract the top `x` elements from the heap (or all elements if there are fewer than `x`), sum their values multiplied by their frequencies, and store the result.
4. **Sliding the Window**: As we move the window, we update the frequency dictionary by decrementing the count of the outgoing element and incrementing the count of the incoming element.
5. **Efficiency**: By using a heap, we efficiently maintain the top `x` elements for each window, ensuring optimal performance for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**