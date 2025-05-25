2131\. Longest Palindrome by Concatenating Two Letter Words

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Greedy`, `Counting`

You are given an array of strings `words`. Each element of `words` consists of **two** lowercase English letters.

Create the **longest possible palindrome** by selecting some elements from `words` and concatenating them in **any order**. Each element can be selected **at most once**.

Return _the **length** of the longest palindrome that you can create_. If it is impossible to create any palindrome, return `0`.

A **palindrome** is a string that reads the same forward and backward.

**Example 1:**

- **Input:** words = ["lc","cl","gg"]
- **Output:** 6
- **Explanation:** One longest palindrome is "lc" + "gg" + "cl" = "lcggcl", of length 6.
  Note that "clgglc" is another longest palindrome that can be created.

**Example 2:**

- **Input:** words = ["ab","ty","yt","lc","cl","ab"]
- **Output:** 8
- **Explanation:** One longest palindrome is "ty" + "lc" + "cl" + "yt" = "tylcclyt", of length 8.
  Note that "lcyttycl" is another longest palindrome that can be created.


**Example 3:**

- **Input:** words = ["cc","ll","xx"]
- **Output:** 2
- **Explanation:** One longest palindrome is "cc", of length 2.
  Note that "ll" is another longest palindrome that can be created, and so is "xx".



**Constraints:**

- <code> 1 <= words.length <= 10<sup>5</sup></code>
- `words[i].length == 2`
- `words[i]` consists of lowercase English letters.


**Hint:**
1. A palindrome must be mirrored over the center. Suppose we have a palindrome. If we prepend the word "ab" on the left, what must we append on the right to keep it a palindrome?
2. We must append "ba" on the right. The number of times we can do this is the minimum of (occurrences of "ab") and (occurrences of "ba").
3. For words that are already palindromes, e.g. "aa", we can prepend and append these in pairs as described in the previous hint. We can also use exactly one in the middle to form an even longer palindrome.



**Solution:**

We need to determine the longest possible palindrome that can be formed by concatenating selected two-letter words from a given list. Each word can be used at most once. The approach involves efficiently counting word frequencies and strategically using pairs of words to form the palindrome.

### Approach
1. **Count Frequencies**: First, we count the frequency of each word using a hash map.
2. **Handle Palindromic Words**: For words that are palindromes themselves (e.g., "aa"), we can use pairs of these words symmetrically around the center. If there's an odd count of such words, one can be placed in the center of the palindrome.
3. **Handle Non-Palindromic Pairs**: For non-palindromic words (e.g., "ab" and "ba"), we check if their reverse exists in the list. Each valid pair contributes to the palindrome symmetrically.

Let's implement this solution in PHP: **[2131. Longest Palindrome by Concatenating Two Letter Words](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002131-longest-palindrome-by-concatenating-two-letter-words/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @return Integer
 */
function longestPalindrome($words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
$test1 = ["lc","cl","gg"];
$test2 = ["ab","ty","yt","lc","cl","ab"];
$test3 = ["cc","ll","xx"];

echo longestPalindrome($test1) . "\n"; // Output: 6
echo longestPalindrome($test2) . "\n"; // Output: 8
echo longestPalindrome($test3) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Frequency Counting**: We first count how many times each word appears in the list using a hash map.
2. **Processing Palindromic Words**: For each palindromic word (e.g., "aa"), we determine how many pairs can be formed. Each pair contributes 4 characters to the palindrome. If there's an odd count of such words, we mark that we can place one in the center.
3. **Processing Non-Palindromic Pairs**: For each non-palindromic word, we check if its reverse exists. If it does, we use the minimum count of the word and its reverse to form pairs, each contributing 4 characters. We ensure each pair is processed only once by checking lexicographical order.
4. **Center Adjustment**: Finally, if there's any palindromic word with an odd count, we can place one in the center, adding 2 characters to the total length.

This approach efficiently counts and pairs words to maximize the length of the resulting palindrome, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**