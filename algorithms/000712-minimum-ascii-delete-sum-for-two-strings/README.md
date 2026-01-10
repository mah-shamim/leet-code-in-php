712\. Minimum ASCII Delete Sum for Two Strings

**Difficulty:** Medium

**Topics:** `String`, `Dynamic Programming`

Given two strings `s1` and `s2`, return _the lowest **ASCII** sum of deleted characters to make two strings equal_.

**Example 1:**

- **Input:** s1 = "sea", s2 = "eat"
- **Output:** 231
- **Explanation:** Deleting "s" from "sea" adds the ASCII value of "s" (115) to the sum.
  Deleting "t" from "eat" adds 116 to the sum.
  At the end, both strings are equal, and 115 + 116 = 231 is the minimum sum possible to achieve this.

**Example 2:**

- **Input:** s1 = "delete", s2 = "leet"
- **Output:** 403
- **Explanation:** Deleting "dee" from "delete" to turn the string into "let",
  adds 100[d] + 101[e] + 101[e] to the sum.
  Deleting "e" from "leet" adds 101[e] to the sum.
  At the end, both strings are equal to "let", and the answer is 100+101+101+101 = 403.
  If instead we turned both strings into "lee" or "eet", we would get answers of 433 or 417, which are higher.

**Constraints:**

- `1 <= s1.length, s2.length <= 1000`
- `s1` and `s2` consist of lowercase English letters.



**Hint:**
1. Let `dp(i, j)` be the answer for inputs `s1[i:]` and `s2[j:]`.



**Similar Questions:**
1. [72. Minimum ASCII Delete Sum for Two Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000072-edit-distance)
2. [300. Longest Increasing Subsequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000300-longest-increasing-subsequence)
3. [583. Delete Operation for Two Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000583-delete-operation-for-two-strings)






**Solution:**

We need to find the minimum sum of ASCII values of characters we must delete from two strings to make them equal. This is similar to finding the Longest Common Subsequence (LCS), but instead of maximizing the length, we minimize the cost of deleted characters.

### Approach:

- **Dynamic Programming Setup**: Use a 2D DP array `dp[i][j]` where `i` represents the prefix of `s1` of length `i` and `j` represents the prefix of `s2` of length `j`. `dp[i][j]` stores the minimum ASCII deletion sum to make `s1[0:i]` and `s2[0:j]` equal.
- **Base Cases**:
   - `dp[0][0] = 0`: Two empty strings require no deletions.
   - `dp[i][0] = dp[i-1][0] + ord(s1[i-1])`: To match `s1` prefix to empty `s2`, delete all characters in `s1`.
   - `dp[0][j] = dp[0][j-1] + ord(s2[j-1])`: To match empty `s1` to `s2` prefix, delete all characters in `s2`.
- **State Transition**:
   - If `s1[i-1] == s2[j-1]`: No deletion needed for these characters, so `dp[i][j] = dp[i-1][j-1]`.
   - Otherwise: We must delete either `s1[i-1]` or `s2[j-1]`, so take the minimum of:
      - Delete `s1[i-1]`: `dp[i-1][j] + ord(s1[i-1])`
      - Delete `s2[j-1]`: `dp[i][j-1] + ord(s2[j-1])`
- **Space Optimization**: Use only two rows (`prev` and `curr`) instead of a full 2D array since each state depends only on previous row and left cell.

Let's implement this solution in PHP: **[712. Minimum ASCII Delete Sum for Two Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000712-minimum-ascii-delete-sum-for-two-strings/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @return Integer
 */
function minimumDeleteSum($s1, $s2) {
    $m = strlen($s1);
    $n = strlen($s2);

    // Use two rows to save space
    $prev = array_fill(0, $n + 1, 0);
    $curr = array_fill(0, $n + 1, 0);

    // Initialize first row (empty s1)
    for ($j = 1; $j <= $n; $j++) {
        $prev[$j] = $prev[$j - 1] + ord($s2[$j - 1]);
    }

    for ($i = 1; $i <= $m; $i++) {
        // Initialize current row for empty s2
        $curr[0] = $prev[0] + ord($s1[$i - 1]);

        for ($j = 1; $j <= $n; $j++) {
            if ($s1[$i - 1] == $s2[$j - 1]) {
                $curr[$j] = $prev[$j - 1];
            } else {
                $curr[$j] = min(
                    $prev[$j] + ord($s1[$i - 1]),
                    $curr[$j - 1] + ord($s2[$j - 1])
                );
            }
        }

        // Swap rows for next iteration
        $temp = $prev;
        $prev = $curr;
        $curr = $temp;
    }

    return $prev[$n];
}

// Test cases
echo minimumDeleteSum("sea", "eat") . "\n";                 // Output: 231
echo minimumDeleteSum("delete", "leet") . "\n";             // Output: 403
echo minimumDeleteSum("a", "b"). "\n";                      // Output: 195 (97+98)
echo minimumDeleteSum("abc", "abc"). "\n";                  // Output: 0
echo minimumDeleteSum("abc", "def"). "\n";                  // Output: 597 (sum of all ASCII values)
?>
```

### Explanation:

- **Initialization**:
   - `prev` row represents `dp[i-1][*]`, `curr` row represents `dp[i][*]`.
   - First row (`i=0`) is computed as cumulative ASCII sums of `s2` (deleting all of `s2` to match empty `s1`).
- **Row Processing**:
   - For each row `i` (1-based index for `s1`):
      - `curr[0]` is cumulative ASCII sum of `s1[0:i]` (deleting all of `s1` to match empty `s2`).
      - For each column `j` (1-based index for `s2`):
         - If characters match, carry over `dp[i-1][j-1]` (`prev[j-1]`).
         - Else, take minimum of:
            - Deleting `s1[i-1]`: `prev[j] + ord(s1[i-1])`
            - Deleting `s2[j-1]`: `curr[j-1] + ord(s2[j-1])`
   - Swap `prev` and `curr` for next iteration.
- **Final Answer**: After processing all rows, `prev[n]` contains `dp[m][n]`, the minimum deletion sum for both full strings.

### Complexity
- **Time Complexity**: **O(m × n)** where `m` and `n` are lengths of `s1` and `s2`. We iterate through each character pair once.
- **Space Complexity**: **O(n)** as we maintain only two rows of length `n+1`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**