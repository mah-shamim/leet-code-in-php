960\. Remove Max Number of Edges to Keep Graph Fully Traversable

**Difficulty:** Hard

**Topics:** `Array`, `String`, `Dynamic Programming`, `Weekly Contest 115`

You are given an array of `n` strings `strs`, all of the same length.

We may choose any deletion indices, and we delete all the characters in those indices for each string.

For example, if we have `strs = ["abcdef","uvwxyz"]` and deletion indices `{0, 2, 3}`, then the final array after deletions is `["bef", "vyz"]`.

Suppose we chose a set of deletion indices `answer` such that after deletions, the final array has **every string (row) in lexicographic** order. (i.e., `(strs[0][0] <= strs[0][1] <= ... <= strs[0][strs[0].length - 1])`, and `(strs[1][0] <= strs[1][1] <= ... <= strs[1][strs[1].length - 1])`, and so on). Return _the minimum possible value of `answer.length`_.

**Example 1:**

- **Input:** strs = ["babca","bbazb"]
- **Output:** 3
- **Explanation:** After deleting columns 0, 1, and 4, the final array is `strs = ["bc", "az"]`.
  Both these rows are individually in lexicographic order (ie. `strs[0][0] <= strs[0][1]` and `strs[1][0] <= strs[1][1]`).
  Note that `strs[0] > strs[1]` - the array `strs` is not necessarily in lexicographic order.

**Example 2:**

- **Input:** strs = ["edcba"]
- **Output:** 4
- **Explanation:** If we delete less than 4 columns, the only row will not be lexicographically sorted.

**Example 3:**

- **Input:** strs = ["ghi","def","abc"]
- **Output:** 0
- **Explanation:** All rows are already lexicographically sorted.

**Constraints:**

- `n == strs.length`
- `1 <= n <= 100`
- `1 <= strs[i].length <= 100`
- `strs[i]` consists of lowercase English letters.







**Solution:**

We need to find the minimum number of columns to delete so that every string becomes non-decreasing. This is equivalent to finding the maximum number of columns we can keep such that each row is sorted, which reduces to finding the **longest chain of columns that are non-decreasing in every row**.

We can solve this using **Dynamic Programming** (DP) on columns.

### Approach:

- Model the problem as finding the maximum number of columns we can keep such that each row remains sorted in non-decreasing order.
- The kept columns must preserve their original order, so we need the longest sequence of column indices where each row's characters are non-decreasing.
- Use dynamic programming: `dp[j]` represents the longest sequence of kept columns ending at column `j`.
- Initialize `dp[j] = 1` for all columns (each column alone is a valid sequence).
- For each column `j` (from 1 to `m-1`), check all previous columns `k` (< `j`). If for every row, the character at column `k` is ≤ the character at column `j`, then we can extend the sequence ending at `k` by adding `j`. Update `dp[j] = max(dp[j], dp[k] + 1)`.
- The maximum value in `dp` is the most columns we can keep. The minimum deletions is the total columns minus this maximum.

Let's implement this solution in PHP: **[0960. Remove Max Number of Edges to Keep Graph Fully Traversable](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000960-delete-columns-to-make-sorted-iii/solution.php)**

```php
<?php
/**
 * @param String[] $strs
 * @return Integer
 */
function minDeletionSize($strs) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minDeletionSize(["babca","bbazb"]) . "\n";         // Output: 3
echo minDeletionSize(["edcba"]) . "\n";                 // Output: 4
echo minDeletionSize(["ghi","def","abc"]) . "\n";       // Output: 0
?>
```

### Explanation:

- The goal is to minimize deletions, which is equivalent to maximizing the number of kept columns where every row is sorted.
- The condition for two columns `k` and `j` (`k < j`) to be in order is that for all rows, the character in column `k` is ≤ the character in column `j`. This ensures that keeping both columns won't break the sorted property in any row.
- By building the longest valid sequence of columns (in increasing index order), we find the largest set of columns we can retain.
- Dynamic programming efficiently computes this by considering each column as an endpoint and checking all possible previous columns.
- Time complexity: `O(m² * n)`, where `m` is the string length and `n` is the number of strings. This is acceptable given constraints (`m, n ≤ 100`).
- Space complexity: `O(m)` for the `dp` array.

## Complexity
- **Time complexity:** `O(m² * n)` where `m` is the number of columns, `n` is the number of rows.  
  We compare each pair of columns `(k, j)` and check all `n` rows.
- **Space complexity:** `O(m)` for the DP array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**