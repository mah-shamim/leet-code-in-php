3653\. XOR After Range Multiplication Queries I

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Divide and Conquer`, `Simulation`, `Weekly Contest 463`

You are given an integer array `nums` of length `n` and a 2D integer array `queries` of size `q`, where `queries[i] = [lᵢ, rᵢ, kᵢ, vᵢ]`.

For each query, you must apply the following operations in order:

- Set `idx = lᵢ`.
- While `idx <= rᵢ`:
  - Update: `nums[idx] = (nums[idx] * vᵢ) % (10⁹ + 7)`
  - Set `idx += kᵢ`.

Return the **bitwise XOR** of all elements in `nums` after processing all queries.

**Example 1:**

- **Input:** nums = [1,1,1], queries = [[0,2,1,4]]
- **Output:** 4
- **Explanation:**
  - A single query `[0, 2, 1, 4]` multiplies every element from index 0 through index 2 by 4.
  - The array changes from `[1, 1, 1]` to `[4, 4, 4]`.
  - The XOR of all elements is `4 ^ 4 ^ 4 = 4`.


**Example 2:**

- **Input:** nums = [2,3,1,5,4], queries = [[1,4,2,3],[0,2,1,2]]
- **Output:** 31
- **Explanation:**
  - The first query `[1, 4, 2, 3]` multiplies the elements at indices 1 and 3 by 3, transforming the array to `[2, 9, 1, 15, 4]`.
  - The second query `[0, 2, 1, 2]` multiplies the elements at indices 0, 1, and 2 by 2, resulting in `[4, 18, 2, 15, 4]`.
  - Finally, the XOR of all elements is `4 ^ 18 ^ 2 ^ 15 ^ 4 = 31`.

**Constraints:**

- `1 <= n == nums.length <= 10³`
- `1 <= nums[i] <= 10⁹`
- `1 <= q == queries.length <= 10³`
- `queries[i] = [lᵢ, rᵢ, kᵢ, vᵢ]`
- `0 <= lᵢ <= rᵢ < n`
- `1 <= kᵢ <= n`
- `1 <= vᵢ <= 10⁵`



**Hint:**
1. Use bruteforce






**Solution:**

The problem requires applying several range multiplication updates to an array, where each update multiplies indices `lᵢ, lᵢ + kᵢ, lᵢ + 2kᵢ, ... ≤ rᵢ` by `vᵢ` modulo `10⁹ + 7`. After processing all queries, return the XOR of all array elements. The brute-force approach is feasible due to constraints (`n, q ≤ 1000`).

### Approach:

- Use **direct simulation** for each query: iterate over the specified indices and multiply each element by `vᵢ` modulo `10⁹ + 7`.
- After all queries, compute the XOR of all elements.
- No need for advanced data structures because `n` and `q` are small.

Let's implement this solution in PHP: **[3653. XOR After Range Multiplication Queries I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003653-xor-after-range-multiplication-queries-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer[][] $queries
 * @return Integer
 */
function xorAfterQueries(array $nums, array $queries): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1, 1, 1];
$queries1 = [[0, 2, 1, 4]];
echo xorAfterQueries($nums1, $queries1) . "\n"; // Output: 4

$nums2 = [2, 3, 1, 5, 4];
$queries2 = [[1, 4, 2, 3], [0, 2, 1, 2]];
echo xorAfterQueries($nums2, $queries2) . "\n"; // Output: 31
?>
```

### Explanation:

- **Step 1:** Loop through each query `[l, r, k, v]`.
- **Step 2:** For each query, start from index `l` and step by `k` until `r`, multiplying `nums[idx]` by `v` modulo `10⁹ + 7`.
- **Step 3:** After processing all queries, XOR all elements together.
- **Step 4:** Return the XOR result.

### Complexity
- **Time Complexity**: _**O(q⋅(n/k))≤O(q⋅n)**_ in worst case _**(when k=1)**_, so _**O(10⁶)**_ operations maximum, fine for given constraints.
- **Space Complexity**: _**O(1)**_ extra space (excluding input storage).


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**