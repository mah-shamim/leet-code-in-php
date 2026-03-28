2573\. Find the String with LCP

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `String`, `Dynamic Programming`, `Greedy`, `Union-Find`, `Matrix`, `Weekly Contest 333`

We define the `lcp` matrix of any 0-indexed string `word` of `n` lowercase English letters as an `n x n` grid such that:

- `lcp[i][j]` is equal to the length of the longest common prefix between the substrings `word[i,n-1]` and `word[j,n-1]`.

Given an `n x n` matrix `lcp`, return the alphabetically smallest string `word` that corresponds to `lcp`. If there is no such string, return an empty string.

A string `a` is lexicographically smaller than a string `b` (of the same length) if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. For example, `"aabd"` is lexicographically smaller than `"aaca"` because the first position they differ is at the third letter, and `'b'` comes before `'c'`.

**Example 1:**

- **Input:** lcp = [[4,0,2,0],[0,3,0,1],[2,0,2,0],[0,1,0,1]]
- **Output:** "abab"
- **Explanation:** `lcp` corresponds to any `4` letter string with two alternating letters. The lexicographically smallest of them is `"abab"`.

**Example 2:**

- **Input:** lcp = [[4,3,2,1],[3,3,2,1],[2,2,2,1],[1,1,1,1]]
- **Output:** "aaaa"
- **Explanation:** `lcp` corresponds to any `4` letter string with a single distinct letter. The lexicographically smallest of them is `"aaaa"`.

**Example 3:**

- **Input:** lcp = [[4,3,2,1],[3,3,2,1],[2,2,2,1],[1,1,1,3]]
- **Output:** ""
- **Explanation:** `lcp[3][3]` cannot be equal to `3` since `word[3,...,3]` consists of only a single letter; Thus, no answer exists.

**Constraints:**

- `1 <= n == lcp.length == lcp[i].length <= 1000`
- `0 <= lcp[i][j] <= n`



**Hint:**
1. Use the LCP array to determine which groups of elements must be equal.
2. Match the smallest letter to the group that contains the smallest unassigned index.
3. Build the LCP matrix of the resulting string then check if it is equal to the target LCP.






**Solution:**

The solution reconstructs the lexicographically smallest string from a given LCP (Longest Common Prefix) matrix. It first verifies necessary conditions (diagonal values, symmetry, bounds, and recursive LCP properties). Using a union‑find data structure, it groups indices that must share the same character (where `lcp[i][j] > 0`). It then enforces that indices with `lcp[i][j] == 0` or where the characters after a common prefix must differ belong to distinct groups. The groups are assigned letters in the order of their first occurrence, always picking the smallest possible letter that does not conflict with already assigned groups. Finally, it builds the string and verifies it against the original LCP matrix, returning the string if valid, otherwise an empty string.

### Approach:

- **Input validation**
   - Check that diagonal entries equal the suffix length: `lcp[i][i] == n - i`.
   - Ensure symmetry: `lcp[i][j] == lcp[j][i]`.
   - Verify each entry does not exceed the maximum possible common prefix length: `lcp[i][j] <= min(n-i, n-j)`.
   - Enforce the recursive LCP condition: if `lcp[i][j] > 0`, then `lcp[i+1][j+1] == lcp[i][j] - 1`.

- **Union‑Find for character equality**
   - Union indices `i` and `j` whenever `lcp[i][j] > 0` (they must start with the same character).

- **Conflict checks**
   - If `lcp[i][j] == 0`, then `i` and `j` must belong to different groups (first characters differ).
   - If `lcp[i][j] = k > 0` and `i+k` and `j+k` are inside the string, then `word[i+k] != word[j+k]`. Hence their groups must be different.

- **Group assignment & letter selection**
   - Map each index to its compressed group id, then order groups by the smallest index they contain.
   - Assign letters to groups in that order, always picking the smallest unused letter that does not conflict with any neighbor group (groups that must be different).

- **String construction and verification**
   - Build the string by placing the assigned letter for each group at every index belonging to that group.
   - Compute the LCP matrix of the constructed string and compare it with the input. Return the string if they match, otherwise an empty string.

Let's implement this solution in PHP: **[2573. Find the String with LCP](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002573-find-the-string-with-lcp/solution.php)**

```php
<?php
/**
 * @param Integer[][] $lcp
 * @return String
 */
function findTheString(array $lcp): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findTheString([[4,0,2,0],[0,3,0,1],[2,0,2,0],[0,1,0,1]]) . "\n";           // Output: "abab"
echo findTheString([[4,3,2,1],[3,3,2,1],[2,2,2,1],[1,1,1,1]]) . "\n";           // Output: "aaaa"
echo findTheString([[4,3,2,1],[3,3,2,1],[2,2,2,1],[1,1,1,3]]) . "\n";           // Output: ""
?>
```

### Explanation:

- **Why the diagonal check?** The LCP of a suffix with itself is the entire suffix, so `lcp[i][i]` must be exactly the length of that suffix (`n - i`).
- **Why the recursive condition?** If two suffixes share a common prefix of length `k > 0`, then the suffixes starting one position later share a common prefix of length `k-1`. This gives a direct relation between adjacent entries.
- **Union‑Find groups:** When `lcp[i][j] >= 1`, the first characters are equal, so indices `i` and `j` must have the same letter. Union‑Find efficiently collects all indices that are forced to be equal.
- **Conflict conditions**
   - `lcp[i][j] == 0` → first characters differ, so `i` and `j` cannot be in the same group.
   - `lcp[i][j] = k > 0` → the characters at `i+k` and `j+k` must differ (otherwise the common prefix would be longer), so they must be in different groups.
- **Letter assignment order:** To obtain the lexicographically smallest string, groups are processed in increasing order of their smallest index. For each group, we assign the smallest letter that is not already used by any group it must differ from (ensuring the string is minimal).
- **Final verification:** Even after satisfying all necessary conditions, a constructed string might still produce a different LCP matrix due to subtle interactions. Therefore, we explicitly compute its LCP matrix and compare it to the input, rejecting any mismatch.

### Complexity
- **Time Complexity**: `O(n²)`
   - All matrix checks run in `O(n²)`.
   - Union‑Find operations are nearly constant; total unions and finds are `O(n²)`.
   - Group assignment and letter selection involve scanning the matrix a few more times, still `O(n²)`.
   - The final verification also computes the LCP matrix in `O(n²)`.
- **Space Complexity**: `O(n²)`
   - The input matrix is given; we store a copy for verification or use additional arrays for union‑find, groups, and adjacency lists (which in worst case can be `O(n²)`).
   - The output string uses `O(n)` space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**