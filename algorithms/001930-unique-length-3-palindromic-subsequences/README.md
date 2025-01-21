1930\. Unique Length-3 Palindromic Subsequences

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Bit Manipulation`, `Prefix Sum`

Given a string `s`, return the number of **unique palindromes of length three** that are a **subsequence** of `s`.

**Note** that even if there are multiple ways to obtain the same subsequence, it is still only counted once.

A **palindrome** is a string that reads the same forwards and backwards.

A **subsequence** of a string is a new string generated from the original string with some characters (can be none) deleted without changing the relative order of the remaining characters.

- For example, `"ace"` is a subsequence of `"abcde"`.


**Example 1:**

- **Input:** s = "aabca"
- **Output:** 3
- **Explanation:** The 3 palindromic subsequences of length 3 are:
  - "aba" (subsequence of "aabca")
  - "aaa" (subsequence of "aabca")
  - "aca" (subsequence of "aabca")

**Example 2:**

- **Input:** s = "adc"
- **Output:** 0
- **Explanation:** There are no palindromic subsequences of length 3 in "adc".


**Example 3:**

- **Input:** s = "bbcbaba"
- **Output:** 4
- **Explanation:** The 4 palindromic subsequences of length 3 are:
  - "bbb" (subsequence of "bbcbaba")
  - "bcb" (subsequence of "bbcbaba")
  - "bab" (subsequence of "bbcbaba")
  - "aba" (subsequence of "bbcbaba")



**Constraints:**

- <code>3 <= s.length <= 10<sup>5</sup></code>
- `s` consists of only lowercase English letters.


**Hint:**
1. What is the maximum number of length-3 palindromic strings?
2. How can we keep track of the characters that appeared to the left of a given position?



**Solution:**

We can use an efficient algorithm that leverages prefix and suffix character tracking to count all valid palindromic subsequences.

### Approach

1. **Track Prefix Characters**:
   Use an array to store the set of characters encountered to the left of each position in the string. This will help in efficiently checking if a character can form the first part of a palindromic subsequence.

2. **Track Suffix Characters**:
   Use another array to store the set of characters encountered to the right of each position in the string. This will help in efficiently checking if a character can form the third part of a palindromic subsequence.

3. **Count Palindromic Subsequences**:
   For each character in the string, consider it as the middle character of a length-3 palindrome. Check for all valid combinations of prefix and suffix characters to determine unique palindromes.

4. **Store Results**:
   Use a hash set to store unique palindromic subsequences, ensuring no duplicates.

Let's implement this solution in PHP: **[1930. Unique Length-3 Palindromic Subsequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001930-unique-length-3-palindromic-subsequences/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function countPalindromicSubsequence($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countPalindromicSubsequence("aabca") . PHP_EOL; // Output: 3
echo countPalindromicSubsequence("adc") . PHP_EOL;   // Output: 0
echo countPalindromicSubsequence("bbcbaba") . PHP_EOL; // Output: 4
?>
```

### Explanation:

1. **Prefix Array**:
   - For each character at position `i`, `prefix[i]` stores all distinct characters encountered before index `i`.

2. **Suffix Array**:
   - For each character at position `i`, `suffix[i]` stores all distinct characters encountered after index `i`.

3. **Middle Character**:
   - Consider each character as the middle of the palindrome. For each combination of prefix and suffix characters that matches the middle character, form a length-3 palindrome.

4. **Hash Map**:
   - Use an associative array (`$uniquePalindromes`) to store unique palindromes, ensuring duplicates are not counted.

### Complexity

- **Time Complexity**: _**O(n)**_
   - Traversing the string twice to compute the prefix and suffix arrays.
   - A third traversal checks valid palindromic subsequences.

- **Space Complexity**: _**O(n)**_
   - For prefix and suffix arrays.

### Output

The code produces the correct results for the given examples:

- **Input**: `"aabca"` → **Output**: `3`
- **Input**: `"adc"` → **Output**: `0`
- **Input**: `"bbcbaba"` → **Output**: `4`

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
