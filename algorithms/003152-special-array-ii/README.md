3152\. Special Array II

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Prefix Sum`

An array is considered **special** if every pair of its adjacent elements contains two numbers with different parity.

You are given an array of integer `nums` and a 2D integer matrix `queries`, where for <code>queries[i] = [from<sub>i</sub>, to<sub>i</sub>]</code> your task is to check that subarray[^1] <code>nums[from<sub>i</sub>..to<sub>i</sub>]</code> is special or not.

Return _an array of booleans `answer` such that `answer[i]` is true if <code>nums[from<sub>i</sub>..to<sub>i</sub>]</code> is special_.

**Example 1:**

- **Input:** nums = [3,4,1,2,6], queries = [[0,4]]
- **Output:** [false]
- **Explanation:** The subarray is `[3,4,1,2,6]`. `2` and `6` are both even.

**Example 2:**

- **Input:** nums = [4,3,1,6], queries = [[0,2],[2,3]]
- **Output:** [false,true]
- **Explanation:**

  1. The subarray is `[4,3,1]`. `3` and `1` are both odd. So the answer to this query is `false`.
  2. The subarray is `[1,6]`. There is only one pair: `(1,6)` and it contains numbers with different parity. So the answer to this query is `true`.


**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= queries.length <= 10<sup>5</sup></code>
- `queries[i].length == 2`
- `0 <= queries[i][0] <= queries[i][1] <= nums.length - 1`


**Hint:**
1. Try to split the array into some non-intersected continuous special subarrays.
2. For each query check that the first and the last elements of that query are in the same subarray or not.

[^1]: **Subarray** <code>A **subarray** is a contiguous sequence of elements within an array</code>.



**Solution:**

We need to determine whether a subarray of `nums` is "special," i.e., every pair of adjacent elements in the subarray must have different parity (one must be odd, and the other must be even).

### Approach:

1. **Identify Parity Transitions:**
   We can preprocess the array to mark positions where the parity changes. For example:
   - `0` represents an even number.
   - `1` represents an odd number.

   The idea is to identify all positions where adjacent elements have different parity. This will help us efficiently determine if a subarray is special by checking if the positions in the query are part of the same "special" block.

2. **Preprocessing:**
   Create a binary array `parity_change` where each element is `1` if the adjacent elements have different parity, otherwise `0`. For example:
   - If `nums[i]` and `nums[i+1]` have different parity, set `parity_change[i] = 1`, otherwise `0`.

3. **Prefix Sum Array:**
   Construct a prefix sum array `prefix_sum` where each entry at index `i` represents the cumulative number of parity transitions up to that index. This helps quickly check if all pairs within a subarray have different parity.

4. **Query Processing:**
   For each query `[from, to]`, check if there is any position in the range `[from, to-1]` where the parity doesn't change. This can be done by checking the difference in the prefix sum values: `prefix_sum[to] - prefix_sum[from]`.

Let's implement this solution in PHP: **[3152. Special Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003152-special-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer[][] $queries
 * @return Boolean[]
 */
function specialArray($nums, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$nums1 = [3,4,1,2,6];
$queries1 = [[0, 4]];
print_r(specialArray($nums1, $queries1)); // [false]

$nums2 = [4,3,1,6];
$queries2 = [[0, 2], [2, 3]];
print_r(specialArray($nums2, $queries2)); // [false, true]
?>
```

### Explanation:

1. **Preprocessing Parity Transitions:**
   We calculate `parity_change[i] = 1` if the elements `nums[i]` and `nums[i+1]` have different parity. Otherwise, we set it to `0`.

2. **Prefix Sum Array:**
   The `prefix_sum[i]` stores the cumulative count of parity transitions from the start of the array up to index `i`. This allows us to compute how many transitions occurred in any subarray `[from, to]` in constant time using the formula:
   ```php
   $transition_count = $prefix_sum[$to] - $prefix_sum[$from];
   ```

3. **Query Evaluation:**
   For each query, if the number of transitions is equal to the length of the subarray minus 1, the subarray is special, and we return `true`. Otherwise, we return `false`.

### Time Complexity:
- Preprocessing the parity transitions takes O(n).
- Constructing the prefix sum array takes O(n).
- Each query can be answered in O(1) using the prefix sum array.
- Hence, the total time complexity is O(n + q), where `n` is the length of the array and `q` is the number of queries.

This solution efficiently handles the problem constraints with an optimized approach.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
