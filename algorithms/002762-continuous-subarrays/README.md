2762\. Continuous Subarrays

**Difficulty:** Medium

**Topics:** `Sliding Window`, `Array`, `Ordered Set`, `Heap (Priority Queue)`, `Queue`, `Monotonic Queue`, `Two Pointers`, `Ordered Map`, `Hash Table`, `Dynamic Programming`, `Counting`, `Math`, `Binary Search Tree`, `Segment Tree`, `Tree`, `Stack`, `Binary Search`, `Monotonic Stack`, `Memoization`, `Iterator`, `Greedy`, `Depth-First Search`, `Recursion`

You are given a **0-indexed** integer array `nums`. A subarray of `nums` is called continuous if:

- Let `i`, `i + 1`, ..., `j` be the indices in the subarray. Then, for each pair of indices  <code>i <= i<sub>1</sub>, i<sub>2</sub> <= j</code>, <code>0 <= |nums[i<sub>1</sub>] - nums[i<sub>2</sub>]| <= 2</code>.

Return _the total number of **continuous** subarrays_.

A subarray is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [5,4,2,4]
- **Output:** 8
- **Explanation:**
  Continuous subarray of size 1: [5], [4], [2], [4].
  Continuous subarray of size 2: [5,4], [4,2], [2,4].
  Continuous subarray of size 3: [4,2,4].
  Thereare no subarrys of size 4.
  Total continuous subarrays = 4 + 3 + 1 = 8.
  It can be shown that there are no more continuous subarrays.

**Example 2:**

- **Input:** nums = [1,2,3]
- **Output:** 6
- **Explanation:**
  Continuous subarray of size 1: [1], [2], [3].
  Continuous subarray of size 2: [1,2], [2,3].
  Continuous subarray of size 3: [1,2,3].
  Total continuous subarrays = 3 + 2 + 1 = 6.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. Try using the sliding window technique.
2. Use a set or map to keep track of the maximum and minimum of subarrays.



**Solution:**

We can use the **sliding window technique** to efficiently calculate the number of continuous subarrays. We'll maintain a valid window where the difference between the maximum and minimum values in the subarray is at most 2. To efficiently track the maximum and minimum values within the current window, we can use two **deques** (one for the maximum and one for the minimum).

### Approach
1. Use the sliding window technique with two pointers: `left` and `right`.
2. Use two **deques**:
   - One to track indices of elements in descending order for the maximum value.
   - One to track indices of elements in ascending order for the minimum value.
3. For each index `right`:
   - Update the deques to reflect the current window.
   - Ensure the window remains valid (difference between maximum and minimum ≤ 2). If invalid, increment the `left` pointer to shrink the window.
   - Count the number of valid subarrays ending at index `right` as `(right - left + 1)`.
4. Return the total count of subarrays.

Let's implement this solution in PHP: **[2762. Continuous Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002762-continuous-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function continuousSubarrays($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$nums1 = [5, 4, 2, 4];
echo continuousSubarrays($nums1) . "\n"; // Output: 8

$nums2 = [1, 2, 3];
echo continuousSubarrays($nums2) . "\n"; // Output: 6
?>
```

### Explanation:

1. **Sliding Window:**  
   The `left` pointer moves forward only when the window becomes invalid (i.e., the difference between the maximum and minimum values exceeds 2). The `right` pointer expands the window by iterating through the array.

2. **Deques for Maximum and Minimum:**
   - The `maxDeque` always holds indices of elements in descending order, ensuring the maximum value in the current window is at the front (`maxDeque[0]`).
   - The `minDeque` always holds indices of elements in ascending order, ensuring the minimum value in the current window is at the front (`minDeque[0]`).

3. **Counting Subarrays:**  
   For each `right`, the number of valid subarrays ending at `right` is equal to `(right - left + 1)`, as all subarrays from `left` to `right` are valid.

4. **Efficiency:**  
   Each element is added to and removed from the deques at most once, making the time complexity **O(n)**. Space complexity is **O(n)** due to the deques.

---

### Output

```text
8
6
```

---

### Complexity Analysis

1. **Time Complexity:**
   - Each element is pushed and popped from the deques at most once.
   - Total time complexity is **O(n)**.

2. **Space Complexity:**
   - Deques store indices, with a maximum size of `n`.
   - Space complexity is **O(n)**.

This implementation is efficient and works within the constraints provided.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
