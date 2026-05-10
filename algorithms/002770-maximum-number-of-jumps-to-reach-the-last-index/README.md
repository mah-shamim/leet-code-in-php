2770\. Maximum Number of Jumps to Reach the Last Index

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Dynamic Programming`, `Weekly Contest 353`

You are given a **0-indexed** array `nums` of `n` integers and an integer `target`.

You are initially positioned at index `0`. In one step, you can jump from index `i` to any index `j` such that:

- `0 <= i < j < n`
- `-target <= nums[j] - nums[i] <= target`

Return _the **maximum number of jumps** you can make to reach index `n - 1`_.

If there is no way to reach index `n - 1`, return `-1`.

**Example 1:**

- **Input:** nums = [1,3,6,4,1,2], target = 2
- **Output:** 3
- **Explanation:** 
  - To go from index 0 to index n - 1 with the maximum number of jumps, you can perform the following jumping sequence:
    - Jump from index 0 to index 1.
    - Jump from index 1 to index 3.
    - Jump from index 3 to index 5.
  - It can be proven that there is no other jumping sequence that goes from 0 to n - 1 with more than 3 jumps. Hence, the answer is 3.

**Example 2:**

- **Input:** nums = [1,3,6,4,1,2], target = 3
- **Output:** 5
- **Explanation:** 
  - To go from index 0 to index n - 1 with the maximum number of jumps, you can perform the following jumping sequence:
    - Jump from index 0 to index 1.
    - Jump from index 1 to index 2.
    - Jump from index 2 to index 3.
    - Jump from index 3 to index 4.
    - Jump from index 4 to index 5.
  - It can be proven that there is no other jumping sequence that goes from 0 to n - 1 with more than 5 jumps. Hence, the answer is 5.

**Example 3:**

- **Input:** nums = [1,3,6,4,1,2], target = 0
- **Output:** -1
- **Explanation:** It can be proven that there is no jumping sequence that goes from 0 to n - 1. Hence, the answer is -1.

**Constraints:**

- `2 <= nums.length == n <= 1000`
- `-10⁹ <= nums[i] <= 10⁹`
- `0 <= target <= 2 * 10⁹`



**Hint:**
1. Use a dynamic programming approach.
2. Define a dynamic programming array `dp` of size `n`, where `dp[i]` represents the maximum number of jumps from index `0` to index `i`.
3. For each j iterate over all `i < j`. Set `dp[j] = max(dp[j], dp[i] + 1)` if `-target <= nums[j] - nums[i] <= target`.



**Similar Questions:**
1. [45. Jump Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000045-jump-game-ii)
2. [403. Frog Jump](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000403-frog-jump)
3. [1306. Jump Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001306-jump-game-iii)
4. [1345. Jump Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001345-jump-game-iv)
5. [1654. Minimum Jumps to Reach Home](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001654-minimum-jumps-to-reach-home)
6. [1871. Jump Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001871-jump-game-vii)






**Solution:**

The solution uses **dynamic programming** to find the maximum number of jumps from index `0` to index `n-1` in the array `nums`, where each jump from `i` to `j` must satisfy `-target ≤ nums[j] − nums[i] ≤ target`.  
If the last index is unreachable, return `-1`. The DP array tracks the maximum jumps possible to reach each index, and the answer is the value stored at the last index.

### Approach:

- **Dynamic Programming Array**: Create a `dp` array of size `n` where `dp[i]` stores the maximum number of jumps to reach index `i` from index `0`. Initialize `dp[0] = 0` and all others to `-inf` (or `PHP_INT_MIN`).
- **Transition**: For each `j` from `1` to `n-1`, check all `i < j`. If the difference between `nums[j]` and `nums[i]` is within `[-target, target]` and `dp[i]` is not `-inf`, update `dp[j]` as `max(dp[j], dp[i] + 1)`.
- **Result**: If `dp[n-1]` is still `-inf`, return `-1`. Otherwise, return `dp[n-1]`.

Let's implement this solution in PHP: **[2770. Maximum Number of Jumps to Reach the Last Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002770-maximum-number-of-jumps-to-reach-the-last-index/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function maximumJumps(array $nums, int $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumJumps([1,3,6,4,1,2], 2) . "\n";             // Output: 3
echo maximumJumps([1,3,6,4,1,2], 3) . "\n";             // Output: 5
echo maximumJumps([1,3,6,4,1,2], 0) . "\n";             // Output: -1
?>
```

### Explanation:

- **Initialization**: `dp[0] = 0` because we start at index 0 with 0 jumps. All other indices are initially unreachable (`PHP_INT_MIN`).
- **Outer loop (j)**: Iterates over each target index `j` from `1` to `n-1` to compute the best way to reach `j`.
- **Inner loop (i)**: Checks all previous indices `i` from `0` to `j-1` to see if a valid jump from `i` to `j` exists.
- **Valid jump condition**: `-target <= nums[j] - nums[i] <= target` ensures the jump is allowed.
- **State update**: If `i` is reachable (`dp[i] != PHP_INT_MIN`), then `dp[j] = max(dp[j], dp[i] + 1)` means we can extend the path ending at `i` to `j` with one more jump.
- **Why this works**: The DP ensures that `dp[j]` always holds the maximum jumps to `j` because we consider all possible `i < j` that can jump to `j` and keep the best value.
- **Return**: If `dp[n-1]` is still `-inf`, no sequence exists → return `-1`. Otherwise, return the computed maximum jumps.

### Complexity
- **Time Complexity**: _**O(n²)**_, because we have two nested loops iterating over `n` elements each.
- **Space Complexity**: _**O(n)**_, for the DP array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**