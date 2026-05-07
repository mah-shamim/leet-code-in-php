3660\. Jump Game IX

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Weekly Contest 464`

You are given an integer array `nums`.

From any index `i`, you can jump to another index `j` under the following rules:

- Jump to index `j` where `j > i` is allowed only if `nums[j] < nums[i]`.
- Jump to index `j` where `j < i` is allowed only if `nums[j] > nums[i]`.

For each index `i`, find the **maximum value** in `nums` that can be reached by following **any** sequence of valid jumps starting at `i`.

Return an array `ans` where `ans[i]` is the **maximum value** reachable starting from index `i`.

**Example 1:**

- **Input:** nums = [2,1,3]
- **Output:** [2,2,3]
- **Explanation:**
  - For `i = 0`: No jump increases the value.
  - For `i = 1`: Jump to `j = 0` as `nums[j] = 2` is greater than `nums[i]`.
  - For `i = 2`: Since `nums[2] = 3` is the maximum value in `nums`, no jump increases the value.
  - Thus, `ans = [2, 2, 3]`.

**Example 2:**

- **Input:** nums = [2,3,1]
- **Output:** [3,3,3]
- **Explanation:**
  - For `i = 0`: Jump forward to `j = 2` as `nums[j] = 1` is less than `nums[i] = 2`, then from `i = 2` jump to `j = 1` as `nums[j] = 3` is greater than `nums[2]`.
  - For `i = 1`: Since `nums[1] = 3` is the maximum value in `nums`, no jump increases the value.
  - For `i = 2`: Jump to `j = 1` as `nums[j] = 3` is greater than `nums[2] = 1`.
  - Thus, `ans = [3, 3, 3]`.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`



**Hint:**
1. Think of the array as a directed graph where edges represent valid jumps.
2. From index `i`, forward jumps go only to smaller values; backward jumps go only to larger values.
3. The maximum reachable value from `i` is the maximum value in the connected component reachable under these jump rules.
4. You can find connected ranges by looking at prefix maximums and suffix minimums, a cut happens where all values to the left are <= all values to the right.






**Solution:**

This problem involves a directed graph where each index `i` can jump to a larger index `j` if `nums[j] < nums[i]`, or to a smaller index `j` if `nums[j] > nums[i]`.  
The goal is to determine, for each starting index, the **maximum value** reachable via any sequence of valid jumps.

The solution uses the observation that the array can be partitioned into segments where all values in a segment are either **all larger** or **all smaller** than values in adjacent segments — meaning no valid jumps can cross segment boundaries.  
Inside each segment, any index can reach every other index, so the maximum reachable value from any index in the segment is simply the **maximum value** in that segment.

### Approach:

- **Precompute prefix maximums** and **suffix minimums** to identify segment boundaries.
- **Segment definition**: A cut occurs at index `i` if all values up to `i` are ≤ all values after `i`.  
  This ensures no jump can cross this boundary.
- **Segment building**: Scan from left to right, when `prefixMax[i] <= suffixMin[i+1]`, end current segment and start new one.
- **Result assignment**: For each segment, find its maximum value and assign it to every index in the segment.

Let's implement this solution in PHP: **[3660. Jump Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003660-jump-game-ix/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function maxValue(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums = [2,1,3];
print_r(jumpGameIX($nums));

$nums = [2,3,1];
print_r(jumpGameIX($nums));
?>
```

### Explanation:

- **Prefix max array**: `prefixMax[i]` = max value from `nums[0..i]`
- **Suffix min array**: `suffixMin[i]` = min value from `nums[i..n-1]`
- **Why `prefixMax[i] <= suffixMin[i+1]` works as a cut**:
   - All elements on left ≤ all elements on right
   - Any forward jump (j > i) requires `nums[j] < nums[i]`, but if right side values are larger, impossible
   - Any backward jump (j < i) requires `nums[j] > nums[i]`, but if left side values are smaller, impossible
   - So no edge across this boundary
- Inside a segment, the graph is strongly connected (can reach any index), so max value in segment = answer for all indices in that segment.

### Complexity
- **Time Complexity**: _**O(n)**_
   - Two linear passes for `prefix` & `suffix` arrays
   - One linear pass to build segments
   - One linear pass to assign values
- **Space Complexity**: _**O(n)**_ - Stores `prefixMax`, `suffixMin`, `ans` arrays (can be optimized but fine for constraints)


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**