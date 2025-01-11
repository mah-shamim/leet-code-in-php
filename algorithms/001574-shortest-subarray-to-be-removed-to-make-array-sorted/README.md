1574\. Shortest Subarray to be Removed to Make Array Sorted

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Stack`, `Monotonic Stack`

Given an integer array `arr`, remove a subarray (can be empty) from `arr` such that the remaining elements in `arr` are **non-decreasing**.

Return _the length of the shortest subarray to remove_.

A **subarray** is a contiguous subsequence of the array.

**Example 1:**

- **Input:** arr = [1,2,3,10,4,2,3,5]
- **Output:** 3
- **Explanation:** The shortest subarray we can remove is `[10,4,2]` of length `3`. The remaining elements after that will be `[1,2,3,3,5]` which are sorted.
  Another correct solution is to remove the subarray `[3,10,4]`.

**Example 2:**

- **Input:** arr = [5,4,3,2,1]
- **Output:** 4
- **Explanation:** Since the array is strictly decreasing, we can only keep a single element. Therefore we need to remove a subarray of length `4`, either `[5,4,3,2]` or `[4,3,2,1]`.


**Example 3:**

- **Input:** arr = [1,2,3]
- **Output:** 0
- **Explanation:** The array is already non-decreasing. We do not need to remove any elements.



**Constraints:**

- <code>1 <= arr.length <= 10<sup>5</sup></code>
- <code>0 <= arr[i] <= 10<sup>9</sup></code>


**Hint:**
1. The key is to find the longest non-decreasing subarray starting with the first element or ending with the last element, respectively.
2. After removing some subarray, the result is the concatenation of a sorted prefix and a sorted suffix, where the last element of the prefix is smaller than the first element of the suffix.



**Solution:**

We can use sorting and binary search techniques. Here’s the plan:

### Approach:

1. **Two Pointers Approach:**
   - First, identify the longest non-decreasing prefix (`left` pointer).
   - Then, identify the longest non-decreasing suffix (`right` pointer).
   - After that, try to combine these two subarrays by considering the middle part of the array and adjusting the subarray to be removed in such a way that the combined array is non-decreasing.

2. **Monotonic Stack:**
   - Use a monotonic stack to help manage subarray elements in a sorted fashion.

3. **Steps:**
   - Find the longest non-decreasing prefix (`left`).
   - Find the longest non-decreasing suffix (`right`).
   - Try to merge the two subarrays by looking for elements that can form a valid combination.

4. **Optimization:**
   - Use binary search to optimize the merging step for finding the smallest subarray to remove.

Let's implement this solution in PHP: **[1574. Shortest Subarray to be Removed to Make Array Sorted](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001574-shortest-subarray-to-be-removed-to-make-array-sorted/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function shortestSubarrayToRemove($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo shortestSubarrayToRemove([1, 2, 3, 10, 4, 2, 3, 5]) . "\n"; // Output: 3
echo shortestSubarrayToRemove([5, 4, 3, 2, 1]) . "\n";           // Output: 4
echo shortestSubarrayToRemove([1, 2, 3]) . "\n";                 // Output: 0
?>
```

### Explanation:

1. **Longest Non-Decreasing Prefix and Suffix**:
   - The prefix is determined by traversing the array from the start until elements are in non-decreasing order.
   - Similarly, the suffix is determined by traversing from the end.

2. **Initial Minimum Removal**:
   - Calculate the removal length by keeping only the prefix or the suffix.

3. **Merging Prefix and Suffix**:
   - Use two pointers (`i` for prefix and `j` for suffix) to find the smallest subarray to remove such that the last element of the prefix is less than or equal to the first element of the suffix.

4. **Return Result**:
   - The result is the minimum length of the subarray to remove, calculated as the smaller of the initial removal or the merging of prefix and suffix.

### Complexity
- **Time Complexity**: _**O(n)**_, as the array is traversed at most twice.
- **Space Complexity**: _**O(1)**_, as only a few variables are used.

This solution efficiently finds the shortest subarray to be removed to make the array sorted by using a two-pointer technique, and it handles large arrays up to the constraint of `10^5` elements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
