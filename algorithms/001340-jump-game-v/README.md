1340\. Jump Game V

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Dynamic Programming`, `Sorting`, `Weekly Contest 174`

Given an array of integers `arr` and an integer `d`. In one step you can jump from index `i` to index:

- `i + x` where: `i + x < arr.length` and  `0 < x <= d`.
- `i - x` where: `i - x >= 0` and  `0 < x <= d`.

In addition, you can only jump from index `i` to index `j` if `arr[i] > arr[j]` and `arr[i] > arr[k]` for all indices `k` between `i` and `j` (More formally `min(i, j) < k < max(i, j)`).

You can choose any index of the array and start jumping. Return _the maximum number of indices_ you can visit.

Notice that you can not jump outside of the array at any time.

**Example 1:**

![meta-chart](https://assets.leetcode.com/uploads/2020/01/23/meta-chart.jpeg)

- **Input:** arr = [6,4,14,6,8,13,9,7,10,6,12], d = 2
- **Output:** 4
- **Explanation:** You can start at index 10. You can jump `10 --> 8 --> 6 --> 7` as shown.
  - Note that if you start at index `6` you can only jump to index `7`. You cannot jump to index `5` because `13 > 9`. You cannot jump to index `4` because index `5` is between index `4` and `6` and `13 > 9`.
  - Similarly, You cannot jump from index `3` to index `2` or index `1`.

**Example 2:**

- **Input:** arr = [3,3,3,3,3], d = 3
- **Output:** 1
- **Explanation:** You can start at any index. You always cannot jump to any index.

**Example 3:**

- **Input:** arr = [7,6,5,4,3,2,1], d = 1
- **Output:** 7
- **Explanation:** Start at index 0. You can visit all the indicies.

**Example 4:**

- **Input:** arr = [1], d = 1
- **Output:** 1

**Example 5:**

- **Input:** arr = [10,5,1,9,2], d = 4
- **Output:** 4

**Example 6:**

- **Input:** arr = [5,3,7,2,4,1], d = 2
- **Output:** 3

**Constraints:**

- `1 <= arr.length <= 1000`
- `1 <= arr[i] <= 10⁵`
- `1 <= d <= arr.length`



**Hint:**
1. Use dynamic programming. `dp[i]` is max jumps you can do starting from index `i`. Answer is `max(dp[i])`.
2. `dp[i] = 1 + max (dp[j])` where `j` is all indices you can reach from `i`.



**Similar Questions:**
1. [1871. Jump Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001871-jump-game-vii)
2. [2297. Jump Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002297-jump-game-viii)






**Solution:**

This solution solves the Jump Game V problem using **Dynamic Programming with Memoization** and **Precomputed Reachability**. The key insight is that for each index, we can only jump to lower-valued indices within distance `d` where all intermediate heights are lower than the starting point. The algorithm precomputes all valid jumps from each position and then uses DFS with memoization to find the maximum path length starting from any index.

### Approach:

- **Precomputation of Reachable Indices**: For each index `i`, scan left and right up to distance `d`, adding indices `j` where all heights between `i` and `j` are strictly less than `arr[i]`
- **Early Termination**: Stop scanning in a direction when encountering a value ≥ `arr[i]`, as no further jumps are possible in that direction
- **Memoized DFS**: Use depth-first search with memoization to compute the maximum jump count from each index without redundant calculations
- **Bottom-up Dynamic Programming Concept**: The recursive approach with memoization is equivalent to building DP from the smallest values upward

Let's implement this solution in PHP: **[1340. Jump Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001340-jump-game-v/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer $d
 * @return Integer
 */
function maxJumps(array $arr, int $d): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $i
 * @param $dp
 * @param $reachable
 * @return int|mixed
 */
function dfs($i, &$dp, &$reachable): mixed
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxJumps([6,4,14,6,8,13,9,7,10,6,12], 2) . "\n";       // Output: 4
echo maxJumps([3,3,3,3,3], 3) . "\n";                       // Output: 1
echo maxJumps([7,6,5,4,3,2,1], 1) . "\n";                   // Output: 7
echo maxJumps([1], 1) . "\n";                               // Output: 1
echo maxJumps([10,5,1,9,2], 4) . "\n";                      // Output: 4
echo maxJumps([5,3,7,2,4,1], 2) . "\n";                     // Output: 3
?>
```

### Explanation:

- **Precomputation Phase**: For each index, two loops run—one leftwards and one rightwards—stopping when a higher or equal value blocks further jumps or distance limit `d` is reached
- **Reachability Storage**: Stores valid jump targets in `$reachable[$i]` array, allowing O(1) access to all positions reachable from `i`
- **DFS with Memoization**: Function `dfs($i, &$dp, &$reachable)` recursively explores all reachable positions, caching results in `$dp` array
- **Base Case**: When no jumps are possible from a position, it returns 1 (only the current index)
- **Optimal Substructure**: The maximum path from index `i` is 1 plus the maximum of all maximum paths from its reachable indices
- **Answer Aggregation**: Iterate through all starting indices to find the global maximum

### Complexity
- **Time Complexity**: 
   - _**O(n × d)**_ where `n` is array length and d is maximum jump distance
   - Precomputation scans at most `2d` indices per position: _**O(2n×d) = O(n×d)**_
   - DFS visits each index once due to memoization: _**O(n)**_
   - Total: _**O(n×d)**_
- **Space Complexity**: 
   - _**O(n×d)**_ in worst case
   - Reachability array stores at most _**O(n×d)**_ references
   - Memoization array: _**O(n)**_
   - Recursion stack: _**O(n)**_ in worst case

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**