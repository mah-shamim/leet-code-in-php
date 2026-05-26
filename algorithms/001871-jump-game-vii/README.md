1871\. Jump Game VII

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Dynamic Programming`, `Sliding Window`, `Prefix Sum`, `Weekly Contest 242`

You are given a **0-indexed** binary string `s` and two integers `minJump` and `maxJump`. In the beginning, you are standing at index `0`, which is equal to `'0'`. You can move from index `i` to index `j` if the following conditions are fulfilled:

- `i + minJump <= j <= min(i + maxJump, s.length - 1)`, and
- `s[j] == '0'`.

Return `true` _if you can reach index_ `s.length - 1` _in_ `s`, _or_ `false` _otherwise_.

**Example 1:**

- **Input:** s = "<ins>0</ins>11<ins>0</ins>1<ins>0</ins>", minJump = 2, maxJump = 3
- **Output:** true
- **Explanation:**
  - In the first step, move from index 0 to index 3.
  - In the second step, move from index 3 to index 5.

**Example 2:**

- **Input:** s = "01101110", minJump = 2, maxJump = 3
- **Output:** false

**Example 3:**

- **Input:** s = "0", minJump = 1, maxJump = 1
- **Output:** true

**Constraints:**

- `2 <= s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.
- `s[0] == '0'`
- `1 <= minJump <= maxJump < s.length`



**Hint:**
1. Consider for each reachable index `i` the interval `[i + a, i + b]`.
2. Use partial sums to mark the intervals as reachable.



**Similar Questions:**
1. [45. Jump Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000045-jump-game-ii)
2. [55. Jump Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000055-jump-game)
3. [1306. Jump Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001306-jump-game-iii)
4. [1345. Jump Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001345-jump-game-iv)
5. [1340. Jump Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001340-jump-game-v)
6. [1696. Jump Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001696-jump-game-vi)
7. [1871. Jump Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001871-jump-game-vii/solution.php)
8. [2297. Jump Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002297-jump-game-viii)
9. [2559. Count Vowel Strings in Ranges](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002559-count-vowel-strings-in-ranges)
10. [2770. Maximum Number of Jumps to Reach the Last Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002770-maximum-number-of-jumps-to-reach-the-last-index)






**Solution:**

This solution determines whether it’s possible to jump from index `0` to the last index of a binary string `s` using jumps of length between `minJump` and `maxJump`, landing only on `'0'`.  
It uses **dynamic programming with a prefix sum array** to efficiently track reachable indices without recalculating ranges repeatedly.

### Approach:

- **Dynamic programming array `dp`** where `dp[i]` indicates whether index `i` is reachable.
- **Prefix sum array `prefix`** where `prefix[i]` stores the number of reachable indices up to `i`.
- For each index `i`, check if there’s any reachable index in the range `[i - maxJump, i - minJump]`.
- Use the prefix sum to get the **count of reachable indices** in that range in **O(1)**.
- If count > 0 and `s[i] == '0'`, mark `dp[i]` as reachable.
- Update prefix sum accordingly.

Let's implement this solution in PHP: **[1871. Jump Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001871-jump-game-vii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $minJump
 * @param Integer $maxJump
 * @return Boolean
 */
function canReach(string $s, int $minJump, int $maxJump): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo canReach("011010", 2, 3) . "\n";           // Output: true
echo canReach("01101110", 2, 3) . "\n";         // Output: false
echo canReach("0", 1, 1) . "\n";                // Output: true
?>
```

### Explanation:

- Initialize `dp[0] = true` and `prefix[0] = 1`.
- Loop from `i = 1` to `n-1`:
   - Compute `left = i - maxJump` and `right = i - minJump`.
   - If `right < 0`, no jumps can land here → skip.
   - Adjust `left` to be at least `0`.
   - Compute reachable count in `[left, right]` using prefix sums.
   - If reachable count > 0 and `s[i] == '0'`, mark `dp[i] = true`.
   - Update `prefix[i] = prefix[i-1] + (dp[i] ? 1 : 0)`.
- Return `dp[n-1]`.

### Complexity
- **Time Complexity**: _**O(n)**_, Each index is processed once with _**O(1)**_ range sum queries.
- **Space Complexity**: _**O(n)**_, For `dp` and `prefix` arrays of length `n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**