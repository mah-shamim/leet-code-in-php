944\. Delete Columns to Make Sorted

**Difficulty:** Easy

**Topics:** `Array`, `String`, `Weekly Contest 111`

You are given an array of `n` strings `strs`, all of the same length.

The strings can be arranged such that there is one on each line, making a grid.

- For example, `strs = ["abc", "bce", "cae"]` can be arranged as follows:
```
abc
bce
cae
```

You want to **delete** the columns that are **not sorted lexicographically**. In the above example (**0-indexed**), columns 0 (`'a'`, `'b'`, `'c'`) and 2 (`'c'`, `'e'`, `'e'`) are sorted, while column 1 (`'b'`, `'c'`, `'a'`) is not, so you would delete column 1.

Return _the number of columns that you will delete_.

**Example 1:**

- **Input:** strs = ["cba","daf","ghi"]
- **Output:** 1
- **Explanation:** The grid looks as follows:
  ```
  cba
  daf
  ghi
  ```
  Columns 0 and 2 are sorted, but column 1 is not, so you only need to delete 1 column.

**Example 2:**

- **Input:** strs = ["a","b"]
- **Output:** 0
- **Explanation:** The grid looks as follows:
  ```
  a
  b
  ```
  Column 0 is the only column and is sorted, so you will not delete any columns.

**Example 3:**

- **Input:** strs = ["zyx","wvu","tsr"]
- **Output:** 3
- **Explanation:** The grid looks as follows:
  ```
  zyx
  wvu
  tsr
  ```
  All 3 columns are not sorted, so you will delete all 3.

**Constraints:**

- `n == strs.length`
- `1 <= n <= 100`
- `1 <= strs[i].length <= 1000`
- `strs[i]` consists of lowercase English letters.







**Solution:**

We are given an array of strings, all of the same length.
We need to check each column (i.e., the characters at the same index in each string) and see if it is sorted lexicographically (non-decreasing).
If a column is not sorted, we count it for deletion.

### Approach:
We can iterate over each column index (from 0 to length of the strings - 1).
For each column, we iterate through the strings and compare the current character with the previous one.
If at any point the current character is less than the previous one, then the column is not sorted, and we break and count it.

Steps:

1. Initialize a variable `deletedColumns` to 0.
2. Let `n` be the number of strings, and `m` be the length of each string (since all are same length, we can take the length of the first string).
3. For each column index `col` in [0, m-1]:
   - For each row index `row` in [1, n-1]:
   - If `strs[row][col]` < `strs[row-1][col]`, then the column is not sorted.
   - Increment `deletedColumns` and break out of the inner loop for this column.
4. Return `deletedColumns`.

Let's implement this solution in PHP: **[0944. Delete Columns to Make Sorted](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000944-delete-columns-to-make-sorted/solution.php)**

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
echo minDeletionSize(["cba","daf","ghi"]) . "\n";   // Output: 1
echo minDeletionSize(["a","b"]) . "\n";             // Output: 0
echo minDeletionSize(["zyx","wvu","tsr"]) . "\n";   // Output: 3
?>
```

### Explanation:

1. **Grid Dimensions**: We calculate the number of rows (`$rows`) and columns (`$cols`) from the input array.

2. **Column-wise Checking**: For each column (from 0 to `$cols-1`), we examine the characters in all rows.

3. **Lexicographic Comparison**: We check if each character is greater than or equal to the character above it. If we find any character that's smaller than the one above it, the column isn't sorted.

4. **Counting Deletions**: We increment our count for each unsorted column and break out of the inner loop as soon as we find an unsorted pair (no need to check the rest of that column).

## Complexity Analysis:
- **Time Complexity**: O(N × M) where N is the number of strings and M is the length of each string
- **Space Complexity**: O(1) - we only use a constant amount of extra space

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**