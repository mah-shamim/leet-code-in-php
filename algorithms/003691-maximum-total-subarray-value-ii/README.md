3691\. Maximum Total Subarray Value II

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Greedy`, `Segment Tree`, `Heap (Priority Queue)`, `Weekly Contest 468`

You are given an integer array `nums` of length `n` and an integer `k`.

You must select **exactly** `k` **distinct** subarrays[^1] `nums[l..r]` of `nums`. Subarrays may overlap, but the exact same subarray (same `l` and `r`) **cannot** be chosen more than once.

The **value** of a subarray `nums[l..r]` is defined as: `max(nums[l..r]) - min(nums[l..r])`.

The **total value** is the sum of the **values** of all chosen subarrays.

Return the **maximum** possible total value you can achieve.

[^1]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,3,2], k = 2
- **Output:** 4
- **Explanation:**
   - One optimal approach is:
     - Choose `nums[0..1] = [1, 3]`. The maximum is 3 and the minimum is 1, giving a value of `3 - 1 = 2`.
     - Choose nums`[0..2] = [1, 3, 2]`. The maximum is still 3 and the minimum is still 1, so the value is also `3 - 1 = 2`.
   - Adding these gives `2 + 2 = 4`.

**Example 2:**

- **Input:** nums = [4,2,5,1], k = 3
- **Output:** 12
- **Explanation:**
   - One optimal approach is:
     - Choose nums`[0..3] = [4, 2, 5, 1]`. The maximum is 5 and the minimum is 1, giving a value of `5 - 1 = 4`.
     - Choose nums`[1..3] = [2, 5, 1]`. The maximum is 5 and the minimum is 1, so the value is also `4`.
     - Choose nums`[2..3] = [5, 1]`. The maximum is 5 and the minimum is 1, so the value is again `4`.
   - Adding these gives `4 + 4 + 4 = 12`.

**Constraints:**

- `1 <= n == nums.length <= 5 * 10⁴`
- `0 <= nums[i] <= 10⁹`
- `1 <= k <= min(10⁵, n * (n + 1) / 2)`



**Hint:**
1. For fixed `l`, the sequence `v(l,r)=max(nums[l..r])−min(nums[l..r])` is non-increasing as `r` moves left.
2. Build RMQs (sparse tables) for range max/min so each `v(l,r)` is queryable in `O(1)`.
3. Use a max-heap with `v(l,n-1)` for all `l`; pop the largest `k` times, and after popping an entry from `(l,r)` push `(l,r-1)` if `r>l`.






**Solution:**

This solution finds the **maximum possible sum** of the values of exactly `k` distinct subarrays, where a subarray’s value is `max - min`.  
The approach uses a **max-heap** to always pick the largest-value subarray remaining, and for each picked subarray `(l, r)`, it inserts the next smaller subarray `(l, r-1)` into the heap (if possible).  
A **sparse table** enables O(1) range maximum/minimum queries to compute subarray values efficiently.

### Approach:

- **Sparse Table for RMQ:** Precompute logs and build sparse tables for both `max` and `min` over the array to answer range max/min in `O(1)`.
- **Heap-based Greedy Selection:** Start with all subarrays ending at the last index: `(0, n-1)`, `(1, n-1)`, …, `(n-1, n-1)`, and push their values into a max-heap.
- **Pop and Push**  
  - Extract the largest-value subarray from the heap, add its value to the total, and push the subarray `(l, r-1)` back if `r > l`.  
  - This ensures we always consider the next best smaller subarray starting at the same `l`.
- **Repeat k times**  
  - Perform exactly `k` extractions (or until heap is empty, though k is guaranteed valid).  
  - The heap contains at most `n` elements at any time.

Let's implement this solution in PHP: **[3691. Maximum Total Subarray Value II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003691-maximum-total-subarray-value-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxTotalValue(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxTotalValue([1,3,2], 2) . "\n";          // Output: 4
echo maxTotalValue([4,2,5,1], 3) . "\n";        // Output: 12
?>
```

### Explanation:

- **Why greedy works**  
  - The sequence `value(l, r)` for a fixed `l` is non-increasing as `r` decreases.  
  - Therefore, the best global choice always comes from the largest remaining subarray, and shrinking it by one index yields the next best for that start index.
- **Why O(1) RMQ is needed**  
  - Without fast range queries, calculating each `value(l, r)` would be O(n) and inefficient.  
  - Sparse table gives O(1) query after O(n log n) preprocessing.
- **Heap management**  
  - Only `n` initial entries are pushed. After each extraction, at most one new entry is pushed.  
  - Total heap operations: O((n + k) log n).
- **Handling duplicates**  
  - The heap stores distinct subarrays `(l, r)`, so same `(l, r)` cannot be chosen twice.  
  - Pushing `(l, r-1)` after popping `(l, r)` ensures all subarrays are considered uniquely.

### Complexity
- **Time Complexity**:
   - Sparse table preprocessing: O(n log n)
   - Heap operations: O((n + k) log n)
   - Total: O((n + k) log n)
- **Space Complexity**:
   - Sparse tables: O(n log n)
   - Heap: O(n)
   - Total: O(n log n)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**