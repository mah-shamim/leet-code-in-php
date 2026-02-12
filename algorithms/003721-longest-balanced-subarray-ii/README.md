3721\. Longest Balanced Subarray II

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Hash Table`, `Divide and Conquer`, `Segment Tree`, `Prefix Sum`, `Weekly Contest 472`

You are given an integer array `nums`.

A **subarray[^1]** is called **balanced** if the number of **distinct even** numbers in the subarray is equal to the number of **distinct odd** numbers.

Return the length of the **longest** balanced subarray.

**Example 1:**

- **Input:** nums = [2,5,4,3]
- **Output:** 4
- **Explanation:**
  - The longest balanced subarray is `[2, 5, 4, 3]`.
  - It has 2 distinct even numbers `[2, 4]` and 2 distinct odd numbers `[5, 3]`. Thus, the answer is 4.


**Example 2:**

- **Input:** nums = [3,2,2,5,4]
- **Output:** 5
- **Explanation:**
  - The longest balanced subarray is `[3, 2, 2, 5, 4]`.
  - It has 2 distinct even numbers `[2, 4]` and 2 distinct odd numbers `[3, 5]`. Thus, the answer is 5.


**Example 3:**

- **Input:** nums = [1,2,3,2]
- **Output:** 3
- **Explanation:**
  - The longest balanced subarray is `[2, 3, 2]`.
  - It has 1 distinct even number `[2]` and 1 distinct odd number `[3]`. Thus, the answer is 3.


**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. Store the first (or all) occurrences for each value in `pos[val]`.
2. Build a lazy segment tree over start indices `l in [0..n-1]` that supports range add and can tell if any index has value `0` (keep `mn`/`mx`).
3. Use `sign = +1` for odd values and `sign = -1` for even values.
4. Initialize by adding each value's contribution with `update(p, n-1, sign)` where `p` is its current first occurrence.
5. Slide left `l`: pop `pos[nums[l]]`, let `next` = next occurrence or `n`, do `update(0, next-1, -sign)`, then query for any `r >= l` with value `0` and update `ans = max(ans, r-l+1)`.


[^1]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.



**Solution:**

We need to analyze the provided solution and create an approach and explanation in bullet points. The problem: Longest Balanced Subarray II. The definition: a subarray is balanced if the number of distinct even numbers equals the number of distinct odd numbers. The solution uses prefix sums with a segment tree, tracking a balance value based on contributions of distinct numbers as we slide the left boundary. It's a fairly complex solution.

### Approach:

- Represent each distinct number by a **sign**: `+1` for odd, `-1` for even.  
  A subarray is balanced if the sum of signs of its *distinct* numbers equals `0`.
- For a fixed left boundary `l`, define a balance array `B_l[r]` as the sum of signs of all distinct numbers whose first occurrence inside `[l, r]` is at or before `r`.  
  Finding the longest balanced subarray becomes: for each `l`, find the largest `r ≥ l` with `B_l[r] = 0`.
- Precompute `next_occ[i]` – the next occurrence of the same value, or `n` if none.  
  Precompute `first_occ[val]` – the first occurrence of each value.
- Build the initial balance `B_0` using prefix sums on the first occurrences.  
  Each distinct value contributes its sign at its first occurrence, and then for all later indices via prefix sum.
- Maintain a **segment tree** over `B_0` that supports:
   - **range add** – to update the balance when the left boundary moves,
   - **query rightmost index with value 0** in a given range.
- Sweep the left boundary `l` from `0` to `n-1`:
   1. Query the segment tree for the rightmost `r ≥ l` where the current balance is `0`. Update the answer.
   2. If this is not the last element, **remove** the contribution of `nums[l]`:
      - Get its sign and its next occurrence `next`.
      - The element `nums[l]` was the first occurrence for `[l, …]`. After moving to `l+1`, its contribution vanishes for all `r < next`.
      - Perform a **range add** of `-sign` on the interval `[0, next-1]` of the segment tree.
- After the sweep, the maximum length found is the answer.

Let's implement this solution in PHP: **[3721. Longest Balanced Subarray II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003721-longest-balanced-subarray-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestBalanced(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestBalanced([2,5,4,3]) . "\n";             // Output: 4
echo longestBalanced([3,2,2,5,4]) . "\n";           // Output: 5
echo longestBalanced([1,2,3,2]) . "\n";             // Output: 3
?>
```

### Explanation:

- **Why signs work**  
  Each distinct even number adds `-1`, each distinct odd adds `+1`.  
  A balanced subarray requires equal counts → sum = 0.

- **From subarray condition to balance array**  
  For a fixed left `l`, the distinct numbers in `[l,r]` are exactly those values whose first occurrence in that subarray is `≤ r`.  
  If we place the sign of a value at its **first occurrence relative to l** and propagate it to the right, the prefix sum at `r` becomes `B_l[r]` – the net balance.

- **Initialising for `l=0`**  
  For every value we store its **global first occurrence**. We add its sign at that position, then compute the prefix sum. This gives `B_0[r]` for all `r`.

- **Segment tree capabilities**  
  We need to repeatedly:
   - Add a constant to a contiguous range of `B` values (when left moves).
   - Quickly find the rightmost index `≥ l` with value `0`.  
     A lazy segment tree storing `min`, `max`, and the position of the rightmost zero (if any) per node handles both in `O(log n)` per operation.

- **Sliding the left boundary**  
  When we move from `l` to `l+1`, the element at `l` disappears.  
  Let `v = nums[l]`, sign `s`, and its next occurrence `next`.  
  Before removal, `v` contributed `s` to every `r ≥ l` (because its first occurrence in `[l,r]` was `l`).  
  After removal, `v` contributes `s` only to `r ≥ next`.  
  Therefore, for all `r` with `l ≤ r < next`, the contribution is **removed**.  
  Updating the whole range `[0, next-1]` by `-s` is safe because we never query indices `< l`, and it correctly removes the contribution for `r ≥ l` while leaving values for `r ≥ next` unchanged.

- **Querying**  
  For each `l`, we ask the segment tree: “Give me the largest `r` in `[l, n-1]` with balance `0`”.  
  If such an `r` exists, the subarray `[l,r]` is balanced and its length is `r-l+1`.

- **Complexity**  
  Preprocessing: `O(n)`.  
  Segment tree operations: each `range_add` and `query_rightmost_zero` runs in `O(log n)`.  
  We perform exactly `n` queries and at most `n` updates – total `O(n log n)`.  
  This meets the constraint `n ≤ 10⁵`.

- **Why not a simpler two‑pointer?**  
  The “distinct” condition breaks the monotonicity of usual sliding window.  
  The first‑occurrence / next‑occurrence trick together with a segment tree elegantly decouples the distinctness handling from the window movement.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**