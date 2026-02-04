3640\. Trionic Array II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Dynamic Programming`, `Weekly Contest 461`

You are given an integer array `nums` of length `n`.

A **trionic subarray** is a contiguous subarray `nums[l...r]` (with `0 <= l < r < n`) for which there exist indices `l < p < q < r` such that:
- `nums[l...p]` is **strictly** increasing,
- `nums[p...q]` is **strictly** decreasing,
- `nums[q...r]` is **strictly** increasing.

Return _the **maximum** sum of any trionic subarray in `nums`_.

**Example 1:**

- **Input:** nums = [0,-2,-1,-3,0,2,-1]
- **Output:** -4
- **Explanation:** Pick `l = 1`, `p = 2`, `q = 3`, `r = 5`:
  - `nums[l...p] = nums[1...2] = [-2, -1]` is strictly increasing (`-2 < -1`).
  - `nums[p...q] = nums[2...3] = [-1, -3]` is strictly decreasing (`-1 > -3`)
  - `nums[q...r] = nums[3...5] = [-3, 0, 2]` is strictly increasing (`-3 < 0 < 2`).
  - Sum = `(-2) + (-1) + (-3) + 0 + 2 = -4`.


**Example 2:**

- **Input:** nums = [1,4,2,7]
- **Output:** 14
- **Explanation:** Pick `l = 0`, `p = 1`, `q = 2`, `r = 3`:
  - `nums[l...p] = nums[0...1] = [1, 4]` is strictly increasing (`1 < 4`).
  - `nums[p...q] = nums[1...2] = [4, 2]` is strictly decreasing (`4 > 2`).
  - `nums[q...r] = nums[2...3] = [2, 7]` is strictly increasing (`2 < 7`).
  - Sum = `1 + 4 + 2 + 7 = 14`.


**Example 3:**

- **Input:** nums = [-754,167,-172,202,735,-941,992]
- **Output:** 816

**Constraints:**

- `4 <= n = nums.length <= 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`
- It is guaranteed that at least one trionic subarray exists.



**Hint:**
1. Use dynamic programming
2. Let four arrays `dp0...dp3` where `dpk[i]` is the max sum of a subarray ending at `i` after finishing `k` of the four phases (start -> inc -> dec -> inc)
3. Process each `i>0`
4. If `nums[i] > nums[i‑1]`, set `dp1[i]=max(dp1[i‑1]+nums[i], dp0[i‑1]+nums[i])`, `dp3[i]=max(dp3[i‑1]+nums[i], dp2[i‑1]+nums[i])`
5. If `nums[i] < nums[i‑1]`, set `dp2[i]=max(dp2[i‑1]+nums[i], dp1[i‑1]+nums[i])`
6. Always carry over `dp0[i]=dp0[i‑1]+nums[i]` when `nums[i]>nums[i‑1]`
7. Return the maximum value in `dp3`






**Solution:**

We need to find the maximum sum of a contiguous subarray that can be divided into three parts: strictly increasing, then strictly decreasing, then strictly increasing. The hint provides a DP approach with four states.

### Approach:

- Use a state machine dynamic programming approach with 4 states
- Define 4 DP arrays representing different phases of the trionic pattern
- Process each element sequentially, transitioning between states based on comparisons with previous element
- Track maximum sum for complete trionic subarrays ending at each position

Let's implement this solution in PHP: **[3640. Trionic Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003640-trionic-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxSumTrionic(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSumTrionic([0,-2,-1,-3,0,2,-1]) . "\n";                     // Output: -4
echo maxSumTrionic([1,4,2,7]) . "\n";                               // Output: 14
echo maxSumTrionic([-754,167,-172,202,735,-941,992]) . "\n";        // Output: 816
?>
```

### Explanation:

- **State Definitions**:
   - `dp0[i]`: Maximum sum ending at i in the initial phase (can start a new subarray at i)
   - `dp1[i]`: Maximum sum ending at i after completing first strictly increasing segment (l to p)
   - `dp2[i]`: Maximum sum ending at i after completing decreasing segment (p to q)
   - `dp3[i]`: Maximum sum ending at i after completing second increasing segment (q to r) - full trionic pattern

- **Transitions**:
   - For phase transitions, check if the sequence property holds (strictly increasing or decreasing)
   - Each state can either continue from its previous state (extending) or transition from previous phase
   - Use negative infinity to represent invalid states

- **Key Observations**:
   - The trionic pattern requires exactly 3 transitions: start → increasing → decreasing → increasing
   - Each segment must have at least 2 elements (since l<p<q<r), but the DP approach naturally enforces this through state progression
   - The solution finds maximum sum of any contiguous subarray satisfying the pattern

### Complexity
- **Time Complexity**: **_O(n)_** - single pass through the array
- **Space Complexity**: **_O(n)_** - four DP arrays of length n

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**