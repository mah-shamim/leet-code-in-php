1674\. Minimum Moves to Make Array Complementary

**Difficulty:** Medium

**Topics:** `Senior Staff`, `Array`, `Hash Table`, `Prefix Sum`, `Weekly Contest 217`

You are given an integer array `nums` of **even** length `n` and an integer `limit`. In one move, you can replace any integer from `nums` with another integer between `1` and `limit`, inclusive.

The array `nums` is **complementary** if for all indices `i` (**0-indexed**), `nums[i] + nums[n - 1 - i]` equals the same number. For example, the array `[1,2,3,4]` is complementary because for all indices `i`, `nums[i] + nums[n - 1 - i] = 5`.

Return _the **minimum** number of moves required to make `nums` **complementary**_.

**Example 1:**

- **Input:** nums = [1,2,4,3], limit = 4
- **Output:** 1
- **Explanation:** 
  - In 1 move, you can change nums to [1,2,2,3] (underlined elements are changed).
    - nums[0] + nums[3] = 1 + 3 = 4.
    - nums[1] + nums[2] = 2 + 2 = 4.
    - nums[2] + nums[1] = 2 + 2 = 4.
    - nums[3] + nums[0] = 3 + 1 = 4.
  - Therefore, nums[i] + nums[n-1-i] = 4 for every i, so nums is complementary.

**Example 2:**

- **Input:** nums = [1,2,2,1], limit = 2
- **Output:** 2
- **Explanation:** In 2 moves, you can change nums to [2,2,2,2]. You cannot change any number to 3 since 3 > limit.

**Example 3:**

- **Input:** nums = [1,2,1,2], limit = 2
- **Output:** 0
- **Explanation:** nums is already complementary.

**Constraints:**

- `n == nums.length`
- `2 <= n <= 10⁵`
- `1 <= nums[i] <= limit <= 10⁵`
- `n` is even.



**Hint:**
1. Given a target sum `x`, each pair of `nums[i]` and `nums[n-1-i]` would either need 0, 1, or 2 modifications.
2. Can you find the optimal target sum `x` value such that the sum of modifications is minimized?
3. Create a difference array to efficiently sum all the modifications.



**Similar Questions:**
1. [3356. Zero Array Transformation II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003356-zero-array-transformation-ii)
2. [3362. Zero Array Transformation III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003362-zero-array-transformation-iii)






**Solution:**

The solution uses a **difference array (prefix sum)** technique to efficiently compute, for each possible target sum `S`, the number of moves needed to make all complementary pairs sum to `S`.  
It iterates over each pair `(a, b)` and updates a range of possible target sums with incremental move counts using constant-time range updates. Finally, it scans through all possible sums to find the minimum moves.

### Approach:

- **Observation for one pair**: For a given target sum `S`, a pair `(a, b)` needs:
   - **0 moves** if `S == a + b`
   - **1 move** if `min(a, b) + 1 ≤ S ≤ max(a, b) + limit` and `S ≠ a + b`
   - **2 moves** otherwise

- **Key trick**: Instead of checking all `S` for each pair (which is O(limit²)), we use a **difference array** to mark where the move count changes.

- **Range update logic** (for a pair `(a, b)` with `lo = min(a, b)`, `hi = max(a, b)`):
   - From `2` to `lo + 1`: **2 moves**
   - From `lo + 1` to `a + b - 1`: **1 move** (decrease by 1 from previous)
   - At `a + b`: **0 moves** (decrease by 1 again)
   - From `a + b + 1` to `hi + limit`: **1 move** (increase by 1)
   - From `hi + limit + 1` to `2*limit`: **2 moves** (increase by 1 again)

- **Prefix sum** over the diff array gives the move count for each `S`. Track the minimum value.

Let's implement this solution in PHP: **[1674. Minimum Moves to Make Array Complementary](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001674-minimum-moves-to-make-array-complementary/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $limit
 * @return Integer
 */
function minMoves(array $nums, int $limit): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minMoves([1,2,4,3], 4) . "\n";         // Output: 1
echo minMoves([1,2,2,1], 2) . "\n";         // Output: 2
echo minMoves([1,2,1,2], 2) . "\n";         // Output: 0
?>
```

### Explanation:

- The `diff` array is initialized to size `2*limit + 2` to cover all possible sums from `2` to `2*limit`.
- For each pair `(a, b)`:
   - Start with base cost 2 for all sums (`diff[2] += 2`).
   - Decrease by 1 at `lo + 1` (1 move zone starts).
   - Decrease by 1 at `a + b` (0 moves at exact sum).
   - Increase by 1 at `a + b + 1` (1 move zone resumes).
   - Increase by 1 at `hi + limit + 1` (2 moves zone restarts).
- After processing all pairs, compute prefix sums of `diff` to get total moves for each `S`.
- Find the minimum across all valid sums.

### Complexity
- **Time Complexity**: _**O(n + limit)**_
   - Each pair updates a constant number of positions in `diff`.
   - Prefix sum scan over `O(limit)`.
- **Space Complexity**: _**O(limit)**_, Difference array of size `2*limit + 2`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**