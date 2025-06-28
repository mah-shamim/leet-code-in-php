2099\. Find Subsequence of Length K With the Largest Sum

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sorting`, `Heap (Priority Queue)`

You are given an integer array `nums` and an integer `k`. You want to find a **subsequence** of `nums` of length `k` that has the **largest** sum.

Return _**any** such subsequence as an integer array of length `k`_.

A **subsequence** is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

**Example 1:**

- **Input:** nums = [2,1,3,3], k = 2
- **Output:** [3,3]
- **Explanation:** The subsequence has the largest sum of 3 + 3 = 6.

**Example 2:**

- **Input:** nums = [-1,-2,3,4], k = 3
- **Output:** [-1,3,4]
- **Explanation:** The subsequence has the largest sum of -1 + 3 + 4 = 6.

**Example 3:**

- **Input:** nums = [3,4,3,3], k = 2
- **Output:** [3,4]
- **Explanation:**
  The subsequence has the largest sum of 3 + 4 = 7.
  Another possible subsequence is [4, 3].

**Constraints:**

- `1 <= nums.length <= 1000`
- <code>-10<sup>5</sup> <= nums[i] <= 10<sup>5</sup></code>
- `1 <= k <= nums.length`


**Hint:**
1. From a greedy perspective, what k elements should you pick?
2. Could you sort the array while maintaining the index?


**Similar Questions:**
1. [215. Kth Largest Element in an Array](https://leetcode.com/problems/kth-largest-element-in-an-array/description/)
2. [1005. Maximize Sum Of Array After K Negations](https://leetcode.com/problems/maximize-sum-of-array-after-k-negations/description/)
3. [1356. Sort Integers by The Number of 1 Bits](https://leetcode.com/problems/sort-integers-by-the-number-of-1-bits/description/)
4. [2163. Minimum Difference in Sums After Removal of Elements](https://leetcode.com/problems/minimum-difference-in-sums-after-removal-of-elements/description/)






**Solution:**

We need to find a subsequence of length `k` from the given array `nums` that has the largest possible sum. A subsequence is derived by deleting some elements without changing the order of the remaining elements. The solution involves selecting the `k` largest elements from the array and returning them in their original order.

### Approach
1. **Problem Analysis**: The goal is to maximize the sum of a subsequence of length `k`. The optimal approach involves selecting the `k` largest elements in the array. However, these elements must appear in the subsequence in the same order as they appear in the original array.
2. **Intuition**: The largest sum is achieved by selecting the `k` largest elements. Since the order of elements in the subsequence must match their original order, we first identify these elements and then sort them by their original indices.
3. **Algorithm Selection**:
   - **Pair Creation**: Create pairs of each element's index and its value.
   - **Sort by Value**: Sort these pairs in descending order based on their values. This ensures the largest elements are considered first.
   - **Select Top k Elements**: Take the first `k` pairs from the sorted list.
   - **Sort by Index**: Sort the selected pairs by their original indices to maintain the order in which they appear in the original array.
   - **Extract Values**: Extract the values from the sorted pairs to form the resulting subsequence.
4. **Complexity Analysis**:
   - **Time Complexity**: The dominant operations are the two sorting steps. Sorting the entire array takes _**O(n log n)**_ time, and sorting the `k` elements takes _**O(k log k)**_ time. Since _**k ≤ n**_, the overall complexity is _**O(n log n)**_.
   - **Space Complexity**: Additional space is used to store the pairs, which is _**O(n)**_.

Let's implement this solution in PHP: **[2099. Find Subsequence of Length K With the Largest Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002099-find-subsequence-of-length-k-with-the-largest-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[]
 */
function maxSubsequence($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(maxSubsequence(array(2, 1, 3, 3), 2));      // Output: Array ( [0] => 3 [1] => 3 )
print_r(maxSubsequence(array(-1, -2, 3, 4), 3));     // Output: Array ( [0] => -1 [1] => 3 [2] => 4 )
print_r(maxSubsequence(array(3, 4, 3, 3), 2));       // Output: Array ( [0] => 4 [1] => 3 ) or [3,4]
?>
```

### Explanation:

1. **Pair Creation**: We start by creating an array of pairs where each pair consists of an element's index and its value. This helps in tracking the original positions of elements after sorting.
2. **Sort by Value**: The pairs are sorted in descending order based on their values. This ensures that the largest elements are at the beginning of the array.
3. **Select Top k Elements**: We slice the first `k` elements from the sorted array of pairs, which represent the `k` largest elements in the array.
4. **Sort by Index**: The selected pairs are then sorted by their original indices to ensure the resulting subsequence maintains the order of elements as they appear in the original array.
5. **Extract Values**: Finally, we extract the values from the sorted pairs to form the subsequence, which is returned as the result.

This approach efficiently selects the largest elements while preserving their original order, ensuring the solution meets the problem requirements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**