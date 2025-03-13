3356\. Zero Array Transformation II

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Prefix Sum`

You are given an integer array `nums` of length `n` and a 2D array `queries` where <code>queries[i] = [l<sub>i</sub>, r<sub>i</sub>, val<sub>i</sub>]</code>.

Each `queries[i]` represents the following action on `nums`:

- Decrement the value at each index in the range <code>[l<sub>i</sub>, r<sub>i</sub>]</code> in `nums` by **at most** <code>val<sub>i</sub></code>.
- The amount by which each value is decremented can be chosen **independently** for each index.

A **Zero Array** is an array with all its elements equal to `0`.

Return the **minimum** possible **non-negative** value of `k`, such that after processing the first `k` queries in **sequence**, `nums` becomes a **Zero Array**. If no such `k` exists, return _`-1`_.

**Example 1:**

- **Input:** nums = [2,0,2], queries = [[0,2,1],[0,2,1],[1,1,3]]
- **Output:** 2
- **Explanation:**
  - **For i = 0 (l = 0, r = 2, val = 1):**
    - Decrement values at indices `[0, 1, 2]` by `[1, 0, 1]` respectively.
    - The array will become `[1, 0, 1]`.
  - **For i = 1 (l = 0, r = 2, val = 1):**
    - Decrement values at indices `[0, 1, 2]` by `[1, 0, 1]` respectively.
    - The array will become `[0, 0, 0]`, which is a Zero Array. Therefore, the minimum value of `k` is `2`.


**Example 2:**

- **Input:** nums = [4,3,2,1], queries = [[1,3,2],[0,2,1]]
- **Output:** -1
- **Explanation:**
   - **For i = 0 (l = 1, r = 3, val = 2):**
     - Decrement values at indices `[1, 2, 3]` by `[2, 2, 1]` respectively.
     - The array will become `[4, 1, 0, 0]`.
   - **For i = 1 (l = 0, r = 2, val = 1):**
     - Decrement values at indices `[0, 1, 2]` by `[1, 1, 0]` respectively.
     - The array will become `[3, 0, 0, 0]`, which is not a Zero Array.


**Example 3:**

- **Input:** nums = [0], queries = [[0,0,2],[0,0,4],[0,0,4],[0,0,3],[0,0,5]]
- **Output:** 0




**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 5 * 10<sup>5</sup></code>
- <code>1 <= queries.length <= 10<sup>5</sup></code>
- `queries[i].length == 3`
- <code>0 <= l<sub>i</sub> <= r<sub>i</sub> < nums.length</code>
- <code>1 <= val<sub>i</sub> <= 5</code>


**Hint:**
1. Can we apply binary search here?
2. Utilize a difference array to optimize the processing of queries.



**Solution:**

We need to determine the minimum number of queries that need to be processed in sequence to transform the given array into a zero array. Each query allows decrementing elements in a specified range by a certain value, but the actual decrement can be any amount up to the specified value. The goal is to find the earliest point where all elements in the array become zero.

### Approach
The key insight is to use binary search to efficiently determine the minimum number of queries required. For each candidate number of queries (k), we check if processing the first k queries can reduce all elements to zero. This check is performed using a difference array to efficiently compute the sum of decrements applied to each element up to the k-th query.

1. **Binary Search**: We perform binary search on the number of queries (k) from 0 to the total number of queries. The binary search helps us efficiently narrow down the minimum k.
2. **Difference Array**: For each candidate k, we use a difference array to apply the range updates specified by the first k queries. This allows us to compute the cumulative decrements applied to each element efficiently.
3. **Check Feasibility**: After applying the first k queries using the difference array, we compute the prefix sum to check if each element's cumulative decrement meets or exceeds its initial value. If all elements meet this condition, k is a valid candidate.

Let's implement this solution in PHP: **[3356. Zero Array Transformation II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003356-zero-array-transformation-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer[][] $queries
 * @return Integer
 */
function minZeroArray($nums, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
$nums1 = [2, 0, 2];
$queries1 = [[0, 2, 1], [0, 2, 1], [1, 1, 3]];
echo minZeroArray($nums1, $queries1) . "\n"; // Output: 2

$nums2 = [5, 3, 2, 1];
$queries2 = [[1, 3, 2], [0, 2, 1]];
echo minZeroArray($nums2, $queries2) . "\n"; // Output: -1

$nums3 = [0];
$queries3 = [[0,0,2],[0,0,4],[0,0,4],[0,0,3],[0,0,5]];
echo minZeroArray($nums3, $queries3) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Binary Search Initialization**: We start with the full range of possible k values (0 to the total number of queries).
2. **Mid-Calculation**: For each midpoint in the binary search, we check if processing the first `mid` queries can reduce the array to zero.
3. **Difference Array Application**: For each query up to `mid`, we update a difference array to reflect the range decrements. This allows efficient range updates and prefix sum computation.
4. **Prefix Sum Check**: After applying the queries, we compute the prefix sum of the difference array to check if each element's cumulative decrement meets its initial value. If all elements meet this condition, `mid` is a valid candidate, and we adjust the binary search range accordingly.
5. **Result Determination**: The binary search continues until the minimum valid k is found, or it is determined that no valid k exists.

This approach efficiently narrows down the possible values of k using binary search and leverages the difference array technique to handle range updates and checks in linear time, making it suitable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**