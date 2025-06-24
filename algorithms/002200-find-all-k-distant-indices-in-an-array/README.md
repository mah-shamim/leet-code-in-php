2200\. Find All K-Distant Indices in an Array

**Difficulty:** Easy

**Topics:** `Array`, `Two Pointers`

You are given a **0-indexed** integer array `nums` and two integers `key` and `k`. A **k-distant index** is an index `i` of `nums` for which there exists at least one index `j` such that `|i - j| <= k` and `nums[j] == key`.

Return _a list of all k-distant indices sorted in **increasing order**_.

**Example 1:**

- **Input:** nums = [3,4,9,1,3,9,5], key = 9, k = 1
- **Output:** [1,2,3,4,5,6]
- **Explanation:** Here, `nums[2] == key` and `nums[5] == key`.
  - `For index 0, |0 - 2| > k and |0 - 5| > k, so there is no j where |0 - j| <= k and nums[j] == key. Thus, 0 is not a k-distant index.`
  - `For index 1, |1 - 2| <= k and nums[2] == key, so 1 is a k-distant index.`
  - `For index 2, |2 - 2| <= k and nums[2] == key, so 2 is a k-distant index.`
  - `For index 3, |3 - 2| <= k and nums[2] == key, so 3 is a k-distant index.`
  - `For index 4, |4 - 5| <= k and nums[5] == key, so 4 is a k-distant index.`
  - `For index 5, |5 - 5| <= k and nums[5] == key, so 5 is a k-distant index.`
  - `For index 6, |6 - 5| <= k and nums[5] == key, so 6 is a k-distant index.`
  - Thus, we return [1,2,3,4,5,6] which is sorted in increasing order.

**Example 2:**

- **Input:** nums = [2,2,2,2,2], key = 2, k = 2
- **Output:** [0,1,2,3,4]
- **Explanation:** For all indices i in nums, there exists some index j such that |i - j| <= k and nums[j] == key, so every index is a k-distant index.
  - Hence, we return [0,1,2,3,4].

**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 1000`
- `key` is an integer from the array `nums`.
- `1 <= k <= nums.length`


**Hint:**
1. For every occurrence of key in nums, find all indices within distance k from it.
2. Use a hash table to remove duplicate indices.


**Similar Questions:**
1. [1. Two Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000001-two-sum)
2. [243. Shortest Word Distance](https://leetcode.com/problems/shortest-word-distance/description/)
3. [2817. Minimum Absolute Difference Between Elements With Constraint](https://leetcode.com/problems/minimum-absolute-difference-between-elements-with-constraint/description/)






**Solution:**

We need to find all k-distant indices in an array. A k-distant index `i` is defined as an index where there exists at least one index `j` such that the absolute difference between `i` and `j` is at most `k` and the value at `j` is equal to the given `key`.

### Approach
1. **Problem Analysis**: The task involves identifying all indices `i` in the array that are within a distance `k` from any index `j` where `nums[j]` equals `key`. The solution requires efficiently marking all such indices `i` without duplicates and returning them in sorted order.

2. **Intuition**: For each occurrence of `key` in the array, we can determine the range of indices `[j - k, j + k]` that are k-distant. To efficiently mark these indices, we use a line sweep algorithm. This involves:
   - Creating a difference array (`diff`) where each entry at index `i` represents the change in the number of covering intervals.
   - For each occurrence of `key` at index `j`, we increment the start of the interval (`max(0, j - k)`) by 1 and decrement the position right after the end of the interval (`min(n-1, j + k) + 1`) by 1.
   - By processing the `diff` array with a prefix sum, we can determine which indices are covered by at least one interval (i.e., `prefix_sum[i] > 0`).

3. **Algorithm Selection**: The line sweep algorithm is chosen for its efficiency in handling range updates and queries. It allows us to process each occurrence of `key` in O(1) time per range update and then compute the covered indices in O(n) time.

4. **Complexity Analysis**:
   - **Time Complexity**: O(n), where `n` is the length of the array. We traverse the array twice: once to mark occurrences of `key` and update the `diff` array, and once to compute the prefix sum and collect results.
   - **Space Complexity**: O(n), due to the storage required for the `diff` array and the result list.

Let's implement this solution in PHP: **[2200. Find All K-Distant Indices in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002200-find-all-k-distant-indices-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $key
 * @param Integer $k
 * @return Integer[]
 */
function findKDistantIndices($nums, $key, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = array(3, 4, 9, 1, 3, 9, 5);
$key1 = 9;
$k1 = 1;
print_r(findKDistantIndices($nums1, $key1, $k1));
// Output: [1, 2, 3, 4, 5, 6]

$nums2 = array(2, 2, 2, 2, 2);
$key2 = 2;
$k2 = 2;
print_r(findKDistantIndices($nums2, $key2, $k2));
// Output: [0, 1, 2, 3, 4]
?>
```

### Explanation:

1. **Initialization**: We initialize a difference array `diff` of size `n + 1` with zeros. This array will help in marking the start and end of intervals influenced by each occurrence of `key`.

2. **Processing Key Occurrences**: For each index `j` where `nums[j]` equals `key`:
   - **Start of Interval**: The start index is `max(0, j - k)`, ensuring it doesn't go below 0. We increment `diff[start]` by 1.
   - **End of Interval**: The end index is `min(n-1, j + k)`, ensuring it doesn't exceed the array bounds. We decrement `diff[end + 1]` by 1 to mark the end of the interval.

3. **Prefix Sum Calculation**: We traverse the array from left to right, maintaining a running total (`curr`) of the values in `diff`. If `curr` is positive at any index `i`, it means `i` is within `k` distance of at least one occurrence of `key`, so we add `i` to the result.

4. **Result Compilation**: The result array, which is naturally sorted in increasing order, is returned after processing all indices.

This approach efficiently marks all k-distant indices using the line sweep technique, ensuring optimal performance with O(n) time and space complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**