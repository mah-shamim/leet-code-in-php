3085\. Minimum Deletions to Make String K-Special

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Greedy`, `Sorting`, `Counting`

You are given a string `word` and an integer `k`.

We consider `word` to be **k-special** if `|freq(word[i]) - freq(word[j])| <= k` for all indices `i` and `j` in the string.

Here, `freq(x)` denotes the frequency[^1] of the character `x` in `word`, and `|y|` denotes the absolute value of `y`.

Return _the **minimum** number of characters you need to delete to make `word` **k-special**_.

**Example 1:**

- **Input:** word = "aabcaba", k = 0
- **Output:** 3
- **Explanation:** We can make `word` `0`-special by deleting `2` occurrences of `"a"` and `1` occurrence of `"c"`. Therefore, `word` becomes equal to `"baba"` where `freq('a') == freq('b') == 2`.

**Example 2:**

- **Input:** word = "dabdcbdcdcd", k = 2
- **Output:** 2
- **Explanation:** We can make `word` `2`-special by deleting `1` occurrence of `"a"` and `1` occurrence of `"d"`. Therefore, `word` becomes equal to `"bdcbdcdcd"` where `freq('b') == 2`, `freq('c') == 3`, and `freq('d') == 4`.

**Example 3:**

- **Input:** word = "aaabaaa", k = 2
- **Output:** 1
- **Explanation:** We can make `word` `2`-special by deleting `1` occurrence of `"b"`. Therefore, `word` becomes equal to `"aaaaaa"` where each letter's frequency is now uniformly `6`.

**Constraints:**

- <code>1 <= word.length <= 10<sup>5</sup></code>
- <code>0 <= k <= 10<sup>5</sup></code>
- `word` consists only of lowercase English letters.


**Hint:**
1. Count the frequency of each letter.
2. Suppose we select several characters as the final answer, and let `x` be the character with the smallest frequency in the answer. It can be shown that out of the selected characters, the optimal solution will never delete an occurrence of character `x` to obtain the answer.
3. We will fix a character `c` and assume that it will be the character with the smallest frequency in the answer. Suppose its frequency is `x`.
4. Then, for every other character, we will count the number of occurrences that will be deleted. Suppose that the current character has `y` occurrences.
   1. If y < x, we need to delete all of them.
   2. if y > x + k, we should delete y - x - k of such character.
   3. Otherwise we don’t need to delete it.


**Similar Questions:**
1. [1647. Minimum Deletions to Make Character Frequencies Unique](https://leetcode.com/problems/minimum-deletions-to-make-character-frequencies-unique/description/)


[^1]**Frequency:** The **frequency** of a letter `x` is the number of times it occurs in the string.


**Solution:**

We need to determine the minimum number of deletions required to make a string "k-special". A string is k-special if the absolute difference between the frequencies of any two characters in the string is at most k. The approach involves analyzing the frequencies of each character and determining the optimal target frequency range that minimizes the number of deletions.

### Approach
1. **Frequency Calculation**: First, we calculate the frequency of each character in the string. This helps us understand how many times each character appears.
2. **Candidate Selection**: We then identify critical points (candidate values) for the minimum frequency (`m`) in the final string. These critical points are derived from:
   - The frequencies of each character.
   - The frequencies adjusted by `k` (i.e., `f - k` and `f - k + 1` for each frequency `f`).
   - The boundaries (0 and the maximum frequency in the string).
3. **Deletion Calculation**: For each candidate value of `m`, we compute the number of deletions required:
   - Characters with frequencies less than `m` are entirely deleted.
   - Characters with frequencies greater than `m + k` are reduced to `m + k` by deleting the excess characters.
   - Characters within the range `[m, m + k]` require no deletions.
4. **Optimization**: We iterate through all candidate values of `m` and select the one that results in the minimum number of deletions.

Let's implement this solution in PHP: **[3085. Minimum Deletions to Make String K-Special](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003085-minimum-deletions-to-make-string-k-special/solution.php)**

```php
<?php
/**
 * @param String $word
 * @param Integer $k
 * @return Integer
 */
function minimumDeletions($word, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumDeletions("aabcaba", 0) . "\n";       // Output: 3
echo minimumDeletions("dabdcbdcdcd", 2) . "\n";   // Output: 2
echo minimumDeletions("aaabaaa", 2) . "\n";       // Output: 1
?>
```

### Explanation:

1. **Frequency Calculation**: The code starts by counting the occurrences of each character in the input string. This gives us an array of frequencies.
2. **Candidate Set Generation**: The algorithm generates a set of candidate values for the minimum frequency (`m`). These candidates include:
   - 0 and the maximum frequency in the string.
   - Each character's frequency and `frequency + 1`.
   - Each character's frequency adjusted by `k` (i.e., `frequency - k` and `frequency - k + 1`), ensuring these values are non-negative.
3. **Deletion Calculation**: For each candidate `m`, the code calculates the required deletions:
   - Characters with frequencies below `m` are completely removed.
   - Characters with frequencies above `m + k` are reduced to `m + k` by deleting the excess occurrences.
   - The total deletions for each candidate `m` are compared to find the minimum deletions needed.
4. **Result**: The algorithm returns the smallest number of deletions found across all candidate values of `m`, ensuring the string becomes k-special.

This approach efficiently narrows down the potential values of `m` to critical points derived from the character frequencies, optimizing the deletion calculation process. The complexity is manageable due to the limited number of distinct characters (at most 26), making the solution both effective and efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**