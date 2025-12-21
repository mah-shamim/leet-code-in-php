955\. Delete Columns to Make Sorted II

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Greedy`, `Weekly Contest 114`

You are given an array of `n` strings `strs`, all of the same length.

We may choose any deletion indices, and we delete all the characters in those indices for each string.

For example, if we have `strs = ["abcdef","uvwxyz"]` and deletion indices `{0, 2, 3}`, then the final array after deletions is `["bef", "vyz"]`.

Suppose we chose a set of deletion indices `answer` such that after deletions, the final array has its elements in **lexicographic** order (i.e., `strs[0] <= strs[1] <= strs[2] <= ... <= strs[n - 1]`). Return _the minimum possible value of `answer.length`_.

**Example 1:**

- **Input:** strs = ["ca","bb","ac"]
- **Output:** 1
- **Explanation:**
  After deleting the first column, strs = ["a", "b", "c"].
  Now strs is in lexicographic order (ie. strs[0] <= strs[1] <= strs[2]).
  We require at least 1 deletion since initially strs was not in lexicographic order, so the answer is 1.

**Example 2:**

- **Input:** strs = ["xc","yb","za"]
- **Output:** 0
- **Explanation:**
  strs is already in lexicographic order, so we do not need to delete anything.
  Note that the rows of strs are not necessarily in lexicographic order:
  i.e., it is NOT necessarily true that (strs[0][0] <= strs[0][1] <= ...)

**Example 3:**

- **Input:** strs = ["zyx","wvu","tsr"]
- **Output:** 0
- **Explanation:**
  strs is already in lexicographic order, so we do not need to delete anything.
  Note that the rows of strs are not necessarily in lexicographic order:
  i.e., it is NOT necessarily true that (strs[0][0] <= strs[0][1] <= ...)

**Constraints:**

- `n == strs.length`
- `1 <= n <= 100`
- `1 <= strs[i].length <= 100`
- `strs[i]` consists of lowercase English letters.







**Solution:**

We are given an array of strings, all of the same length. We can delete columns (i.e., characters at a given index in every string). We want to delete the minimum number of columns so that the resulting array of strings is in lexicographic order (non-decreasing).

### Approach:

- We process the grid column by column from left to right
- Track which adjacent string pairs are already in sorted order using a boolean array
- For each new column, check if keeping it would violate lexicographic order for any unsorted pair
- If there's a violation, we must delete the column
- If we keep the column, update the sorted status for pairs where this column establishes strict ordering


Let's implement this solution in PHP: **[0955. Delete Columns to Make Sorted II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000955-delete-columns-to-make-sorted-ii/solution.php)**

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
echo minDeletionSize(["ca","bb","ac"]) . "\n";      // Output: 1
echo minDeletionSize(["xc","yb","za"]) . "\n";      // Output: 0
echo minDeletionSize(["zyx","wvu","tsr"]) . "\n";   // Output: 3
?>
```

### Explanation:

- **Initialize tracking**: Create an array `sorted` to track which adjacent string pairs are already in sorted order
- **Column-by-column processing**: For each column, we need to decide whether to keep it or delete it
- **Check for violations**: For each unsorted pair, if current column has a character that's strictly greater in the earlier string, we must delete this column
- **Update sorted status**: If we keep a column, mark pairs as sorted where this column provides a strict less-than relationship
- **Greedy decision**: This approach is optimal because earlier columns have more weight in lexicographic ordering
- **Complexity**: O(N * M) time and O(N) space where N is number of strings and M is string length

**Key Insight**: Once a pair of strings becomes sorted (earlier string < later string), we never need to check them again in future columns. Only unsorted pairs (where strings are still equal in all kept columns) need to be checked in subsequent columns.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**