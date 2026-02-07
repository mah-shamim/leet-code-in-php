1653\. Minimum Deletions to Make String Balanced

**Difficulty:** Medium

**Topics:** `Senior`, `String`, `Dynamic Programming`, `Stack`, `Biweekly Contest 39`

You are given a string `s` consisting only of characters `'a'` and `'b'`.

You can delete any number of characters in `s` to make `s` **balanced**. `s` is **balanced** if there is no pair of indices `(i,j)` such that `i < j` and `s[i] = 'b'` and `s[j]= 'a'`.

Return _the **minimum** number of deletions needed to make `s` **balanced**_.

**Example 1:**

- **Input:** s = "aababbab"
- **Output:** 2
- **Explanation:** You can either:\
  Delete the characters at 0-indexed positions 2 and 6 ("aababbab" -> "aaabbb"), or\
  Delete the characters at 0-indexed positions 3 and 6 ("aababbab" -> "aabbbb").

**Example 2:**

- **Input:** s = "bbaaaaabb"
- **Output:** 2
- **Explanation:** The only solution is to delete the first two characters.

**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s[i]` is `a` or `b`.

**Hint:**
1. You need to find for every index the number of Bs before it and the number of A's after it
2. You can speed up the finding of A's and B's in suffix and prefix using preprocessing


**Similar Questions:**
1. [2124. Check if All A's Appears Before All B's](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002124-check-if-all-as-appears-before-all-bs)


**Solution:**


To solve this problem, we can follow these steps:

1. **Preprocess the counts of 'b's up to each index**: This helps in knowing how many 'b's are present before any given index.
2. **Preprocess the counts of 'a's from each index**: This helps in knowing how many 'a's are present after any given index.
3. **Calculate the minimum deletions needed**: For each index, you can calculate the deletions needed by considering deleting all 'b's before it and all 'a's after it.


Let's implement this solution in PHP: **[1653. Minimum Deletions to Make String Balanced](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001653-minimum-deletions-to-make-string-balanced/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minimumDeletions($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumDeletions("aababbab") . "\n"; // Output: 2
echo minimumDeletions("bbaaaaabb") . "\n"; // Output: 2
?>
```

### Explanation:

1. **Prefix Array for 'b's**: This array keeps track of the cumulative count of 'b's up to each index. For example, if the string is "aababbab", the prefix array for 'b's will be `[0, 0, 1, 2, 2, 3, 3, 4]`.
2. **Suffix Array for 'a's**: This array keeps track of the cumulative count of 'a's from each index to the end. For the same string, the suffix array for 'a's will be `[4, 3, 3, 2, 2, 1, 1, 0]`.
3. **Calculating Minimum Deletions**: For each index `i`, the total deletions needed to make the string balanced if we split at `i` can be calculated as the sum of 'b's before `i` and 'a's after `i`. The minimum of these values across all indices gives the result.

This approach ensures that the solution is efficient with a time complexity of _**O(n)**_, which is suitable given the constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
